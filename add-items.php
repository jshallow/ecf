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
			
			<div class="row product-buttons">
    			<div class="btn-group" role="group" aria-label="Products">
    			    <button type="button" class="btn btn-produce btn-default active" value="add-produce">Produce</button>
    			    <button type="button" class="btn btn-produce btn-default" value="add-eggs">Eggs</button>
    			    <button type="button" class="btn btn-produce btn-default" value="add-pultry">Poultry</button>
    			    <button type="button" class="btn btn-produce btn-default" value="add-pigs">Pigs</button>
    			</div>
			</div>
			<hr />
			<div class="row product-window-outer" style="background-color:transparent;">
				<div class="col-xs-12" id="product-info"></div>
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
		
		<script>
			$('.btn-produce').width(
				Math.max.apply( 
					Math, 
					$('.btn').map(function(){
						return $(this).outerWidth();
					}).get()
				)
			);
			
			$('.btn-produce').on('click', function(e){
			    if(!$(this).hasClass('active')){
    				$('.product-window-outer').css("display", 'inherit');
    				$('.btn-produce').not(this).removeClass('active');
    				$(this).addClass('active');
    				
    				$('.product').not('.' + this.value).css("visibility", 'hidden');
    				$('.' + this.value).css("visibility", 'visible');
    				
    				$("#product-info").load(this.value + ".php");
			    }
			});
			
			$("#product-info").load("add-produce.php");
		</script>
	</body>
</html>



<!-- 
<form>
	<!-- BOXES 
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4" id="current-season-box-title"></div>
			<div class="col-sm-8 product-list" id="current-season-box-contents"></div>
		</div>
		<div class="row" style="text-align:right;"><button type="button" id="add-box-to-cart-button" class="btn">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></span></button></div>
	</div>
	<hr width="75%">
	
	<!-- EGGS 
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4" id="egg-title"><h3>Cage-Free Eggs</h3></div>
			<div class="col-sm-8" id="egg-options"></div>
		</div>
		<div class="row" style="text-align:right;"><button type="button" id="add-eggs-to-cart-button" class="btn">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></span></button></div>
	</div>
	<hr width="75%">
	
	<!-- POULTRY 
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4" id="egg-title"><h3>Cage-Free Chickens</h3></div>
			<div class="col-sm-8" id="egg-options"></div>
		</div>
		<div class="row" style="text-align:right;"><button type="button" id="add-eggs-to-cart-button" class="btn">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></span></button></div>
	</div>
	<hr width="75%">
	
	<!-- PIGS 
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4" id="egg-title"><h3>Pasture-Raised Pork</h3></div>
			<div class="col-sm-8" id="egg-options"></div>
		</div>
		<div class="row" style="text-align:right;"><button type="button" id="add-eggs-to-cart-button" class="btn">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></span></button></div>
	</div>
</form>
-->