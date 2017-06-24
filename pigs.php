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

		<title>Eco Culture Farms - Home</title>
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
			
			<div class="product-window-inner">
				<div class="row">
					<div class="col-xs-12">
						<h1>Pasture Raised Pork</h1>
					</div>
				</div>
				<hr width=50%>
				
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<img src="images/about/pigs1.png" style="width:100%">
					</div>
					<div class="col-sm-12 col-md-8">
						Our heritage breed Red Wattle pigs have the space and freedom to run, jump, and frolic in the fields, and indeed they often do.  We use a rotational grazing pattern with all of our livestock in order to keep them moving.  They never stay in one spot for too long, allowing them access to new areas to explore while mitigating any damaging effect they may potentially have on the land.  We supplement our pigs’ feed with kitchen scraps from local restaurants, our home kitchen, and with forage crops grown in between our grape vines. Our piggies get to express the entire potential of their piginess.
					</div>
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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="css/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
		
	</body>