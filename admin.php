<?php
// for cart and logins
session_start();

// login/register vs logout
include 'includes/navbar-right.php';

// if not admin, kick out
if($_SESSION['userid'] != 1){
    header('Location: /php/process-logout.php');
}

// for db calls
include 'includes/db-connection.php';
$conn = getDatabaseConnection("ecf");

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

		<main>
			<!----------------
				  PRODUCTS
			  ------------------>
			<h1 id="product-header">
				Products 
				<span style='font-size: 20px' class='glyphicon glyphicon-chevron-down' id='product-arrow'></span>
			</h1>
			<div id="product-area" style="display:none;">
				<h1>Add Category</h1>
				<form class="row">
					<div class="form-group col-sm-2" id="add-category-fg">
						<label class="sr-only" for="add-category">Add Category</label>
						<input class="form-control" type="text" id="add-category" placeholder="Category Name">
					</div>
					<div class="form-group col-sm-2" id="add-category-button">
						<button onclick="addCategory()" type="button" id="add-category-button" class="btn">Add Category</button>
					</div>
				</form>
				
				<h1>Add Product</h1>
				<form class="row">
					<div class="form-group col-sm-2" id="add-product-name-fg">
						<label class="sr-only" for="add-product-name">Name</label>
						<input class="form-control" type="text" id="add-product-name" placeholder="Product Name">
					</div>
					<div class="form-group col-sm-2" id="add-product-category-fg">
						<label class="sr-only" for="add-product-category">Category</label>
						<select class="form-control" id="add-product-category">
							<option selected value="">Category</option>
						</select>
					</div>
					<div class="form-group col-sm-2" id="add-product-price-fg">
						<label class="sr-only" for="add-product-price">Price</label>
						<input class="form-control" type="text" id="add-product-price" placeholder="Price">
					</div>
					<div class="form-group col-sm-2" id="add-product-per-fg">
						<label class="sr-only" for="add-product-per">Per</label>
						<select class="form-control" id="add-product-per">
							<option selected value="">Per</option>
							<option value="each">each</option>
							<option value="pound">pound</option>
							<option value="bunch">bunch</option>
							<option value="dozen">dozen</option>
						</select>
					</div>
					<div class="form-group col-sm-2" id="add-product-activity-fg">
						<label class="sr-only" for="add-product-activity">Activity</label>
						<select class="form-control" id="add-product-activity">
							<option selected value="">Activity</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<div class="form-group col-sm-2" id="add-product-stock-fg">
						<label class="sr-only" for="add-product-stock">Stock</label>
						<input class="form-control" type="number" min="0" id="add-product-stock" placeholder="Stock">
					</div>
					<div class="form-group col-sm-2">
						<button onclick="addProduct()" type="button" id="add-product-button" class="btn">Add Product</button>
					</div>
				</form>
				
				<form class="form-inline" style="text-align:right;padding-bottom: 5px;">
					<label class="sr-only" for="categoryFilter">Category</label>
					<select class="form-control" id="category-filter">
						<option selected value="">All Categories</option>
					</select>
					
					<label class="sr-only" for="activeFilter">Active</label>
					<select class="form-control" id="active-filter">
						<option selected value="">All Activities</option>
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
					<button onclick="getData()" type="button" id="filter-button" class="btn">Filter</button>
				</form>
				<div class="products table-responsive">
					<table class="table table-bordered" id="product-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Category</th>
								<th>Price</th>
								<th>Per</th>
								<th>Stock</th>
								<th>Active</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="product-table-body"></tbody>
					</table>
				</div>
			</div>
			
			<!----------------
				  CUSTOMERS
			  ------------------>
		    <h1 id="customer-header">
		    	Customers 
		    	<span style='font-size: 20px' class='glyphicon glyphicon-chevron-down' id='customer-arrow'></span>
		    </h1>
		    <div id="customer-area" style="display:none;">
		    	<div style="text-align:right;padding-bottom: 5px;">
		    		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal">Add Customer</button>
		    	</div>
		    	<div class="customers">
					<table class="table table-bordered" id="customer-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Dropoff Location</th>
								<th>Functions</th>
							</tr>
						</thead>
						<tbody id="customer-table-body"></tbody>
					</table>
				</div>
		    </div>
			
			
			<!----------------
				   ORDERS
			  ------------------>
		    <h1 id="order-header">
		    	Orders 
		    	<span style='font-size: 20px' class='glyphicon glyphicon-chevron-down' id='order-arrow'></span>
		    </h1>
		    <div id="order-area" style="display:none;">
		    	<div class="orders">
					<table class="table table-bordered" id="order-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Status</th>
								<th>Location</th>
								<th>Timestamp</th>
							</tr>
						</thead>
						<tbody id="order-table-body"></tbody>
					</table>
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
		
		
		<!----------------
			   MODALS
		  ------------------>
		
		<!-- EDIT PRODUCT MODAL -->
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editModalLabel">Edit</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
						<form class="row">
							<div class="form-group" style="display:none;" id="edit-product-id-fg">
								<label for="edit-product-id">ID</label>
								<input class="form-control" type="text" id="edit-product-id" placeholder="Product ID">
							</div>
							<div class="form-group col-sm-4" id="edit-product-name-fg">
								<label for="edit-product-name">Name</label>
								<input class="form-control" type="text" id="edit-product-name" placeholder="Product Name">
							</div>
							<div class="form-group col-sm-4" id="edit-product-category-fg">
								<label for="edit-product-category">Category</label>
								<select class="form-control" id="edit-product-category">
									<option selected value="">Category</option>
								</select>
							</div>
							<div class="form-group col-sm-4" id="edit-product-price-fg">
								<label for="edit-product-price">Price</label>
								<input class="form-control" type="text" id="edit-product-price" placeholder="Price">
							</div>
							<div class="form-group col-sm-4" id="edit-product-per-fg">
								<label for="edit-product-per">Per</label>
								<select class="form-control" id="edit-product-per">
									<option selected value="">Per</option>
									<option value="each">each</option>
									<option value="pound">pound</option>
									<option value="bunch">bunch</option>
									<option value="dozen">dozen</option>
								</select>
							</div>
							<div class="form-group col-sm-4" id="edit-product-activity-fg">
								<label for="edit-product-activity">Activity</label>
								<select class="form-control" id="edit-product-activity">
									<option selected value="">Activity</option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</div>
							<div class="form-group col-sm-4" id="edit-product-stock-fg">
								<label for="edit-product-stock">Stock</label>
								<input class="form-control" type="number" min="0" id="edit-product-stock" placeholder="Stock">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" onclick="editProduct()" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"> Submit</button>
						<button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-ban-circle"> Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- DELETE PRODUCT MODAL -->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteModalLabel">Delete</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
						<span id="delete-modal-body">Are you sure you want to delete?</span>
						<div style="display:none;">
							<form>
								<div class="form-group" id="delete-product-id-fg">
									<label for="delete-product-id">ID</label>
									<input class="form-control" type="text" id="delete-product-id" placeholder="Product ID">
								</div>
								<div class="form-group" id="delete-product-name-fg">
									<label for="delete-product-name">Name</label>
									<input class="form-control" type="text" id="delete-product-name" placeholder="Product Name">
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger" onclick="deleteProduct()" data-dismiss="modal"><span class="glyphicon glyphicon-trash"> Delete</button>
						<button type="submit" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-ban-circle"> Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- ADD CUSTOMER MODAL -->
		<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModelLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addCustomerModelLabel">Add Customer</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
						<form class="row">
							<div class="form-group col-sm-6" id="add-customer-first-name-fg">
								<label for="add-customer-first-name">First Name</label>
								<input class="form-control" type="text" id="add-customer-first-name" placeholder="First Name">
							</div>
							<div class="form-group col-sm-6" id="add-customer-last-name-fg">
								<label for="add-customer-last-name">First Name</label>
								<input class="form-control" type="text" id="add-customer-last-name" placeholder="Last Name">
							</div>
							<div class="form-group col-sm-12" id="add-customer-email-fg">
								<label for="add-customer-email">Email</label>
								<input class="form-control" type="text" id="add-customer-email" placeholder="Email">
							</div>
							<div class="form-group col-sm-6" id="add-customer-address-1-fg">
								<label for="add-customer-address-1">Address Line 1</label>
								<input class="form-control" type="text" id="add-customer-address-1" placeholder="Address Line 1">
							</div>
							<div class="form-group col-sm-6" id="add-customer-address-2-fg">
								<label for="add-customer-address-2">Address Line 2</label>
								<input class="form-control" type="text" id="add-customer-address-2" placeholder="Address Line 2">
							</div>
							<div class="form-group col-sm-6" id="add-customer-city-fg">
								<label for="add-customer-city">City</label>
								<input class="form-control" type="text" id="add-customer-city" placeholder="City">
							</div>
							<div class="form-group col-sm-3" id="add-customer-zip-fg">
								<label for="add-customer-zip">Zip</label>
								<input class="form-control" type="text" id="add-customer-zip" placeholder="Zip Code">
							</div>
							<div class="form-group col-sm-3" id="add-customer-dropoff-fg">
								<label for="add-customer-dropoff">Dropoff</label>
								<input class="form-control" type="text" id="add-customer-dropoff" placeholder="Dropoff">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" onclick="addCustomer()" data-dismiss="modal"><span class="glyphicon glyphicon-ok-circle"> Submit</button>
						<button type="submit" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-ban-circle"> Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- VIEW CUSTOMER MODAL -->
		
		<!-- EDIT CUSTOMER MODAL -->
		
		<!-- REMOVE CUSTOMER MODAL -->
		<div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteCustomerModalLabel">Delete Customer</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
						<span id="delete-customer-modal-body">Are you sure you want to delete?</span>
						<div style="display:none;">
							<form>
								<div class="form-group" id="delete-customer-id-fg">
									<label for="delete-customer-id">ID</label>
									<input class="form-control" type="text" id="delete-customer-id" placeholder="Customer ID">
								</div>
								<div class="form-group" id="delete-customer-name-fg">
									<label for="delete-customer-name">Name</label>
									<input class="form-control" type="text" id="delete-customer-name" placeholder="Customer Name">
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger" onclick="deleteCustomer()" data-dismiss="modal"><span class="glyphicon glyphicon-trash"> Delete</button>
						<button type="submit" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-ban-circle"> Cancel</button>
					</div>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="css/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/ie10-viewport-bug-workaround.js"></script>
		
		<script>
			function getData(){
				var categories = getCategories();
				$.ajax({
	                type: "GET",
	                url: "php/admin-functions.php",
	                dataType: "json",
	                data: {
	                	func: 'getProducts', 
	                	category: $("#category-filter").val(),
	                	activity: $("#active-filter").val()
	                },
	                success: function(data,status) {
	                	$('#product-table-body').html("");
						for(var i = 0; i < data.length; i++){
							$('#product-table-body').append(
								"<tr>" + 
			                		"<td>" + data[i].name + "</td>" +
			                		"<td>" + categories[data[i].category_id] + "</td>" +
			                		"<td>" + data[i].price + "</td>" +
			                		"<td>" + data[i].per + "</td>" +
			                		"<td>" + data[i].stock + "</td>" +
			                		"<td>" + (data[i].active == 1 ? "Active" : "Inactive") + "</td>" +
								    "<td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#editModal' data-id='" + data[i].id + "' data-name='" + data[i].name + "' data-category='" + data[i].category_id + "' data-price='" + data[i].price + "' data-per='" + data[i].per + "' data-activity='" + data[i].active + "' data-stock='" + data[i].stock + "'><span class='glyphicon glyphicon-pencil'></span></button></p></td>" +
								    "<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#deleteModal' data-id='" + data[i].id + "' data-name='" + data[i].name + "'><span class='glyphicon glyphicon-trash'></span></button></p></td>" +
			                	"</tr>"
			                );
						}
	                },
	                complete: function(data,status) { 
	                    //optional, used for debugging purposes
	                    //alert(status);
	                }
	            });
			}
			
			function getCustomers(){
				var categories = getCategories();
				$.ajax({
	                type: "GET",
	                url: "php/admin-functions.php",
	                dataType: "json",
	                data: {
	                	func: 'getCustomers', 
	                	//category: $("#category-filter").val(),
	                	//activity: $("#active-filter").val()
	                },
	                success: function(data,status) {
	                	$('#customer-table-body').html("");
						for(var i = 0; i < data.length; i++){
							$('#customer-table-body').append(
								"<tr>" + 
			                		"<td>" + data[i].firstName + " " + data[i].lastName + "</td>" +
			                		"<td>" + data[i].email + "</td" +
			                		"<td>" + data[i].city + "</td>" +
			                		"<td>" + data[i].dropoff + "</td>" +
			                		"<td>" + (data[i].registered == 1 ? 
			                			"<button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#viewCustomerModal' data-id='" + data[i].userid + "' data-name='" + data[i].firstName + " " + data[i].lastName + "'><span class='glyphicon glyphicon-eye-open'></span></button>" : 
			                			"<button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#deleteCustomerModal' data-id='" + data[i].userid + "' data-name='" + data[i].firstName + " " + data[i].lastName + "'><span class='glyphicon glyphicon-trash'></span></button>" ) +
			                	"</tr>");
						}
	                },
	                complete: function(data,status) { 
	                    //optional, used for debugging purposes
	                    //alert(status);
	                }
	            });
			}
			
            function getCategories(){
				var categories = [];
				$.ajax({
	                type: "GET",
	                url: "php/admin-functions.php",
	                dataType: "json",
	                async: false,
	                data: {func: 'getCategories'},
	                success: function(data,status) {
	                    for(var i = 0; i < data.length; i++){
	                        categories[data[i].id] = data[i].name;
	                    }
	                },
	                complete: function(data,status) { 
	                    //optional, used for debugging purposes
	                    //alert(categories.length);
	                }
	            });
	            return categories;
			}
            
            function printCategories(categories){
            	$("#category-filter").html("<option value=\"\">All Categories</option>");
            	$("#add-product-category").html("<option value=\"\">Category</option>");
            	$("#edit-product-category").html("<option value=\"\">Category</option>");
                for(var i = 0; i < categories.length; i++){
                	if(categories[i]) {
	                    $("#category-filter").append("<option value=\"" + i + "\">" + categories[i] + "</option>");
	                    $("#add-product-category").append("<option value=\"" + i + "\">" + categories[i] + "</option>");
	                    $("#edit-product-category").append("<option value=\"" + i + "\">" + categories[i] + "</option>");
                	}
                }
            }
            
			function addCategory(){
				if($("#add-category").val() != ""){
					$.ajax({
		                type: "GET",
		                url: "php/admin-functions.php",
		                data: {
		                	func: 'addCategory', 
		                	name: $("#add-category").val(),
			                success: function(data,status) {
			                	alert("Category " + $("#add-category").val() + " successfully added!");
			                },
			                complete: function(data,status) { 
			                	//alert("Done: " + status);
			                }
		                }
		            });
		            
			    	setTimeout(function(){
			    		$("#add-category").val("");
			    		printCategories(getCategories());
			    	}, 500);
				}
			}
			
			function addCustomer(){
				$.ajax({
	                type: "POST",
	                url: "php/add-user.php",
	                data: {
	                	firstName: $("#add-customer-first-name").val(),
	                	lastName: $("#add-customer-last-name").val(),
	                	email: $("#add-customer-email").val(),
	                	password: "",
	                	address1: $("#add-customer-address1").val(),
	                	address2: $("#add-customer-address2").val(),
	                	city: $("#add-customer-city").val(),
	                	state: 'CA',
	                	zip: $("#add-customer-zip").val(),
	                	dropoff: $("#add-customer-dropoff").val(),
	                	registered: 0,
	                	receive_emails: 0
	                },
		            success: function(data,status) {
		                alert("Customer " + $("#add-customer-first-name").val() + " successfully added!");
		            },
		            complete: function(data,status) { 
		                	//alert("Done: " + status);
		            }
	            });
	            
		    	setTimeout(function(){
		    		getCustomers();
		    	}, 500);
			}
			
			function verifyName(){
				if($("#add-product-name").val() == ""){
					$("#add-product-name-fg").addClass("has-error");
					return false;
				} else{
					$("#add-product-name-fg").removeClass("has-error");
					return true;
				}
			}
			
			function verifyCategory(){
				if($("#add-product-price").val() == ""){
					$("#add-product-category-fg").addClass("has-error");
					return false;
				} else{
					$("#add-product-category-fg").removeClass("has-error");
					return true;
				}
			}
			
			function verifyPrice(){
				if($("#add-product-price").val() == ""){
					$("#add-product-price-fg").addClass("has-error");
					return false;
				} else{
					$("#add-product-price-fg").removeClass("has-error");
					return true;
				}
			}
			
			function verifyPer(){
				if($("#add-product-per").val() == ""){
					$("#add-product-per-fg").addClass("has-error");
					return false;
				} else{
					$("#add-product-per-fg").removeClass("has-error");
					return true;
				}
			}
			
			function verifyActivity(){
				if($("#add-product-activity").val() == ""){
					$("#add-product-activity-fg").addClass("has-error");
					return false;
				} else{
					$("#add-product-activity-fg").removeClass("has-error");
					return true;
				}
			}
			
			function verifyStock(){
				if($("#add-product-stock").val() == "" ||
				   $("#add-product-stock").val() < 0){
					$("#add-product-stock-fg").addClass("has-error");
					return false;
				} else{
					$("#add-product-stock-fg").removeClass("has-error");
					return true;
				}
			}
			
			function addProduct(){
				var vn = verifyName();
				var vc = verifyCategory();
				var vp = verifyPrice();
				var vper = verifyPer();
				var va = verifyActivity();
				var vs = verifyStock();
				
				if(vn && vc && vp && va && vs){
					$.ajax({
		                type: "POST",
		                url: "php/admin-functions.php",
		                data: {
		                	func: 'addProduct', 
		                	name: $("#add-product-name").val(),
		                	price: $("#add-product-price").val(),
		                	per: $("#add-product-per").val(),
		                	category: $("#add-product-category").val(),
		                	activity: $("#add-product-activity").val(),
		                	stock: $("#add-product-stock").val()
		                },
		                success: function(data,status) {
		                	alert("Product \"" + $("#add-product-name").val() + "\" successfully added!");
		                	$("#add-product-name").val("");
		                	$("#add-product-price").val("");
		                	$("#add-product-per").val("");
		                	$("#add-product-category").val("");
		                	$("#add-product-activity").val("");
		                	$("#add-product-stock").val("");
		                	
		                },
		                complete: function(data,status) { 
		                	//alert("Done: " + status);
		                }
		            });
		            getData();
				}
			}
			
			function editProduct(){
				$.ajax({
	                type: "POST",
	                url: "php/admin-functions.php",
	                data: {
	                	func: 'editProduct', 
	                	name: $("#edit-product-name").val(),
	                	price: $("#edit-product-price").val(),
	                	per: $("#edit-product-per").val(),
	                	category: $("#edit-product-category").val(),
	                	activity: $("#edit-product-activity").val(),
	                	stock: $("#edit-product-stock").val(),
	                	id: $("#edit-product-id").val()
	                },
	                success: function(data,status) {
	                	alert($("Product \"" + "#edit-product-name").val() + "\" successfully edited!");
	                },
	                complete: function(data,status) { 
	                	//alert("name: " + $("#edit-product-name"));
	                }
	            });
	            getData();
			}
			
			function deleteProduct(){
				$.ajax({
	                type: "POST",
	                url: "php/admin-functions.php",
	                data: {
	                	func: 'deleteProduct', 
	                	id: $("#delete-product-id").val(),
		                success: function(data,status) {
		                	alert("Product \"" + $("#delete-product-name").val() + "\" successfully deleted!");
		                },
		                complete: function(data,status) { 
		                	//alert("Done: " + status);
		                }
	                }
	            });
		        getData();
			}
			
			function deleteCustomer(){
				$.ajax({
	                type: "POST",
	                url: "php/admin-functions.php",
	                data: {
	                	func: 'deleteCustomer', 
	                	id: $("#delete-customer-id").val(),
		                success: function(data,status) {
		                	alert("ID: " + $("#delete-customer-id").val() + " Customer \"" + $("#delete-customer-name").val() + "\" successfully deleted!");
		                },
		                complete: function(data,status) { 
		                	//alert("Done: " + status);
		                }
	                }
	            });
	            getCustomers();
			}
			
			$(document).ready(function(){
				printCategories(getCategories());
				getData();
				getCustomers();
				getOrders();
			});
			
			$('#product-header').click(function(){
				$('#product-area').toggle(750);
				if($('#product-arrow').hasClass("glyphicon-chevron-down")){
					$('#product-arrow').removeClass("glyphicon-chevron-down");
					$('#product-arrow').addClass("glyphicon-chevron-up");
				} else{
					$('#product-arrow').addClass("glyphicon-chevron-down");
					$('#product-arrow').removeClass("glyphicon-chevron-up");
				}
			});
			
			$('#customer-header').click(function(){
				$('#customer-area').toggle(750);
				if($('#customer-arrow').hasClass("glyphicon-chevron-down")){
					$('#customer-arrow').removeClass("glyphicon-chevron-down");
					$('#customer-arrow').addClass("glyphicon-chevron-up");
				} else{
					$('#customer-arrow').addClass("glyphicon-chevron-down");
					$('#customer-arrow').removeClass("glyphicon-chevron-up");
				}
			});
			
			$('#order-header').click(function(){
				$('#order-area').toggle(750);
				if($('#order-arrow').hasClass("glyphicon-chevron-down")){
					$('#order-arrow').removeClass("glyphicon-chevron-down");
					$('#order-arrow').addClass("glyphicon-chevron-up");
				} else{
					$('#order-arrow').addClass("glyphicon-chevron-down");
					$('#order-arrow').removeClass("glyphicon-chevron-up");
				}
			});
			
			$('#editModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var name = button.data('name');
				var category = button.data('category');
				var price = button.data('price');
				var per = button.data('per');
				var activity = button.data('activity');
				var stock = button.data('stock');
				//var modal = $(this);
				
				var categories = [];
				categories = getCategories();
				
				$(this).find('.modal-title').text('Edit Product: ' + name);
				$(this).find('#edit-product-name').attr("value", name);
				$(this).find('#edit-product-category').val(category);
				$(this).find('#edit-product-price').attr("value", price);
				$(this).find('#edit-product-per').val(per);
				$(this).find('#edit-product-activity').val(activity);
				$(this).find('#edit-product-stock').attr("value", stock);
				$(this).find('#edit-product-id').attr("value", id);
			});
			
			$('#editModal').on('hidden.bs.modal', function(){
				$(this).find('form')[0].reset();
			});
			
			$('#addCustomerModal').on('hidden.bs.modal', function(){
				$(this).find('form')[0].reset();
			});
			
			$('#deleteModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var name = button.data('name');
				
				$(this).find('#delete-product-name').attr("value", name);
				$(this).find('#delete-product-id').attr("value", id);
				
				$(this).find('.modal-title').text('Delete Product: ' + name);
				$(this).find('#delete-modal-body').html("Are you sure you want to delete the product: " + name + "?");
			});
			
			$('#deleteCustomerModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var name = button.data('name');
				
				$(this).find('#delete-customer-name').attr("value", name);
				$(this).find('#delete-customer-id').attr("value", id);
				
				$(this).find('.modal-title').text('Delete Customer ID: ' + id);
				$(this).find('#delete-customer-modal-body').html("Are you sure you want to delete the customer: " + name + "?");
			});
		</script>
	
	</body>
</html>
