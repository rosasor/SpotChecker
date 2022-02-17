// CRT 399 ESP32 WiFi Sensor Starter Code
// Zane Cochran
// IoT Device to Perform Remote Sensing
// Sleep Function Source: https://randomnerdtutorials.com/esp32-timer-wake-up-deep-sleep/
// Update: 15 SEP 2021

// WiFi Settings (MUST BE MODIFIED)
#include <WiFi.h>
const char* ssid     = "EZConnect";                   // Name of Wireless Network
const char* password = "uUX496JuM4";                  // Password for Wireless Network
const char* host = "10.40.6.2";                     // Host Name (IP Address or Domain, e.g. 10.40.4.1 or google.com
String url = "/399/groups/columbia/final/dataCollect.php?";       // URL Name (Path to PHP File, e.g. /399/zane/index.php?

// Sensor Settings
#define echoPin 18 // attach pin D2 Arduino to pin Echo of HC-SR04
#define trigPin 5 //attach pin D3 Arduino to pin Trig of HC-SR04

// Deep Sleep Settings
#define uS_TO_S_FACTOR 1000000  /* Conversion factor for micro seconds to seconds */
#define TIME_TO_SLEEP  150      /* Time ESP32 will go to sleep (in seconds) Usually 300 */

// Other Variables (DO NOT CHANGE)
boolean wifiConnected = false;                        // Is WiFi Connected?
int wifiAttemptsCount = 0;                            // Number of Connection Attempts
int wifiAttemptsTotal = 10;                           // Max Number of Connection Attempts
int led = 5;                                          // Onboard LED to Show Upload

long duration; // variable for the duration of sound wave travel
int distance; // variable for the distance measurement

void setup() {
  Serial.begin(115200); delay(1000); Serial.println("Starting Up..");                // Initalize Serial Connection
  pinMode(led, OUTPUT);                                                              // Set LED as output

  pinMode(trigPin, OUTPUT); // Sets the trigPin as an OUTPUT
  pinMode(echoPin, INPUT); // Sets the echoPin as an INPUT

  takeSample();                                                                     // Take a Sample and Send to Server

  esp_sleep_enable_timer_wakeup(TIME_TO_SLEEP * uS_TO_S_FACTOR);                    // Enable Sleep Timer
  Serial.println("Going to Sleep...");  delay(1000); Serial.flush();                // Print Sleep Message
  esp_deep_sleep_start();                                                           // Go to Sleep
}

void loop() {}


void takeSample() {
  // put your main code here, to run repeatedly:
  // Clears the trigPin condition
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin HIGH (ACTIVE) for 10 microseconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  // Calculating the distance
  distance = duration * 0.034 / 2; // Speed of sound wave divided by 2 (go and back)
  // Displays the distance on the Serial Monitor
  Serial.print("Distance: ");
  Serial.print(distance);
  Serial.println(" cm");

  initWiFi();
  String distanceLabel = "distance=";
  String msg = distanceLabel + distance;
  if (wifiConnected) {
    connectServer(msg);
    delay(1000);
    WiFi.disconnect();
  }


  // STEP 4: If WiFi is connected,
  //  Read/save the light sensor value
  //  Send the message to the server
  //  Delay for 1 second, then disconnect from the server
  // STEP 5: Turn off the onboard LED
}

// WIFI FUNCTIONS (DO NOT CHANGE)
// Connects to the WiFi
void initWiFi() {
  wifiAttemptsCount = 0;                            // Initialize the number of attempted connections
  wifiConnected = true;                             // Assume WiFi will connect
  Serial.println("Connecting to network...");

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(100);
    Serial.print(".");
    wifiAttemptsCount++;
    if (wifiAttemptsCount > wifiAttemptsTotal) {
      wifiConnected = false;
      break;
    }
  }

  if (wifiConnected) {
    Serial.println("WiFi Connected!");
  }
  else {
    for (int i = 0; i < 10; i++) {
      digitalWrite(led, HIGH);  // Flash to signal no connection
      delay(100);
      digitalWrite(led, LOW);
      delay(100);
    }
    Serial.println("WiFi Not Connected! Will retry later.");
  }
}

// Connects to the Server and Sends a Query
void connectServer(String msg) {
  // Connect to Server
  String finalURL = url + msg;
  WiFiClient client; const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("Connection Failed");
    return;
  }

  Serial.println(finalURL);

  // Send Request to Server
  client.print(String("GET ") + finalURL + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Connection: close\r\n\r\n");

  // Get Response from Server
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println("Connection Timeout!");
      client.stop();
      return;
    }
  }
  while (client.available()) {
    String pageData = client.readStringUntil('\r');
    Serial.println(pageData);
  }
}
