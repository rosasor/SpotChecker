<!doctype html>
<!-- THIS PAGE DONE BY ROSA WHEELEN -->
<html lang="en">

	<head>
		<title>Approaches</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- <link href="../bootstrap/css/carousel.css" rel="stylesheet"> -->
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
								<li><a href="finalP4.php" style="font-size:15px" class="text-muted">Approaches</a></li>
                                <li><a href="finalP5.php" style="font-size:15px" class="text-white">Questions</a></li>
								<li><a href="finalP6.php" style="font-size:15px" class="text-white">Fermi Problems</a></li><br>
								<h4 style="font-size:25px" class="text-white">Hardware</h4>
								<li><a href="finalP8.php" style="font-size:15px" class="text-white">Mid-Fidelity</a></li>
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
                    <a href="finalP4.php" class="navbar-brand d-flex align-items-center"><strong>Approaches</strong></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            
        </header>

		<main>

			<section class="py-2 text-center container">
					<div class="row py-lg-3">
						<div class="col-lg-6 col-md-8 mx-auto">
							<h1 class="fw-dark">The Approaches</h1>
							<hr class="featurette-divider">
						</div>

						<div class="col-lg-8 col-md-8 mx-auto">
							<h3 class="fw-light">Our group decided to take the ultrasonic sensor approach. We came to this decision because it is the most practical sensor to use for this specific study. This sensor will be placed behind the curb so it is unlikely to get damaged by a vehicle.</h3>
						</div>
						
					</div>
			</section>

			<!-- FEATURETTES -->
			<div class="container marketing mx-auto"><br>

				<div class="row">
					<div class="col-lg-4">
					</div>
				</div>

					<!-- FEATURETTE ONE -->
				<hr class="featurette-divider">
					<div class="row featurette">
						<div class="col-md-7">
							<h2 class="featurette-heading">Ultrasonic Sensor </h2>
							<p style="font-size:25px" class="lead">The first approach to collecting whether a parking spot is occupied is by using an ultrasonic range finder. This sensor can measure the distance away an object is from itself. Our group would be using this sensor to determine if a car is parked in a spot. This sensor can sense an object from up to 13 feet from itself so, it will be able to detect whether a car is parked in the spot or not. </p>
						</div>
						<div class="col-md-5">
							<img src="images/ultrasonicSensor.jpg" width="500px">
						</div>
					</div>
				
					<!-- FEATURETTE TWO -->
				<hr class="featurette-divider">
					<div class="row featurette">
						<div class="col-md-7">
							<h2 class="featurette-heading">Photoresistor </h2>
							<p style="font-size:25px" class="lead">The second approach to tell whether a parking spot is occupied is by using a light sensor. This sensor would be placed in the center of a parking spot, being underneath a car. This would tell us that there is a car parked in the spot because the sensors light levels would decrease. </p>
						</div>
						<div class="col-md-5">
							<img src="images/lightSensor2.jpg" width="500px">
						</div>
					</div>

					<!-- FEATURETTE THREE -->
				<hr class="featurette-divider">
					<div class="row featurette">
						<div class="col-md-7">
							<h2 class="featurette-heading">Pixy2 Camera Sensor </h2>
							<p style="font-size:25px" class="lead">The third approach to tell whether a parking spot is occupied is by using a pixy camera. This sensor can track specific objects in its camera view. We would track the camera to see if a car parks in a spot.</p>
						</div>
						<div class="col-md-5">
							<img src="images/pixiSensor.jpg" width="500px">
						</div>
					</div>

			</div>
		
		</main>

		<footer class="text-muted py-5">
			<div class="container"> 
			</div>
		</footer>

		<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

	</body>
</html>