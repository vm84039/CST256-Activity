<?php

namespace App\Models;

use JsonSerializable;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model implements JsonSerializable
{
    private $id;
    private $username;
    private $password;
    
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

     function __construct($username, $password)
     {
         $this->username=$username;
         $this->password=$password;
     }
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function jsonSerialize(){
        return get_object_vars($this);
    }
}