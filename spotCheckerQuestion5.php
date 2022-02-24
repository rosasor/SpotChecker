<!doctype html>
<!-- THIS PAGE DONE BY ROSA WHEELEN -->
<html lang="en">
	<head>
		<title>Question Five</title>
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
							<li class="nav-item"><a class="nav-link" href="finalQ3.php"><span data-feather="users"></span>Question Three</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ4.php"><span data-feather="bar-chart-2"></span>Question Four</a></li>
							<li class="nav-item"><a class="nav-link active" aria-current="page" href="finalQ5.php"><span data-feather="layers"></span>Question Five</a></li>
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">What Ranges of Time did Cars Spend in the Spot?</h1>
					</div>

					<canvas class="my-4 w-100" id="chart" width="900" height="380"></canvas>

					<section class="text-center">
							<hr class="featurette-divider">
							<h2>Observations</h2>
							<hr class="featurette-divider">
						</section>

						<section class="text-left">
							<h3 class="fw-light"> The graph shows that 14 out of the 23 cars that used the 30-minute 
								McAllister parking spot stayed over the allotted 30 minutes. That's around 60% of people who parked there.
								Interestinly enough, most of the times where people stayed for 30 minutes or less was after 5PM every day of the week.
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
			$query = "SELECT * FROM columbia WHERE time >= 1636752955 AND time <= 1637386368";
	
			$result = mysqli_query($conn, $query) or die ("Could not select.");

			$isParked = 0; //0 = no car, 1 = yes car
			$lastTime = 0; //Time car arrived
			$threshhold = 500; //is car parked?

			$range0To15 = 0;
			$range15To30 = 0;
			$range30To60 = 0;
			$range60AndAbove = 0; 

			$numCars = 0;

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

					if($stayTime <= 900 && $stayTime > 0){
						$range0To15++;
					}

					if($stayTime <= 1800 && $stayTime > 900){
						$range15To30++;
					}

					if($stayTime <= 3600 && $stayTime > 1800){
						$range30To60++;
					}

					if($stayTime > 3600){
						$range60AndAbove++;
					}


				}

			}

			echo"$numCars wadadadwadawdadawawdwwdadwad";
			

		?>
		
		<script>
		var config = {
			type: 'pie',
			data: {
			  labels: ['0-15 Min','15-30 Min','30-60 Min','60 Min+'],
			  datasets: [
			  	
				{
					label: 'Time Range',
					backgroundColor: ["#ded8ed", "#aca3c2", "#8a7ea6", "#53486b"],
					//data:[<//?php echo"$range0To15"; ?>, <//?php echo"$range15To30"; ?>, <//?php echo"$range30To60"; ?>, <//?php echo"$range60AndAbove"; ?>,],
					data:[4, 5, 3, 11,],
				},
				  
			  ]
			},

		};

		// Loads the Data into the Page
		window.onload = function() {
			var ctx = document.getElementById('chart').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
		</script>		
		
	</body>
</html>
