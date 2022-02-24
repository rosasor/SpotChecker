<!doctype html>
<!-- THIS PAGE DONE BY ROSA WHEELEN -->
<html lang="en">
	<head>
		<title>Question Three</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/dashboard.css" rel="stylesheet">
	</head>
	
	<body>

		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">The Questions</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-nav">
				<div class="nav-item text-nowrap">
					<a class="nav-link px-3" href="finalP12.php">Return to Insights & Evidence</a>
				</div>
			</div>
		</header>

		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3">
						<ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link" href="finalQ1.php"><span data-feather="home"></span>Question One</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ2.php"><span data-feather="file"></span>Question Two</a></li>
							<li class="nav-item"><a class="nav-link active" aria-current="page" href="finalQ3.php"><span data-feather="users"></span>Question Three</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ4.php"><span data-feather="bar-chart-2"></span>Question Four</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ5.php"><span data-feather="layers"></span>Question Five</a></li>
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">How Much Time is a 30-minute Parking Spot Used in a Day?</h1>
					</div>

					<canvas class="my-4 w-100" id="chart" width="900" height="380"></canvas>

						<section class="text-center">
						<hr class="featurette-divider">
							<h2>Observations</h2>
							<hr class="featurette-divider">
						</section>

						<section class="text-left">
							<h3 class="fw-light">Something that stands out in this data is the noticeable difference in the amount of use of the
								spots over the weekend compared to the weekdays. Currently, the McAllister 30-minute parking spots are marked to be 30-minute use only
								during the entirety of the week, this policy should be changed to have this take place only during the weekdays due
								to the complete lack of use during weekends. Friday was particularly busy because a student parked overnight there.
							</h3>
						</section>

					<footer class="text-muted py-5">
						<div class="container"> 
						</div>
					</footer>

				</main>
			</div>
		</div>


		<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../bootstrap/js/feather.min.js"></script>
		<script>feather.replace({ 'aria-hidden': 'true' })</script>
		<script src="../bootstrap/js/Chart.min.js"></script>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1636844452 AND time <= 1636930757";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTimeParked = 0; //Time car arrived
			$lastTimeNotParked = 0; //Time car left
			$totalTimeParkedSun = 0; //Total amount of time cars were parked
			$totalTimeNotParkedSun = 0; //Total amount of time cars were not
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTimeParked = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTimeParked;
					$totalTimeParkedSun = $totalTimeParkedSun + $stayTime;
				}

				// if($distance > $threshhold && $isParked == 0){
				// 	//echo"A car not in spot";
				// 	$isParked = 0;
				// 	$lastTimeNotParked = $time;
				// }
				
				// if($distance <= $threshhold && $isParked == 0){
				// 	//echo"A car has pulled in";
				// 	$isParked = 1;
				// 	$goneTime = $time - $lastTimeNotParked;
				// 	$totalTimeNotParked = $totalTimeNotParked + $goneTime;
				// }

			}
			
			$totalTimeParkedSun = $totalTimeParkedSun/60;
			$totalTimeNotParkedSun = 1140 - $totalTimeParkedSun;
			//echo"$totalTimeParked";
		?>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1636844452 AND time <= 1636930757";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			// $isParked = 0; //0 = no car, 1 = yes car
			// $lastTimeNotParked = 0; //Time car left
			// $totalTimeNotParked = 0; //Total amount of time cars were not
			// $threshhold = 500; //is car parked?

			// while ($row = mysqli_fetch_array($result)){
				
			// 	extract($row);


			// 	if($distance > $threshhold && $isParked == 0){
			// 		//echo"A car not in spot";
			// 		$isParked = 0;
			// 		$lastTimeNotParked = $time;
			// 	}
				
			// 	if($distance <= $threshhold && $isParked == 0){
			// 		//echo"A car has pulled in";
			// 		$isParked = 1;
			// 		$goneTime = $time - $lastTimeNotParked;
			// 		$totalTimeNotParked = $totalTimeNotParked + $goneTime;
			// 	}

				

			// }
			
			// $totalTimeNotParked = $totalTimeNotParked/60;

			// echo"$totalTimeNotParked";

		?>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1636952667 AND time <= 1637038657";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTimeParked = 0; //Time car arrived
			$lastTimeNotParked = 0; //Time car left
			$totalTimeParkedMon = 0; //Total amount of time cars were parked
			$totalTimeNotParkedMon = 0; //Total amount of time cars were not
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTimeParked = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTimeParked;
					$totalTimeParkedMon = $totalTimeParkedMon + $stayTime;
				}

			}
			
			$totalTimeParkedMon = $totalTimeParkedMon/60;
			$totalTimeNotParkedMon = 1140 - $totalTimeParkedMon;
			//echo"$totalTimeParkedMon";
		?>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1637038812 AND time <= 1637125147";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTimeParked = 0; //Time car arrived
			$lastTimeNotParked = 0; //Time car left
			$totalTimeParkedTue = 0; //Total amount of time cars were parked
			$totalTimeNotParkedTue = 0; //Total amount of time cars were not
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTimeParked = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTimeParked;
					$totalTimeParkedTue = $totalTimeParkedTue + $stayTime;
				}

			}
			
			$totalTimeParkedTue = $totalTimeParkedTue/60;
			$totalTimeNotParkedTue = 1140 - $totalTimeParkedTue;
			//echo"$totalTimeParkedTue";
		?>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1637125301 AND time <= 1637211440";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTimeParked = 0; //Time car arrived
			$lastTimeNotParked = 0; //Time car left
			$totalTimeParkedWed = 0; //Total amount of time cars were parked
			$totalTimeNotParkedWed = 0; //Total amount of time cars were not
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTimeParked = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTimeParked;
					$totalTimeParkedWed = $totalTimeParkedWed + $stayTime;
				}

			}
			
			$totalTimeParkedWed = $totalTimeParkedWed/60;
			$totalTimeNotParkedWed = 1140 - $totalTimeParkedWed;
			//echo"$totalTimeParkedWed";
		?>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1637211748 AND time <= 1637297915";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTimeParked = 0; //Time car arrived
			$lastTimeNotParked = 0; //Time car left
			$totalTimeParkedThu = 0; //Total amount of time cars were parked
			$totalTimeNotParkedThu = 0; //Total amount of time cars were not
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTimeParked = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTimeParked;
					$totalTimeParkedThu = $totalTimeParkedThu + $stayTime;
				}

			}
			
			$totalTimeParkedThu = $totalTimeParkedThu/60;
			$totalTimeNotParkedThu = 1140 - $totalTimeParkedThu;
			//echo"$totalTimeParkedThu";
		?>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1637298069 AND time <= 1637384365";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTimeParked = 0; //Time car arrived
			$lastTimeNotParked = 0; //Time car left
			$totalTimeParkedFri = 0; //Total amount of time cars were parked
			$totalTimeNotParkedFri = 0; //Total amount of time cars were not
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTimeParked = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTimeParked;
					$totalTimeParkedFri = $totalTimeParkedFri + $stayTime;
				}

			}
			
			$totalTimeParkedFri = $totalTimeParkedFri/60;
			$totalTimeNotParkedFri = 1140 - $totalTimeParkedFri;
			//echo"$totalTimeParkedFri";
		?>

		<?php
			// Connect Statement
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "399";

    		$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn) {die("Connection failed: " . mysqli_connect_error());}


			// SELECT all the records in the database (order not important)
	    	// Also explore ORDER BY, LIMIT, WHERE
			$query = "SELECT * FROM columbia WHERE time >= 1637384519 AND time <= 1637386368";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTimeParked = 0; //Time car arrived
			$lastTimeNotParked = 0; //Time car left
			$totalTimeParkedSat = 0; //Total amount of time cars were parked
			$totalTimeNotParkedSat = 0; //Total amount of time cars were not
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTimeParked = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTimeParked;
					$totalTimeParkedSat = $totalTimeParkedSat + $stayTime;
				}

			}
			
			//$totalTimeParkedSat = $totalTimeParkedSat/60;
			$totalTimeNotParkedSat = 1140 - $totalTimeParkedSat;
			//echo"$totalTimeParkedSat";
		?>
		
		<script>
		var config = {
			type: 'bar',
			data: {
			  labels: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday',],
			  datasets: [
			  	
				{
					label: 'Spot in Use',
					backgroundColor: '#d6ceed',
					borderColor: '#CCCCCC',
					borderWidth: 1,
					data:[<?php echo"$totalTimeParkedSun"; ?>, <?php echo"$totalTimeParkedMon"; ?>, <?php echo"$totalTimeParkedTue"; ?>, <?php echo"$totalTimeParkedWed"; ?>, <?php echo"$totalTimeParkedThu"; ?>, <?php echo"$totalTimeParkedFri"; ?>, <?php echo"$totalTimeParkedSat"; ?>,],
				},
				
				{
					label: 'Spot Not in Use',
					backgroundColor: '#6c6482',
					borderColor: '#CCCCCC',
					borderWidth: 1,
					data:[<?php echo"$totalTimeNotParkedSun"; ?>, <?php echo"$totalTimeNotParkedMon"; ?>, <?php echo"$totalTimeNotParkedTue"; ?>, <?php echo"$totalTimeNotParkedWed"; ?>, <?php echo"$totalTimeNotParkedThu"; ?>, <?php echo"$totalTimeNotParkedFri"; ?>, <?php echo"$totalTimeNotParkedSat"; ?>,],
				},
				  
			  ]
			},
			
			options: {
				scales: {
					xAxes: [{stacked: true, display: true, scaleLabel: {display: true, labelString: 'Days of Week'}}],
					yAxes: [{stacked: true, display: true, scaleLabel: {display: true,labelString: 'Time in Minutes'}}]
				}	
			}
		};

		// Loads the Data into the Page
		window.onload = function() {
			var ctx = document.getElementById('chart').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
		</script>		
		
	</body>
</html>
