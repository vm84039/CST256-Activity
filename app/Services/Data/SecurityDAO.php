<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use App\Services\Utility\MyLogger1;
use Carbon\Exceptions\Exception;


class SecurityDAO
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
        public function findbyUser(UserModel $user)
        {
            $this->conn = $this->dbConn();
            $username = $user->getUserName();
            $password = $user->getPassword();
            $logger = new MyLogger1();
            try {
                $logger->info("Entering SecurityDAO::index()" . ' ' . $user->getUsername() . ' ' . $user->getPassword());
                $sql = ("SELECT id FROM activity2 WHERE username = '$username' and password = '$password'");
                $result = mysqli_query($this->conn, $sql);
                $logger->info("Exit SecurityDAO::index()");
                $count = mysqli_num_rows($result);
                if($count == 1) {return true;}
                return false;
            } catch(Exception $e) {
                $logger->error("Exception SecurityDAO::index()" . $e->getMessage());
            }
        
    }
        public function findAllUsers()
        {
            $response = DB::table('activity2')->get();
            $users = array_map(function ($user) {
                $model = new UserModel($user->USERNAME, $user->PASSWORD);
                $model->setId($user->ID);
                return $model;
            }, $response->toArray());
                return $users;
 
        }
        public function findbyUserID( $id)
        {
            $response = DB::table('activity2')->where('ID', $id)->get();
             if ($response->isEmpty()) {
                $user = new UserModel("nouser", "nouser");
                
            } 
            else{
                $rec = $response->toArray()[0];
                $user = new UserModel($rec->USERNAME, $rec->PASSWORD);
                $user->setId($id);
            }
            return $user;
        }
}