<?php

include '../includes/db-connection.php';
$conn = getDatabaseConnection('ecf');

$sql = "SELECT email 
        FROM users
        WHERE email = :email";
        
$statement = $conn->prepare($sql);
$statement->execute(array(":email"=>$_GET['email']));
$result = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);

?>