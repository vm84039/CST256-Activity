<?php
namespace App\Services\Data;

class OrderDAO
{ 
    public $db;
    private $conn;
    
    
    function dbConn()
    {
        $DBServer = "nnsgluut5mye50or.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $DBUser = "qwuvf62qrhpeivpb";
        $DBpassword ="bvn3840srjnlfth5";
        $DBName = "aj4dhiaafbxrg431";
        
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

