<!-- THIS CODE WAS TO FIX DATAPOINTS ID AFTER A DATAPOINT DELETION -->
<?php
    // Connect Statement
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "399";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

    $query = "SELECT * FROM columbia WHERE id > 1561 ORDER BY id DESC";
        
    $result = mysqli_query($conn, $query) or die ("Could not select.");

    while ($row = mysqli_fetch_array($result)){
        extract($row);
        $newID = $id + 1;

        $query2 = "UPDATE columbia SET id = '$newID' WHERE id = '$id'";
       
	    $result2 = mysqli_query($conn, $query2) or die ("Could not update.");
    }

    echo "You did it";

    



?>

