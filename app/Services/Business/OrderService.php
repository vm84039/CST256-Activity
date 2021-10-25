<?php
namespace App\Services\Business;

use Exception;
use mysqli;
use App\Services\Data\CustomerDAO;
use App\Services\Data\OrderDAO;

class OrderService
{
    
    function createOrder($firstName, $lastName, $product)
    {
        //Variables
        $DBServer = "localhost";
        $DBUser = "root";
        $DBpassword ="root";
        $DBName = "activity3";
        $cust = new CustomerDAO();
        $order = new OrderDAO();
        
        
        //Connect to server
        try{
            $conn = new mysqli($DBServer, $DBUser, $DBpassword, $DBName);
            $conn-> autocommit(FALSE);
            if ($conn->connect_error) {
                echo "Failed";
            }
            
            //Create Order Transaction
            echo "Begin Order";
            $conn->begin_transaction();
            
            $foreign = $cust->addCustomer($firstName,$lastName, $conn);
            $order->addOrder($product, $foreign, $conn); 
            }   catch (Exception $e)
                {
                    echo "I am here"; 
                    $conn->rollback();
                }
            $conn->commit();
    }
}

