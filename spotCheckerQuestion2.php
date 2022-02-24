<!doctype html>
<!-- THIS PAGE DONE BY NATE FOSTER -->
<html lang="en">
	<head>
		<title>Question Two</title>
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
							<li class="nav-item"><a class="nav-link active" aria-current="page" href="finalQ2.php"><span data-feather="file"></span>Question Two</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ3.php"><span data-feather="users"></span>Question Three</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ4.php"><span data-feather="bar-chart-2"></span>Question Four</a></li>
							<li class="nav-item"><a class="nav-link" href="finalQ5.php"><span data-feather="layers"></span>Question Five</a></li>
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">What is the Busiest Time for the 30-Minute Parking Spot?</h1>
					</div>

					<canvas class="my-4 w-100" id="lineChart" width="900" height="380"></canvas>

						<section class="text-center">
							<hr class="featurette-divider">
							<h2>Observations</h2>
							<hr class="featurette-divider">
						</section>

						<section class="text-left">
							<h3 class="fw-light">The busiest time on Thursday was from 4:00PM to 11:59PM and the busiest time on
								Friday was from 12:00AM to 11:50AM. This was because a student parked overnight in the 30-minute spot 
								in McAllister parking lot.
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
			var ctx = document.getElementById('lineChart')
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: [ 
						'12-1pm',
						'1-2pm',
						'2-3',
						'3-4',
						'4-8pm',
						'8pm-3am',
						
					],
					datasets: [{
						data: [
							23,
							28,
							18,
							17,
							35,
						50,
						],
						lineTension: 0,
						backgroundColor: 'transparent',
						borderColor: '#6c6482',
						borderWidth: 4,
						pointBackgroundColor: '#6c6482'
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: false
							}
						}]
					},
					legend: {
						display: false
					}
				}
			})
		</script>		
		
	</body>
</html>
