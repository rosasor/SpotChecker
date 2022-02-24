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
		<title>Data Collection</title>
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
							<li><a href="finalP9.php" style="font-size:15px" class="text-white">Schematic & PCB</a></li>
							<li><a href="finalP11.php" style="font-size:15px" class="text-white">Hardware & Enclosure</a></li>
							<li><a href="finalP13.php" style="font-size:15px" class="text-white">Kiosk Design</a></li><br>
							<h4 style="font-size:25px" class="text-white">The Study</h4>
							<li><a href="finalP7.php" style="font-size:15px" class="text-white">Environmental Study</a></li>
							<li><a href="finalP10.php" style="font-size:15px" class="text-muted">Data Collection</a></li>
							<li><a href="finalP12.php" style="font-size:15px" class="text-white">Insights & Evidence</a></li>
						</ul>
					</div>
				
                </div>
            </div>
        </div>
		
			<div class="navbar navbar-dark bg-dark shadow-sm">
				<div class="container">
					<a href="finalP10.php" class="navbar-brand d-flex align-items-center"><strong>Data Collection</strong></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</div>
			
		</header>

		<div class="container-fluid">
			<div class="row">
                <!--remove code line below to make graph whole page, work on this formatting later-->
				<main>
				
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">30-Minute Parking Spot 7-day data collection</h1>
					</div>

					<canvas class="my-4 w-100" id="chart" width="825" height="380"></canvas>

					<div class="album py-0 bg-white">
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
									</tr>";


								$query = "SELECT * FROM columbia WHERE time BETWEEN 1636852025 AND 1642677208";
								$result = mysqli_query($conn, $query) or die ("Could not select.");
								while ($row = mysqli_fetch_array($result)){
									extract($row);

									$time = $time - 21600;
									

								$formatTime = date('l F d Y g:i A', $time);

								echo "<tr>
										<td>$distance</td>
										<td>$formatTime</td>
									</tr>";
								}
							?>

							</table>
						</div>
					</div>
                    
				</main>
                
			</div>
		</div>   
		
		
		<script>
    	var config = {
			type:    'line',
			data:    {
				datasets: [
					{
						label: "Distance Values",
						data: [
						
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
								$query = "SELECT * FROM columbia WHERE time BETWEEN 1636852025 AND 1642677208";
	
								$result = mysqli_query($conn, $query) or die ("Could not select.");
	
								while ($row = mysqli_fetch_array($result)){
									extract($row);
									//$time = $time - 10800;
									$newTime = $time * 1000;
									echo "{x: $newTime, y: $distance},";
									//echo "$time $distance $id<br>";
								}	
							?>

						],
						fill: false,
						borderColor: '#000000'
					},
				]
			},
			
			options: {
				scales: {
					xAxes: [{type: "time", time:{tooltipFormat: 'LLL'}, display: true, scaleLabel: {display: true, labelString: 'Time'}}],
					yAxes: [{display: true, scaleLabel: {display: true,labelString: 'Distance'}}]
					// Parsing Time Info available in "Local Aware Formats" at https://momentjs.com/docs/#/parsing/
				}	
			}
		};

		// Loads the Data into the Page
		window.onload = function() {
			var ctx = document.getElementById('chart').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
		</script>	

		
        	
		<div>
			<figure class="text-center">
				<p class="lead">
					
				</p>
		</div>

        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../bootstrap/js/feather.min.js"></script>
		<script>feather.replace({ 'aria-hidden': 'true' })</script>
		<script src="../bootstrap/js/Chart.Time.js"></script> 
        
	</body>
</html>
