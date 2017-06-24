<?php

function navbar(){
    $url = basename($_SERVER['PHP_SELF']);
    $active = " class='active'";
    
    echo "<nav class='navbar navbar-default navbar-fixed-top'>
			<div class='container'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
						<span class='sr-only'>Toggle navigation</span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a class='navbar-brand' href='index.php'>E.C.F.</a>
				</div>
				<div id='navbar' class='navbar-collapse collapse'>
					<ul class='nav navbar-nav navbar-center'>
						<li";
						if ($url == "about.php") 
						    echo $active;
	echo				"><a href='about.php'>Who We Are</a></li>
						<li";
						if ($url == "products.php")
						    echo $active;
	echo				"><a href='products.php'>About Our Products</a></li>
						<li";
						if ($url == "start.php")
						    echo $active;
	echo				"><a href='start.php'>Get Started</a></li>
					</ul>
					<ul class='nav navbar-nav navbar-right'>";
						navbarright();
	echo			"</ul>
				</div>
			</div>
		</nav>";
    
}

function navbarright(){
    $url = basename($_SERVER['PHP_SELF']);
    $active = " class='active'";
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if($_SESSION['userid'] == 1){
            echo "<li";
            if($url == "admin.php")
                echo $active;
            echo "><a href='admin.php'>Admin Dashboard</a></li>";
        }  else{
            echo "<li";
            if($url == "dashboard.php")
                echo $active;   
            echo "><a href='dashboard.php'>Dashboard</a></li>";
        }
        echo "<li><a href='php/process-logout.php'>Logout</a></li>";
    } else{
        echo "<li";
        if ($url == "signup.php")
            echo $active;
        echo "><a href='signup.php'>Login or Register</a></li>";
    }
}

?>