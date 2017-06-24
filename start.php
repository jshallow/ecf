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

		<title>Eco Culture Farms - Boxes</title>
		<link rel="icon" href="images/favicon.png">

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		
		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	</head>

	<body>
		<?=navbar()?>

		<main>
			<!-- Banner -->
			<div class="banner"><img src="images/home-banner.png"></div>
			<hr>
			
			<div class="row">
				<div class="col-xs-12 col-md-offset-2 col-md-8">
					<h1>Community Supported Agriculture (CSA)</h1>
					
					<p>Become a member of EcoCulture Farm’s CSA and receive a weekly box of vegetables. The current payment strategy provides customers a vegetable box at a constant price per season – basically allowing customers to make lower average payments once per week. The contents per box will depend on what has been scheduled to have in the box for that week. Due to the volatile nature of our ecosystem (sunshine, weather, insects, vertebrates, etc.), some of our produce may not be available during the scheduled weeks. If one of our products is unavailable for that week, we will compensate you with extra of some other product.  </p>
				</div>
			</div>
			<hr>
			
			<h1>How it Works</h1>
			<div class="row blurb-container">
				<div class="col-sm-4  blurb">
					<h4>Place Your Order</h4>
					Customize and place your order through our website in the section below. Don't forget to add any available extras, such as eggs, chicken, or more produce!
				</div>
				<div class="col-sm-4 blurb">
					<h4>Weekly Drop Off</h4>
					After packing our boxes with an array of freshly picked produce, we will drop off your box at an established pickup location.
				</div>
				<div class="col-sm-4 blurb">
					<h4>Go Get 'Em</h4>
					Head over to your zip code's designated pickup spot to grab your order of our seasonal vegetables. Enjoy your produce responsibly.
				</div>
			</div>
			
			<hr>
			<div class="row" style="text-align:center;">
				<!--
				<div class="col-xs-12"><h1><a href="add-items.php">Start Your Order</a></h1></div>
				-->
				We are currently working to provide an online solution to ordering our fresh produce. 
			</div>
			
		</main>
		
		<footer>
			<div class="col-xs-4 v-center">
				<a href="delivery.php">Delivery Area</a>
			</div>
			<div class="col-xs-4 vr v-center">
				<a href="faq.php">FAQ</a>
			</div>
			<div class="col-xs-4 vr v-center">
				<a href="contact.php">Contact Us</a>
			</div>
		</footer>	
		
		<script>window.jQuery || document.write('<script src="css/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	
	</body>
</html>
