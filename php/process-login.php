<?php

session_start();
include '../includes/db-connection.php';

$conn = getDatabaseConnection("ecf");
$sql = "SELECT *
        FROM users
        WHERE email = :email
          AND password = :password";
          
// prevent SQL injection
$namedParameters = array();
$namedParameters[':email'] = $_POST['login-email'];
$namedParameters[':password'] = sha1($_POST['login-password']);

$statement = $conn->prepare($sql);
$statement->execute($namedParameters);
$record = $statement->fetch(PDO::FETCH_ASSOC);

echo "email: " . $_POST['login-email'] . "<br />";
echo "password: " . sha1($_POST['login-password']) . "<br />";
echo "firstName: " . $record['firstName'] . "<br />";
echo "userid: " . $record['userid'] . "<br />";

print_r($record);

// check if successful
if(empty($record)){
    //unsuccessful
    echo "Wrong email or password!";
    echo "<a href='../signup.php'>Try Again</a>";
} else if($record['registered'] == 0){
    echo "Account not created, please register.";
} else{
    // basic info
    $_SESSION['loggedin'] = true;
    $_SESSION['userid'] = $record['userid'];
    $_SESSION['firstName'] = $record['firstName'];
    
    // redirect based on status
    $location;
    if($record['userid'] == 1)
        $location = "/admin.php";
    else{
        $location = "/dashboard.php";
        // check for current cart
        checkForCart();
    }
    header('Location: ' . $location);
    //header('Location: /index.php');
}

function checkForCart(){
    global $conn;
    $sql = "SELECT MAX(id) 
            AS cart_id
            FROM `order`
            WHERE `user_id` = :user_id";
            
    $namedParameters = array();
    $namedParameters[':user_id'] = $_SESSION['userid'];
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $record1 = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo "<br />";
    print_r($record1);
    
    // check if user has ordered already
    if(empty($record1)){
        // first time ordering
        createCart();
    }
    // check if they have an open cart
    else{
        $sql = "SELECT *
                FROM order_log
                WHERE order_id = " . $record1["cart_id"];
    
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
        $record2 = $statement->fetch(PDO::FETCH_ASSOC);
        
        // if no record, there is no active cart: create one
        if(!empty($record2)){
            createCart();
        }
        // otherwise, there is an active cart: use it
        else{
            $_SESSION["cart_id"] = $record1["cart_id"];
        }
    }
}

function createCart(){
    global $conn;
    
    // create cart
    $sql = "INSERT INTO `order`
            (user_id)
            VALUES
            (:user_id)";
    
    $namedParameters = array();
    $namedParameters[':user_id'] = $_SESSION['userid'];
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    
    // get cart and store as session variable
    $sql = "SELECT MAX(id) 
            AS cart_id
            FROM `order`
            WHERE `user_id` = :user_id";
            
    $namedParameters = array();
    $namedParameters[':user_id'] = $_SESSION['userid'];
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION["cart_id"] = $record["cart_id"];
}

?>