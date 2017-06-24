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
						<h1>Chickens for the Plate</h1>
					</div>
				</div>
				<hr width=50%>
				
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<img src="images/about/poultry1.png" style="width:100%">
					</div>
					<div class="col-sm-12 col-md-8">
						All of our birds are raised on non-gmo, no-corn, no-soy feed.  They are raised using rotational grazing techniques which allows them constant access to fresh forage, sunlight, air and soil.  Their freedom to express their chickeny nature translates into a leaner meat with more flavor.
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-sm-12 col-md-8">
						Our meat bird program helps us improve the health of our soils while producing a clean and healthy source of protein.  We raise our baking chickens in a mobile chicken coop/run that we move between the rows of our wine grape vineyard.  Our birds have access to soil, fresh air, sunshine, and fresh forage at all times.  Rotating our birds through the vines allows us to utilize many of the intrinsic characteristics of each chicken.  They fertilize the soil, eat insect pests and  weed seeds, and turn organic matter into the top two inches of soil.  This helps to improve the health of the soil which in turn helps to improves the health of the bird.  
					</div>
					<div class="col-sm-12 col-md-4 desktop">
						<img src="images/about/poultry2.png" style="width:100%">
					</div>
				</div>
				<br />
				<div class="row" style="text-align:center">
					<i>Interested in including a roasting chicken in your CSA box?<br />
					Click to add one to your order.</i>
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
