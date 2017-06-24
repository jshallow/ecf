<?php
// for cart and logins
session_start();

include 'includes/navbar.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Eco Culture Farms - Who We Are</title>
		<link rel="icon" href="images/favicon.png">

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<!-- Custom CSS -->
		<link href="css/custom.css" rel="stylesheet">
	</head>

	<body>
		<?=navbar()?>
		
		<main>
			<!-- Banner -->
			<div class="banner"><img src="images/home-banner.png"></div>
			<hr>
			
			
			<!-- Quick Info -->
			<div class="row blurb-container">
				<div class="col-xs-12 col-sm-6 col-md-3 blurb">
					<a href="poultry.php">
						<img src="images/poultry.png"><br />
						Chickens for the Plate
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 blurb">
					<a href="eggs.php">
						<img src="images/eggs.png"><br />
						Cage-Free Chicken Eggs
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 blurb">
					<a href="pigs.php">
						<img src="images/pigs.png"><br />
						Pasture Raised Pork
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 blurb">
					<a href="produce.php">
						<img src="images/produce.png"><br />
						CSA Veggie Box
					</a>
				</div>
			</div>
		</main>
		
		
		<footer>
			<div class="col-xs-4 v-center">
				<a href="delivery.php">Delivery Area</a>
			</div>
			<div class="col-xs-4 v-center vr">
				<a href="faq.php">FAQ</a>
			</div>
			<div class="col-xs-4 v-center vr">
				<a href="contact.php">Contact Us</a>
			</div>
		</footer>	

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="css/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
