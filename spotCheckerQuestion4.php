<!doctype html>
<!-- THIS PAGE DONE BY NATE FOSTER -->
<?php
$F1=0;
$sat=0;
$sun=0;
$mon=0;
$tue=0;
$wed=0;	
$thu=0;				// Connect Statement
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "399";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
	
	
						$query = "SELECT * FROM columbia WHERE distance <500 AND time >1637276468 AND time<1637362766 ";
	
	$result = mysqli_query($conn, $query) or die ("Could not select.");

							while ($row = mysqli_fetch_array($result)){
							extract ($row);							
							$F1++;
							}
							$query = "SELECT * FROM columbia WHERE distance <500 AND time >1636765880 AND time <1636844300 ";
	
	$result = mysqli_query($conn, $query) or die ("Could not select.");

							while ($row = mysqli_fetch_array($result)){
							extract ($row);
							$sat++;
							}
														$query = "SELECT * FROM columbia WHERE distance <500 AND time >1636844451 AND time<1636930758 ";
	
	$result = mysqli_query($conn, $query) or die ("Could not select.");

							while ($row = mysqli_fetch_array($result)){
							extract ($row);
							$sun++;
							}
							$query = "SELECT * FROM columbia WHERE distance <500 AND time >1636931066 AND time<1637017058 ";
	
	$result = mysqli_query($conn, $query) or die ("Could not select.");

							while ($row = mysqli_fetch_array($result)){
							extract ($row);
							$mon++;
							}
							$query = "SELECT * FROM columbia WHERE distance <500 AND time >1637017211 AND time<1637103548 ";
	
	$result = mysqli_query($conn, $query) or die ("Could not select.");

							while ($row = mysqli_fetch_array($result)){
							extract ($row);
							$tue++;
							}
														$query = "SELECT * FROM columbia WHERE distance <500 AND time >1637103700 AND time<1637189841 ";
	
	$result = mysqli_query($conn, $query) or die ("Could not select.");

							while ($row = mysqli_fetch_array($result)){
							extract ($row);
							$wed++;
							}
														$query = "SELECT * FROM columbia WHERE distance <500 AND time >1637190147 AND time <1637276316 ";
	
	$result = mysqli_query($conn, $query) or die ("Could not select.");

							while ($row = mysqli_fetch_array($result)){
							extract ($row);
							$thu++;
							}
						
?>	
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
							<li class="nav-item"><a class="nav-link" href="finalQ3.php"><span data-feather="users"></span>Question Three</a></li>
							<li class="nav-item"><a class="nav-link active" aria-current="page" href="finalQ4.php"><span data-feather="bar-chart-2"></span>Question Four</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ5.php"><span data-feather="layers"></span>Question Five</a></li>
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">Which Day is the Busiest Day for Parking?</h1>
					</div>

					<canvas class="my-4 w-100" id="chart" width="900" height="380"></canvas>

						<section class="text-center">
							<hr class="featurette-divider">
							<h2>Observations</h2>
							<hr class="featurette-divider">
						</section>

						<section class="text-left">
							<h3 class="fw-light">Friday was particularly busy because a student parked overnight there. Excluding Friday, Monday
								is the busiest day for parking in this particular spot.
							</h3>
						</section>
					
				</main>

					<footer class="text-muted py-5">
						<div class="container"> 
						</div>
					</footer>

			</div>
		</div>


		<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../bootstrap/js/feather.min.js"></script>
		<script>feather.replace({ 'aria-hidden': 'true' })</script>
		<script src="../bootstrap/js/Chart.min.js"></script>
		
		
		<script>
		var config = {
			type: 'bar',
			data: {
			  labels: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday',],
			  datasets: [
			  	
				{
					label: 'Number of low data points on a certain day',
					backgroundColor: '#6c6482',
					borderColor: '#CCCCCC',
					borderWidth: 1,
					data:[<?php echo"$sun"?>, <?php echo"$mon"?>, <?php echo"$tue"?>, <?php echo"$wed"?>, <?php echo"$thu"?>, <?php echo"$F1"?>,<?php echo"$sat"?>,],
				},
				
				  
			  ]
			},
			
			options: {
				scales: {
					xAxes: [{stacked: true, display: true, scaleLabel: {display: true, labelString: 'Days of Week'}}],
					yAxes: [{stacked: true, display: true, scaleLabel: {display: true,labelString: 'Number of Data Points'}}]
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
