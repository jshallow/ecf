function checkFirstName(){
	if($('#first-name').val() == ""){
		$('#form-group-first-name').addClass('has-error');
		$('#first-name-feedback').addClass('error');
		$('#first-name-feedback').html("Required Field");
	}
	else{
		$('#form-group-first-name').removeClass('has-error');
		$('#first-name-feedback').html("");
	}
}
function checkLastName(){
	if($('#last-name').val() == ""){
		$('#form-group-last-name').addClass('has-error');
		$('#last-name-feedback').addClass('error');
		$('#last-name-feedback').html("Required Field");
	}
	else{
		$('#form-group-last-name').removeClass('has-error');
		$('#last-name-feedback').html("");
	}
}
function checkZip(){
	if($('#zip').val() == ""){
		$('#form-group-zip').removeClass('has-success');
		$('#form-group-zip').addClass('has-error');
		$('#zip-feedback').removeClass('success');
		$('#zip-feedback').addClass('error');
		$('#zip-feedback').html("Required Field");
	}
	else if(/(^\d{5}$)|(^\d{5}-\d{4}$)/.test($('#zip').val()) == false){
		$('#form-group-zip').removeClass('has-success');
		$('#form-group-zip').addClass('has-error');
		$('#zip-feedback').html("Invalid Zip Code Format");
	}
	else{
		$('#form-group-zip').removeClass('has-error');
		$('#zip-feedback').html("");
	}
}

function checkEmail(){
	if($('#email').val() == ""){
		$('#form-group-email').removeClass('has-success');
		$('#form-group-email').addClass('has-error');
		$('#email-feedback').removeClass('success');
		$('#email-feedback').addClass('error');
		$('#email-feedback').html("Required Field");
	}
	else{
		$.ajax({
			type: "get",
			url: "/php/look-for-email.php",
			dataType: "json",
			data: {"email" : $("#email").val()}, 
			success: function(data, status){
				if(!data){
    				$('#form-group-email').removeClass('has-error');
    				$('#form-group-email').addClass('has-success');
    				$('#email-feedback').removeClass('error');
    				$('#email-feedback').addClass('success');
					$('#email-feedback').html("Email is available!");
				}
				else{
    				$('#form-group-email').removeClass('has-success');
    				$('#form-group-email').addClass('has-error');
    				$('#email-feedback').removeClass('success');
    				$('#email-feedback').addClass('error');
					$('#email-feedback').html("Email is not available!");
				}
			}, 
			complete: function(data, status){
			}
		});
	}
}

function checkPassword(){
	if($('#password').val() == ""){
		$('#form-group-password').removeClass('has-success');
		$('#form-group-password').addClass('has-error');
		$('#password-feedback').removeClass('success');
		$('#password-feedback').addClass('error');
		$('#password-feedback').html("Required Field");
	} else if($('#password').val().length < 8){
		$('#form-group-password').removeClass('has-success');
		$('#form-group-password').addClass('has-error');
		$('#password-feedback').removeClass('success');
		$('#password-feedback').addClass('error');
		$('#password-feedback').html("Password must be at least 8 characters!");
	} else{
		$('#form-group-password').removeClass('has-error');
		$('#password-feedback').html("");
	}
}

function confirmPassword(){
	if($('#confirm-password').val() == ""){
		$('#form-group-confirm-password').removeClass('has-success');
		$('#form-group-confirm-password').addClass('has-error');
		$('#confirm-password-feedback').removeClass('success');
		$('#confirm-password-feedback').addClass('error');
		$('#confirm-password-feedback').html("Required Field");
	} else if($('#confirm-password').val() != $('#password').val()){
		$('#form-group-confirm-password').removeClass('has-success');
		$('#form-group-confirm-password').addClass('has-error');
		$('#confirm-password-feedback').removeClass('success');
		$('#confirm-password-feedback').addClass('error');
		$('#confirm-password-feedback').html("Passwords must match!");
	} else{
		$('#form-group-confirm-password').removeClass('has-error');
		$('#confirm-password-feedback').html("");
	}
}

function validateRegistration(){
	checkFirstName();
	checkLastName();
	checkZip();
	checkEmail();
	checkPassword();
	confirmPassword();
	
	return (!$('#first-name-feedback').hasClass('error') &&
			!$('#last-name-feedback').hasClass('error') &&
			!$('#zip-feedback').hasClass('error') &&
			!$('#email-feedback').hasClass('error') &&
			!$('#password-feedback').hasClass('error') &&
			!$('#confirm-password-feedback').hasClass('error'));
}
	
$(document).ready(function(){
    $("#first-name").change(function(){
    	checkFirstName();
    });
    $("#last-name").change(function(){
    	checkLastName();
    });
    $("#zip").change(function(){
    	checkZip();
    });
    $("#email").change(function(){
    	checkEmail();
    });
    $("#password").change(function(){
    	checkPassword();
    });
    $("#confirm-password").change(function(){
    	confirmPassword();
    	validateRegistration();
    });
});

$('#login-header-link').click(function(e){
	$("#login-form").delay(101).fadeIn(100);
 	$("#register-form").fadeOut(100);
	$('#register-header-link').removeClass('active');
	$(this).addClass('active');
	e.preventDefault();
});

$('#register-header-link').click(function(e){
	$("#register-form").delay(101).fadeIn(100);
 	$("#login-form").fadeOut(100);
	$('#login-header-link').removeClass('active');
	$(this).addClass('active');
	e.preventDefault();
});