<?php
namespace App\Services\Data;

class OrderDAO
{ 
    public $db;
    private $conn;
    
    
    function dbConn()
    {
        $DBServer = "localhost";
        $DBUser = "root";
        $DBpassword ="root";
        $DBName = "activity3";
        
        $conn = mysqli_connect($DBServer, $DBUser, $DBpassword, $DBName);
        if ($conn->connect_error) {
            echo "Failed";
        }
        return $conn;
    }
    function addOrder($product, $foreign, $conn)
    {
        $sql = ("Insert into Cust_Order (Product, Customer_Id) values ('$product', $foreign)");
        
        if ($conn->query($sql) === TRUE) {
            echo "Order created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }
    
    
}

