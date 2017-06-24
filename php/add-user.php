<?php
session_start();

include '../includes/db-connection.php';

$dbConn = getDatabaseConnection('ecf');

function addUser(){
    global $dbConn;
    
    $sql = "INSERT INTO users
            (email, firstName, lastName, password, address1, address2, city, state, zip, dropoff, registered, receive_emails)
            VALUES
            (:email, :firstName, :lastName, :password, :address1, :address2, :city, :state, :zip, :dropoff, :registered, :receive_emails)";
            
    $namedParameters = array();
    
    $namedParameters[':email']          = $_POST['email'];
    $namedParameters[':firstName']      = $_POST['firstName'];
    $namedParameters[':lastName']       = $_POST['lastName'];
    $namedParameters[':password']       = sha1($_POST['password']);
    $namedParameters[':address1']       = $_POST['address1'];
    $namedParameters[':address2']       = $_POST['address2'];
    $namedParameters[':city']           = $_POST['city'];
    $namedParameters[':state']          = "CA";
    $namedParameters[':zip']            = $_POST['zip'];
    $namedParameters[':dropoff']        = $_POST['dropoff'] ? $_POST['dropoff'] : "None";
    $namedParameters[':registered']     = $_POST['registered'] ? $_POST['registered'] : 1;
    $namedParameters[':receive_emails'] = $_POST['receive_emails'] ? $_POST['receive_emails'] : 0;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
}

addUser();
$_SESSION['login-message'] = "Registration successful! Please login with your new account.";
header('Location: /signup.php');

?>