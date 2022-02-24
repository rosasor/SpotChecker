<!doctype html>
<!-- THIS PAGE DONE BY ROSA WHEELEN -->
<html lang="en">
	<head>
		<title>Question One</title>
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
							<li class="nav-item"><a class="nav-link active" aria-current="page" href="finalQ1.php"><span data-feather="home"></span>Question One</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ2.php"><span data-feather="file"></span>Question Two</a></li>
							<!--<li class="nav-item"><a class="nav-link" href="finalQ2.php"><span data-feather="shopping-cart"></span>Question Two</a></li>-->
							<li class="nav-item"><a class="nav-link" href="finalQ3.php"><span data-feather="users"></span>Question Three</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ4.php"><span data-feather="bar-chart-2"></span>Question Four</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ5.php"><span data-feather="layers"></span>Question Five</a></li>
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">What is the Average Amount of Time Spent Parked in a 30-minute Parking Spot?</h2>
					</div>

						<canvas class="my-4 w-100" id="chart" width="900" height="380"></canvas>

						<section class="text-center">
						<hr class="featurette-divider">
							<h2>Observations</h2>
							<hr class="featurette-divider">
						</section>

						<section class="text-left">
							<h3 class="fw-light">A key observation of this data is that the average amount of time spent
								in a 30-minute spot in McAllister is over 30 minutes every weekday. This gives lots of credibility 
								to the theory that people who park in these spots usually park over the allotted time.
								Friday was particularly busy because a student parked overnight there.
							</h3>
						</section>
						
					</div>

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
			$lastTime = 0; //Time car arrived
			$numCars = 0; //Total num of cars
			$totalTime = 0; //Total amount of time cars parked
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTime = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTime;
					$totalTime = $totalTime + $stayTime;
					$numCars = $numCars + 1;
				}

			}
			
			$sunAvgTime = ($totalTime/$numCars)/60;
			echo"$numCars";

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
			$lastTime = 0; //Time car arrived
			$numCars = 0; //Total num of cars
			$totalTime = 0; //Total amount of time cars parked
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTime = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTime;
					$totalTime = $totalTime + $stayTime;
					$numCars = $numCars + 1;
				}

			}
			
			$monAvgTime = ($totalTime/$numCars)/60;
			echo"$numCars";

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
			$lastTime = 0; //Time car arrived
			$numCars = 0; //Total num of cars
			$totalTime = 0; //Total amount of time cars parked
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTime = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTime;
					$totalTime = $totalTime + $stayTime;
					$numCars = $numCars + 1;
				}

			}
			
			$tueAvgTime = ($totalTime/$numCars)/60;
			echo"$numCars";

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
			$lastTime = 0; //Time car arrived
			$numCars = 0; //Total num of cars
			$totalTime = 0; //Total amount of time cars parked
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTime = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTime;
					$totalTime = $totalTime + $stayTime;
					$numCars = $numCars + 1;
				}

			}
			
			$wedAvgTime = ($totalTime/$numCars)/60;
			echo"$numCars";

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
			$lastTime = 0; //Time car arrived
			$numCars = 0; //Total num of cars
			$totalTime = 0; //Total amount of time cars parked
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTime = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTime;
					$totalTime = $totalTime + $stayTime;
					$numCars = $numCars + 1;
				}

			}
			
			$thuAvgTime = ($totalTime/$numCars)/60;
			echo"$numCars";

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
			$lastTime = 0; //Time car arrived
			$numCars = 0; //Total num of cars
			$totalTime = 0; //Total amount of time cars parked
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTime = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTime;
					$totalTime = $totalTime + $stayTime;
					$numCars = $numCars + 1;
				}

			}
			
			$friAvgTime = ($totalTime/$numCars)/60;
			echo"$numCars";

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
			$lastTime = 0; //Time car arrived
			$numCars = 0; //Total num of cars
			$totalTime = 0; //Total amount of time cars parked
			$threshhold = 500; //is car parked?

			while ($row = mysqli_fetch_array($result)){
				
				extract($row);
				
				if($distance < $threshhold && $isParked == 0){
					//echo"A car has arrived";
					$isParked = 1;
					$lastTime = $time;
				}
				
				if($distance >= $threshhold && $isParked == 1){
					//echo"A car has left";
					$isParked = 0;
					$stayTime = $time - $lastTime;
					$totalTime = $totalTime + $stayTime;
					$numCars = $numCars + 1;
				}

			}
			
			$satAvgTime = ($totalTime-$numCars); //Changed math becasue 0/0/60 caused an error
			echo"$numCars";

		?>
		
		<script>
			var config = {
				type: 'bar',
				data: {
				labels: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday',],
				datasets: [
					
					{
						label: 'Average Time Spent in Spot',
						backgroundColor: '#6c6482',
						borderColor: '#CCCCCC',
						borderWidth: 1,
						data:[<?php echo"$sunAvgTime"; ?>, <?php echo"$monAvgTime"; ?>, <?php echo"$tueAvgTime"; ?>, <?php echo"$wedAvgTime"; ?>, <?php echo"$thuAvgTime"; ?>, <?php echo"$friAvgTime"; ?>, <?php echo"$satAvgTime"; ?>,],
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
