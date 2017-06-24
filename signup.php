<?php
session_start();

include "includes/navbar.php";

function messagePanel(){
	if(isset($_SESSION['login-message'])){
	    echo "<div class='message-panel'>" .
	    		"<div class='row'>" .
		    		"<div class='col-md-offset-3 col-md-6'>" .
		    			"<div class='panel panel-message'>" .
		    				$_SESSION['login-message'] .
		    			"</div>" .
		    		"</div>" .
		    	"</div>" .
	    	"</div>";
	    session_destroy();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Eco Culture Farms - Sign Up</title>
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
					<ul class="nav navbar-nav">
						<li><a href="about.php">Who We Are</a></li>
						<li><a href="products.php">About Our Products</a></li>
						<li><a href="start.php">Get Started</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="signup.php">Login or Register</a></li>
					</ul>
				</div>
			</div>
		</nav>
		-->
		<?=navbar()?>
		
	    <main>
	    	<?=messagePanel();?>
	    	<div class="login-container">
	    		<div class="row">
	    			<div class="col-md-offset-3 col-md-6">
	    				<div class="panel panel-login">
	    					<div class="panel-heading">
	    						<div class="row">
	    							<div class="col-xs-6">
	    								<a href="#" id="login-header-link" class="active">Login</a>
	    							</div>
	    							<div class="col-xs-6">
	    								<a href="#" id="register-header-link">Register</a>
	    							</div>
	    						</div>
	    					</div>
	    					<hr class="panel-hr">
	    					<div class="panel-body">
	    						<div class="row">
	    							<div class="col-lg-12">
	    								<form id="login-form" method="post" action="php/process-login.php">
	    									<div class="col-xs-12 form-group">
	    										<label for="login-email">Email Address</label>
	    										<input type="email" class="form-control" name="login-email" id="login-email" tabindex="1" placeholder="Enter Email">
	    									</div>
	    									<div class="col-xs-12 form-group">
	    										<label for="password">Password</label>
	    										<input type="password" class="form-control" name="login-password" id="login-password" tabindex="2" placeholder="Enter Password">
	    									</div>
	    									<div class="form-group">
	    										<div class="col-sm-6 col-sm-offset-3">
	    											<input type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="Log In">
	    										</div>
	    									</div>
	    								</form> 
	    								<form id="register-form" class="form-inactive" method="post" onsubmit="return validateRegistration()" action="php/add-user.php" style="display: none">
	    									<div class="col-sm-6 form-group" id="form-group-first-name">
	    										<label for="firstName">First Name</label>
	    										<input type="text" class="form-control" name="firstName" id="firstName" tabindex="1" placeholder="First Name">
	    										<div class="form-feedback" id="first-name-feedback"></div>
	    									</div>
	    									<div class="col-sm-6 form-group" id="form-group-last-name">
	    										<label for="lastName">Last Name</label>
	    										<input type="text" class="form-control" name="lastName" id="lastName" tabindex="2" placeholder="Last Name">
	    										<div class="form-feedback" id="last-name-feedback"></div>
	    									</div>
	    									<div class="col-xs-12 form-group" id="form-group-zip">
	    										<label for="zip">Zip Code</label>
	    										<input type="text" class="form-control" name="zip" id="zip" tabindex="3" placeholder="Enter Zip Code">
	    										<div class="form-feedback" id="zip-feedback"></div>
	    									</div>
	    									<div class="col-xs-12 form-group" id="form-group-email">
	    										<label for="email">Email Address</label>
	    										<input type="email" class="form-control" name="email" id="email" tabindex="4" placeholder="Enter Email">
	    										<div class="form-feedback" id="email-feedback"></div>
	    									</div>
	    									<div class="col-xs-12 form-group" id="form-group-password">
	    										<label for="password">Password</label>
	    										<input type="password" class="form-control" name="password" id="password" tabindex="5" placeholder="Enter Password">
	    										<div class="form-feedback" id="password-feedback"></div>
	    									</div>
	    									<div class="col-xs-12 form-group" id="form-group-confirm-password">
	    										<label for="confirm-password">Confirm Password</label>
	    										<input type="password" class="form-control" name="confirm-password" id="confirm-password" tabindex="6" placeholder="Confirm Password">
	    										<div class="form-feedback" id="confirm-password-feedback"></div>
	    									</div>
	    									<div class="form-group form-group-submit">
	    										<div class="col-sm-6 col-sm-offset-3">
	    											<input type="submit" name="register-submit" id="register-submit" tabindex="7" class="form-control btn btn-login" value="Register">
	    										</div>
	    									</div>
	    								</form>
	    							</div>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </main>
	    
	    <footer>
	        
	    </footer>
	    
	    <script src="/js/login-verification.js"></script>
	    
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="css/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
    
</html>