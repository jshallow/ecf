<?php
// for cart and logins
session_start();

// login/register vs logout
include 'includes/navbar.php';

function getCarouselImages(){
	// get all image names from file
	$imgPath = 'images/carousel/';
	
	// glob 'em
	foreach(glob($imgPath.'*') as $filename){
		echo "<div><img src='images/carousel/" . basename($filename) . "'></div>";
	}
}

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
		<!-- Slick -->
		<link rel="stylesheet" type="text/css" href="slick/slick.css">
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
		<!-- Custom CSS -->
		<link href="css/custom.css" rel="stylesheet">
	</head>

	<body>
		<!--
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">E.C.F.</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-center">
						<li><a href="about.php">Who We Are</a></li>
						<li><a href="products.php">About Our Products</a></li>
						<li><a href="start.php">Get Started</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?=navbarright()?>
					</ul>
				</div>
			</div>
		</nav>
		-->
		<?=navbar()?>
		
		<main>
			<!-- Banner -->
			<div class="banner"><img src="images/home-banner.png"></div>
			<hr>
			
			<div class="row">
				<h1>Mission Statement</h1>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-md-offset-2 col-md-8">
					Our mission is to use regenerative agricultural techniques in order to utilize and improve the productivity of the environment from which we draw our sustenance.  We will practice responsible land stewardship in order to harvest from and simultaneously improve our ecosystem, so that we may leave our children with a better world than we have now.
				</div>
			</div>
			<hr>
			
			<div class="row">
				<h1>Vision Statement</h1>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-md-offset-2 col-md-8">
					We strive to steward a highly functioning ecosystem in order to produce an abundance and variety of edible and salable products.  Closing the waste stream, improving relationships with our local community, and spreading knowledge and awareness around food and agriculture are central to the functioning of the farm.  Each enterprise of the farm has the ability to stand alone yet each play a pivotal role in each other’s functionality and efficiency.  Our livestock, vegetable production, fruit tree cultivation, and soil building programs will feed and support each other in a cohesive and harmonious manner.
				</div>
			</div>
			<hr>
			
			<div class="row">
				<h1 style="margin-bottom:0px">Gallery</h1>
			</div>
			<div class="row gallery">
				<div class="col-xs-12">
					<section class="variable-width slider">
						<?=getCarouselImages()?>
					</section>
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
		
		<!-- slick -->
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	    <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
	    <script type="text/javascript">		
			$(document).on('ready', function() {
				$(".variable-width").slick({
					//dots: true,
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 5000,
					centerMode: true,
					variableWidth: true
				});
				
			});
		</script>
	</body>
</html>
