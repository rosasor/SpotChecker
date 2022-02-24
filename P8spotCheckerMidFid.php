<!doctype html>
<!-- THIS PAGE DONE BY ROSA WHEELEN -->
<html lang="en">
    <style> 
  
	    table { width: 100%;  
		    padding-left: 0%; }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(odd) {
            background-color: #dddddd;
        }

 	</style>
	<head>
		<title>Mid-Fidelity Prototype</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	
	<body>

    <header>
		
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">Spot Checker</h4>
                        <p class="text-muted">Thirty Minute Parking Spot</p>
                    </div>
                    
                    <div class="col-sm-4 offset-md-1 py-4">
                        <ul class="list-unstyled">
                            <h4 style="font-size:25px" class="text-white">Home</h4>
                            <li><a href="finalP1.php" style="font-size:15px" class="text-white">Home</a></li><br>
                            <h4 style="font-size:25px" class="text-white">Introduction</h4>
                            <li><a href="finalP2.php" style="font-size:15px" class="text-white">Location</a></li>
                            <li><a href="finalP3.php" style="font-size:15px" class="text-white">Behavior</a></li>
                            <li><a href="finalP4.php" style="font-size:15px" class="text-white">Approaches</a></li>
                            <li><a href="finalP5.php" style="font-size:15px" class="text-white">Questions</a></li>
                            <li><a href="finalP6.php" style="font-size:15px" class="text-white">Fermi Problems</a></li><br>
                            <h4 style="font-size:25px" class="text-white">Hardware</h4>
                            <li><a href="finalP8.php" style="font-size:15px" class="text-muted">Mid-Fidelity</a></li>
                            <li><a href="finalP9.php" style="font-size:15px" class="text-white">Schematic & PCB</a></li>
                            <li><a href="finalP11.php" style="font-size:15px" class="text-white">Hardware & Enclosure</a></li>
                            <li><a href="finalP13.php" style="font-size:15px" class="text-white">Kiosk Design</a></li><br>
                            <h4 style="font-size:25px" class="text-white">The Study</h4>
                            <li><a href="finalP7.php" style="font-size:15px" class="text-white">Environmental Study</a></li>
                            <li><a href="finalP10.php" style="font-size:15px" class="text-white">Data Collection</a></li>
                            <li><a href="finalP12.php" style="font-size:15px" class="text-white">Insights & Evidence</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="finalP8.php" class="navbar-brand d-flex align-items-center"><strong>Mid-Fidelity Prototype</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        
    </header>

		<main>

			<section class="py-2 text-center container">
				<div class="row py-lg-3">
					<div class="col-lg-7 col-md-8 mx-auto">
						<h1 class="fw-dark">The Prototype Breadboarded Circuit</h1>
                        <hr class="featurette-divider">
                        <br> 
                        <img src="images/labeledCircuit.jpeg" style="float:none;width:500px;height:500px;">
                        <br> <br>
						<p class="lead text-muted"></p>
					</div>   
				</div>
                        <iframe width="420" height="315"
                            src="https://www.youtube.com/embed/5avwZzLjE2s">
                        </iframe>
                        <br><br>
                        <h4> The last two data inputs in the table below are from the demo video </h4>
			</section>
			
        <div class="album py-5 bg-light">
			<div class="container">
			    <h1 class="fw-light">The Arduino code that is running on the ESP32</h1>
                    <pre><code>     
    // CRT 399 ESP32 WiFi Sensor Starter Code with Ultrasonic Code
    // Rosa Wheelen, Nate Foster, & Zane Cochran
    // Sleep Function Source: https://randomnerdtutorials.com/esp32-timer-wake-up-deep-sleep/


    // WiFi Settings (MUST BE MODIFIED)
    #include <WiFi.h>
    const char* ssid     = "EZConnect";                   // Name of Wireless Network
    const char* password = "uUX496JuM4";                  // Password for Wireless Network
    const char* host = "10.40.6.2";                       // Host Name (IP Address or Domain, e.g. 10.40.4.1 or google.com
    String url = "/399/groups/columbia/final/dataCollect.php?";       // URL Name (Path to PHP File, e.g. /399/zane/index.php?

    // Sensor Settings
    #define echoPin 18 // attach pin D2 Arduino to pin Echo of HC-SR04
    #define trigPin 5 //attach pin D3 Arduino to pin Trig of HC-SR04

    // Deep Sleep Settings
    #define uS_TO_S_FACTOR 1000000  /* Conversion factor for micro seconds to seconds */
    #define TIME_TO_SLEEP  300      /* Time ESP32 will go to sleep (in seconds) Usually 300 */

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
    
    void takeSample() {                                   // Ultrasonic range sensor initiates a reading
    digitalWrite(trigPin, LOW);                           // Clears the trigPin condition
    delayMicroseconds(2);
    digitalWrite(trigPin, HIGH);                          // Sets the trigPin HIGH (ACTIVE) for 10 microseconds
    delayMicroseconds(10);
    digitalWrite(trigPin, LOW);
    duration = pulseIn(echoPin, HIGH);                    // Reads the echoPin, returns the sound wave travel time in microseconds
    distance = duration * 0.034 / 2;                      // Calculating the distance, Speed of sound wave divided by 2 (go and back)

    Serial.print("Distance: ");                           // Displays the distance on the Serial Monitor
    Serial.print(distance);
    Serial.println(" cm");

    initWiFi();
    String distanceLabel = "distance=";
    String msg = distanceLabel + distance;                //  Read/save the sensor value
    if (wifiConnected) {                                  //  If WiFi is connected,
        connectServer(msg);                               //  Send the message to the server
        delay(1000);                                      //  Delay for 1 second, then disconnect from the server
        WiFi.disconnect();
    }
    }

    // WIFI FUNCTIONS (DO NOT CHANGE)
    // Connects to the WiFi
    void initWiFi() {
    wifiAttemptsCount = 0;                                // Initialize the number of attempted connections
    wifiConnected = true;                                 // Assume WiFi will connect
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
                    </pre></code>

                    <h4> The table below shows the raw data from our group's four hour sample study of the 30-minute parking spots
                        to test the device before the seven day study takes place. </h4>
            </div>
        </div>

            <div class="album py-0 bg-light">
				<div class="container">
                    <?php
                        // Connect Statement
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "399";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

                        echo "<table>";
                        echo "<tr>
                                <th>Distance</th>
                                <th>Time</th>
                                <th>Observations</th>
                            </tr>";


                        $query = "SELECT * FROM columbia WHERE time BETWEEN 1635279014 AND 1635440919";
                        $result = mysqli_query($conn, $query) or die ("Could not select.");
                        while ($row = mysqli_fetch_array($result)){
                            extract($row);

                        $formatTime = date('l F d Y g:i A', $time);

                        echo "<tr>
                                <td>$distance</td>
                                <td>$formatTime</td>
                                <td>$observation</td>
                            </tr>";
                        }
                    ?>

					</table>
                </div>
            </div>
            
		</main>

        <footer class="text-muted py-5 bg-light">
			<div class="container"> 
			</div>
		</footer>

		<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

	</body>
</html>
