<?php

include '../includes/db-connection.php';

$dbConn = getDatabaseConnection('ecf');

function addProduct(){
    global $dbConn;
    
    $sql = "INSERT INTO products
            (name, category_id, price, per, active, stock)
            VALUES
            (:name, :category_id, :price, :per, :active, :stock)";
            
    $namedParameters = array();
    $namedParameters[':name']        = $_POST['name'];
    $namedParameters[':category_id'] = $_POST['category'];
    $namedParameters[':price']       = $_POST['price'] + 0;
    $namedParameters[':per']         = $_POST['per'];
    $namedParameters[':active']      = $_POST['activity'];
    $namedParameters[':stock']       = $_POST['stock'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "name: " . $_GET['name'] . " ";
    echo "cat: " . $_GET['category'] . " ";
    echo "price: " . $_GET['price'] . " ";
    echo "per: " . $_GET['per'] . " ";
    echo "activity: " . $_GET['activity'] . " ";
    echo "stock: " . $_GET['stock'] . " <br />";
}

function deleteProduct(){
    global $dbConn;
    
    $sql = "DELETE FROM products
            WHERE id = :id";
            
    $namedParameters = array();
    $namedParameters[':id']          = $_POST['id'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
}

function addCategory(){
    global $dbConn;
    
    $sql = "INSERT INTO categories
            (name)
            VALUES
            (:name)";
    
    $namedParameters = array();
    $namedParameters[':name'] = $_GET['name'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "sql: " . $sql . "<br />";
    echo "name: " . $_GET['name'];
    
}

function editProduct(){
    global $dbConn;
    
    $sql = "UPDATE products
            SET name =:name, 
                category_id = :category_id,
                price = :price, 
                per = :per, 
                active = :active, 
                stock = :stock
            WHERE id = :id";
            
    $namedParameters = array();
    $namedParameters[':name']        = $_POST['name'];
    $namedParameters[':category_id'] = $_POST['category'];
    $namedParameters[':price']       = $_POST['price'] + 0;
    $namedParameters[':per']         = $_POST['per'];
    $namedParameters[':active']      = $_POST['activity'];
    $namedParameters[':stock']       = $_POST['stock'];
    $namedParameters[':id']          = $_POST['id'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "name: " . $_GET['name'] . " ";
    echo "cat: " . $_GET['category'] . " ";
    echo "price: " . $_GET['price'] . " ";
    echo "per: " . $_GET['per'] . " ";
    echo "activity: " . $_GET['activity'] . " ";
    echo "stock: " . $_GET['stock'] . " <br />";
}

function getProducts(){
    global $dbConn;
    
    $sql = "SELECT *
            FROM products
            WHERE 1";
    
    // check for category filter
    if(isset($_GET['category']) && $_GET['category'] != ""){
        $sql = $sql . " AND category_id LIKE :category";
        $namedParameters[':category'] = (int)$_GET['category'];
    }
    
    // check for active filter
    if(isset($_GET['activity']) && $_GET['activity'] != ""){
        $sql = $sql . " AND active LIKE :activity";
        $namedParameters[':activity'] = "%" . $_GET['activity'] . "%";
    }
    
    $statement= $dbConn->prepare($sql); 
    $statement->execute($namedParameters); 
    $result = $statement->fetchALL(PDO::FETCH_ASSOC); 
    
    //echo "sql: " . $sql . "<br />";
    //echo "activity: " . $_GET['activity'] . "<br />";
    
    echo json_encode($result);
}

function getCategories(){
    global $dbConn;
    
    $sql = "SELECT * 
            FROM categories";
            
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
}

function getCustomers(){
    global $dbConn;
    
    $sql = "SELECT * 
            FROM users";
            
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
}

function deleteCustomer(){
    global $dbConn;
    
    $sql = "DELETE FROM users
            WHERE userid = :id";
            
    $namedParameters = array();
    $namedParameters[':id'] = $_POST['id'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
}

function getOrders(){
    global $dbConn;
    
    $sql = "SELECT * 
            FROM orders";
            
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
}


if(isset($_GET['func'])){
    $function = $_GET['func'];
    
    switch($function){
        case addCategory:
            addCategory();
            break;
        case getProducts:
            getProducts();
            break;
        case getCategories:
            getCategories();
            break;
        case getCustomers:
            getCustomers();
            break;
        case getOrders:
            getOrders();
            break;
    }
} else if(isset($_POST['func'])){
    $function = $_POST['func'];
    
    switch($function){
        case addProduct:
            addProduct();
            break;
        case deleteProduct:
            deleteProduct();
            break;
        case addCategory:
            addCategory();
            break;
        case editProduct:
            editProduct();
            break;
        case deleteProduct:
            deleteProduct();
            break;
        case deleteCustomer:
            deleteCustomer();
            break;
    }
}

?>