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
		<title>Electronic Schematic & PCB</title>
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
                            <li><a href="finalP8.php" style="font-size:15px" class="text-white">Mid-Fidelity</a></li>
                            <li><a href="finalP9.php" style="font-size:15px" class="text-muted">Schematic & PCB</a></li>
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
                <a href="finalP9.php" class="navbar-brand d-flex align-items-center"><strong>Electronic Schematic & PCB</strong></a>
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
						<h1 class="fw-dark">Electronic Schematics & PCB</h1>
                        <hr class="featurette-divider">
                        <p class="lead text-muted"></p>
					</div>
				</div>
			</section>

            <div class="album py-3 bg-white">
				<div class="container">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

					<!-- PICTURE ROW ONE -->

                        <!-- BEGIN CARD BLOCK ONE -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="images/schematicSquare.png">
							</div>
						</div>
						<!-- END CARD BLOCK ONE -->

                        <!-- BEGIN CARD BLOCK TWO -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="images/frontPCB2Square.png">
							</div>
						</div>
						<!-- END CARD BLOCK TWO -->

                        <!-- BEGIN CARD BLOCK THREE -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="images/backPCB2Square.png">
							</div>
						</div>
						<!-- END CARD BLOCK THREE -->

                    <!-- PICTURE ROW TWO -->

                        <!-- BEGIN CARD BLOCK ONE -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="images/3dPCBRightSquare.png">
							</div>
						</div>
						<!-- END CARD BLOCK ONE -->

                        <!-- BEGIN CARD BLOCK TWO -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="images/3dPCBFrontSquare.png">
							</div>
						</div>
                        <!-- END CARD BLOCK TWO -->

                        <!-- BEGIN CARD BLOCK THREE -->
						<div class="col">
							<div class="card shadow-sm">
								<img src="images/3dPCBLeftSquare.png">
							</div>
						</div>
						<!-- END CARD BLOCK THREE -->

                    </div>
                </div>
            </div>

            <br><br>

			<div class=" py-3 bg-white">
				<div class="container">
                    <table>
                        <tr>
                            <td><h1 class="fw-light">Bill of Materials</h1></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Component</th>
                            <th>Item Cost</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Supplier</th>
                        </tr>

                        <tr>
                            <td>Ultrasonic Range Sensor</td>
                            <td>$5.99</td>
                            <td>1</td>
                            <td>$5.99</td>
                            <td>Amazon</td>                            
                        </tr>
                        <tr>
                            <td>ESP32</td>
                            <td>$10.99</td>
                            <td>1</td>
                            <td>$10.99</td>
                            <td>Amazon</td>                            
                        </tr>
                        <tr>
                            <td>PCB</td>
                            <td>$4.00</td>
                            <td>1</td>
                            <td>$4.00</td>
                            <td>Amazon</td>                            
                        </tr>
                        <tr>
                            <td>Battery Pack</td>
                            <td>$39.00</td>
                            <td>1</td>
                            <td>$39.00</td>
                            <td>Amazon</td>                            
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Cost</td>
                            <td>$59.98</td>
                            <td></td>                            
                        </tr>
                    </table>
                    <br><br>
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
