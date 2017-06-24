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

		<title>Eco Culture Farms - Contact</title>
		<link rel="icon" href="images/favicon.png">

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
	</head>

	<body>
		<?=navbar()?>

		<main>
			<!-- Banner -->
			<div class="banner"><img src="images/home-banner.png"></div>
			<hr>
			
			<div class="row">
				<h1>Contact</h1>
			</div>
			<hr>
			
			<div class="row">
				<div class="col-xs-12">
					<p align="center">
						Email: contact@ecoculturefarms.org<br />
						Location: 36655 Kayfour Rd., Temecula, CA 92592<br />
					</p>
				</div>
			</div>
			<hr>
			
			<div class="row">
				<h1>Social Media</h1>
				<p align="center">
					<a href="https://www.facebook.com/EcoCultureFarms/">
						<img src="images/fb-icon.png" width="50px"></a>
					<a href="https://www.instagram.com/ecoculture_farms/">
						<img src="images/ig-icon.png" width="50px"></a>
				</p>
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
