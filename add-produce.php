<?php
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Custom CSS -->
		<link href="css/custom.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="lol"></div>
		<div class="container-fluid">
			<div class="row"><span id="current-season-box-title"></span></div>
			<div class="row">
				<div class="col-sm-2">
					<h3>Contents</h3>
					<!--<span id="box-contents"></span>-->
				</div>
				<div class="col-sm-10">
					<h3>Want More?</h3>
					<!--<span id="box-add"></span>-->
				</div>
			</div>
			<div class="row" id="box-body"></div>
			<div class="row" style="text-align:right;"><button type="button" id="add-box-to-cart-button" onclick="addToCart()" class="btn">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></span></button></div>
		</div>
	</body>
	
	<script>
		$.ajax({
	        type: "GET",
	        url: "php/get-active-box.php",
	        dataType: "json",
	        success: function(data,status) {
	        	$('#current-season-box-title').html("<h1>" + data[0].season + " " + data[0].year + " Box</h1>");
	        	
	        	// list of contents
	        	//$('#box-contents').html("");
				for(var i = 1; i < data.length; i++){
					$('#box-body').append(
						"<div class='row'>" +
							"<div class='col-xs-2'>" + data[i].name + "</div>" +
							"<div class='col-xs-2'>" + data[i].name + "</div>" +
							"<div class='col-xs-2'>$" + data[i].price + "/" + data[i].per + "</div>" +
						"</div>"
					);
				}
	        	$('#box-contents').append("</ul>");
	        	
	        	// add more veggies
	        },
	        complete: function(data,status) { 
	            //optional, used for debugging purposes
	            //alert(status);
	        }
	    });
	    
	    function addToCart(){
	    	var cart_id;
	    	
	    	$.ajax({
		        type: "GET",
		        url: "php/get-session-data.php",
		        dataType: "json",
		        success: function(data,status) {
			        cart_id = data['cart_id'];
		        },
		        complete: function(data,status) { 
		            //optional, used for debugging purposes
		            //alert(status);
		        }
		    });
		    
		    
	    }
	</script>
</html>