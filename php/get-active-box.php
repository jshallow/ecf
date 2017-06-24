<?php

include '../includes/db-connection.php';
$conn = getDatabaseConnection('ecf');

$sql = "SELECT id, season, year
        FROM boxes
        WHERE activity = 1";
        
$statement = $conn->prepare($sql);
$statement->execute(); 
$box = $statement->fetch();

//print_r($box_id);
//$box_id = 
//echo $box[id];
//echo "<br />";

$sql = "SELECT item_id
        FROM box_contents
        WHERE box_id = :box_id";
        
$namedParameters = array();
$namedParameters[':box_id'] = $box[id];
    
$statement= $conn->prepare($sql); 
$statement->execute($namedParameters); 
$result = $statement->fetchALL(PDO::FETCH_ASSOC); 

//print_r($result);
//echo "<br />";

$sql = "SELECT * 
        FROM products 
        WHERE id IN(
                SELECT item_id
                FROM box_contents
                WHERE box_id = :box_id
        )";
        
$namedParameters = array();
$namedParameters[':box_id'] = $box[id];
    
$statement= $conn->prepare($sql); 
$statement->execute($namedParameters); 
$result = $statement->fetchALL(PDO::FETCH_ASSOC); 

//echo "<br />";
//foreach($result as $product){
//    echo $product['name'] . ", ";
//}
//$merged = array_merge($box, $result);
//echo "merged: ";
//print_r($merged);
//echo "<br /> ";
$newBox = array();
$newBox[0] = $box;
$merged = array_merge($newBox, $result);

/*
for($i = 0; $i < count($merged); $i++){
        echo "merged[" . $i . "]: ";
        print_r($merged[$i]);
        echo "<br />";
}
*/
echo json_encode($merged);

?>