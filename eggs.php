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
						<h1>Cage-Free Chicken Eggs</h1>
					</div>
				</div>
				<hr width=50%>
				
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<img src="images/about/eggs1.png" style="width:100%">
					</div>
					<div class="col-sm-12 col-md-8">
						We raise our laying hens on non-gmo, no-corn, no-soy feed and we supplement with all organic kitchen scraps from local restaurants.  This helps us to close the waste loop in our local community.  We pasture raise them by moving their fenced enclosures on a rotation to help control their effect on the landscape, turning it from potentially damaging to one of regeneration. We avoid keeping them in one place for too long to maintain their health and improve the health of the soil.  Our birds are truly cage free and free range.
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
</html>
