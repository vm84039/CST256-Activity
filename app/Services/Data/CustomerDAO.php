<?php
namespace App\Services\Data;

class CustomerDAO
{ 
    public $db;
    private $conn;
    
    

    
    function addCustomer($firstName, $lastName, $conn)
    {

        $sql = "Insert into Customer (First_Name, Last_Name) values ('$firstName' , '$lastName')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Customer created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $last_insert_id = $conn->insert_id;
        return $last_insert_id;
    }
    
    
}

