<?php
namespace App\Services\Business;
use App\Models\UserModel;
use App\Services\Utility\MyLogger1;
use App\Services\Data\SecurityDAO;
use Carbon\Exceptions\Exception;


class SecurityService
{
    public function login(UserModel $user)
    {
        $logger = new MyLogger1();
        
        try {
            $logger->info("Entering SecurityService::index()");
            $SD = new SecurityDAO();
            $logger->info("Exit SecurityService::index()");
            return ($SD ->findbyUser($user));
        }   catch(Exception $e) {
            $logger->error("Exception SecurityService::index()" . $e->getMessage());
        }

    }
    public function getAllUsers() {
        $dao = new SecurityDAO();
        return $dao->findAllUsers();
    }
    public function getUser($id)  {
        $dao = new SecurityDAO();
        return $dao->findbyUserID($id);
    }
    
    
}