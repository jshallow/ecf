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
						<h1>Fresh Veggies</h1>
					</div>
				</div>
				<hr width=50%>
				
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<img src="images/about/crops1.png" style="width:100%">
					</div>
					<div class="col-sm-12 col-md-8">
						Here at EcoCulture Farms we’re dedicated to improving the natural landscape while simultaneously producing healthy food.  We do this by farming in harmony with the natural systems of our environment.  Our vegetable production beds are planted following the natural contour of the land.  Our permanent raised beds look a bit like the lines on a topographic map. By designing our production beds to match the natural contour of the land, we cut down water usage, improve soil health, and reduce erosion. 
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-sm-12 col-md-8">
						First, we dug 20 inch wide, 18 inch deep trenches along either side of each bed and filled them with wood chip mulch.  These mulched trenches act as water reservoirs when it rains; wood chips are porous and act as a sponge, holding onto water for later use.  During the dry season, this water is available to the plants in the growing beds.  This allows us to reduce our water application and conserve our most precious natural resource.  In addition, wood chip mulch will break down and turn into compost.  This compost can then contribute to the overall health of the soil in our growing beds. Planting on contour also slows the  movement of water down enough to eliminate erosion. 
					</div>
					<div class="col-sm-12 col-md-4 desktop" style="text-align:center">
						<img src="images/about/crops2.png" style="width:80%">
					</div>
				</div>
				<hr width="50%">
				
				<div class="row">
					<div class="col-xs-12 col-md-offset-2 col-md-8">
						<h1>Community Supported Agriculture (CSA)</h1>
						
						<p>Become a member of our CSA and receive a weekly box of vegetables.  We have two payment options. You can either pay per box or commit to the whole season and make lower average payments once per month. The price per box will depend on what we’re scheduled to have in the box for that week.  Due to the volatile nature of our ecosystem (sunshine, weather, insects, vertebrates, etc.), some of our produce may not be available during the scheduled weeks.  If one of our products is unavailable for that week, we will compensate you with extra of some other product.  Check out our prices below. </p>
					</div>
				</div>
				<hr width="50%">
				
				<div class="row">
					<h1>Current Season's Vegetables</h1>
					<ul class="product-list" id="product-list">
					</ul>
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
		
		<script>
			$.ajax({
                type: "GET",
                url: "php/get-active-box.php",
                dataType: "json",
                success: function(data,status) {
                	$('#product-list').html("");
					for(var i = 1; i < data.length; i++){
						$('#product-list').append(
							"<li>" + 
								data[i].name +
		                	"</li>");
					}
                },
                complete: function(data,status) { 
                    //optional, used for debugging purposes
                    //alert(status);
                }
            });
		</script>
		
	</body>
