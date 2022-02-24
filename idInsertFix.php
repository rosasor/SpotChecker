<!-- THIS CODE WAS TO FIX TIME IN DATABASE -->
<!-- THIS CODE DONE BY ROSA WHEELEN -->
<?php
    // Connect Statement
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "399";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

    $thisTime = 1637011901;

    for($i = 1562; $i<1563; $i++){

        $thisTime = $thisTime + 150;

        $query = "INSERT INTO columbia (id, distance, time) 
        VALUES ('$i', '265', '$thisTime')";

        //$query = "INSERT INTO columbia (distance, time) 
        //VALUES ('181', '$thisTime')";     
        
        $result = mysqli_query($conn, $query) or die ("Could not insert.");

    }
    echo "You did it";

    



?>

