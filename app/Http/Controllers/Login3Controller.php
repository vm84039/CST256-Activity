<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class Login3Controller extends Controller
{
    
    public function index(Request $request)
    {
        
        $username=$request->input('username'); $this->validateForm($request);
        $password=$request->input('password');
        
        // Validate the Form Data (note will automatically redirect back to Login View if errors)
        $this->validateForm($request);
        
        //echo "Your name is: " . $firstName . " " . $lastName;
        
        echo '<br>';
        
        $model = new UserModel($username, $password);
        $SD = new SecurityService();
        
        if ($SD->login($model)){  return view('LoginPassed', ['index' => $model->getUsername()]);}
        else {return view("LoginFailed");}

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