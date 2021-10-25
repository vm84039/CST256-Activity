<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Support\Facades\Log;
use App\Services\Utility\MyLogger1;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    
    public function index(Request $request)
    {
      
        //echo "Your name is: " . $firstName . " " . $lastName;
        
        echo '<br>';
        
        $logger = new MyLogger1();
        try {
            $logger->info("Entering LoginController::index()");
            $service = new SecurityService();
            $username = $request->input('username');//$this->validateForm($request);
            $password = $request->input('password');//$this->validateForm($request);
         //   echo "Your name is: " . $username . " " . $password;
            if ($username == NULL)
            {
                $username = Cache::get('mydata');
                $password= Cache::get('mydata2');
                if ($username != NULL)
                    $logger->info("UserName obtained from cache");   
                else 
                    $logger->info("UserName not available in cache");   
            }
            $logger->info("Parameters are: $username");
            $user = new UserModel($username, $password);
            $result = $service->login($user);
            if($result) {
                $logger->info("Exit LoginController::index() with login passing");
                // Successful login attempt
                return view('loginPassed2')->with('index', $user);
            }
            $logger->info("Exit LoginController::index() with login failing");
            return view('loginFailed');
        } catch(Exception $e) {
            $logger->error("Exception LoginController::index()" . $e->getMessage());
        }
    }
    private function validateForm(Request $request)
    {
        // Setup Data Validation Rules for Login Form
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'];
        
        // Run Data Validation Rules
        $this->validate($request, $rules);
    }

    

    
} 