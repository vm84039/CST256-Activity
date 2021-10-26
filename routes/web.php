<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/hello', function () {
    return phpinfo();
});
Route::get('/helloworld', function () {
    return view('helloworld');
 });
 Route::get('/loginPassed2', function ()
{
    return view('loginPassed2');
});
 Route::get('/loginFailed', function ()
 {
     return view('loginFailed');
 });
        
Route::get('/test', 'App\Http\Controllers\TestController@test2');
//Route::get('whoami','App\Http\Controllers\WhatsMyNameController@index'); 
Route::Post('whoami','App\Http\Controllers\WhatsMyNameController@index'); 
Route::get('/loggingservice/{msg}','App\Http\Controllers\TestLoggingController@index');
Route::get('/askme', function () { return view('whoami'); }); 
Route::get('/login', function () { return view('login'); }); 

Route::post('/dologin','App\Http\Controllers\LoginController@index'); 
Route::post('/dologin3','App\Http\Controllers\LoginController@index');
Route::get('/test1', function () { return view('App\Http\Controllers\TestController@testadd'); }); 
Route::get('/login2', function ()
{
    return view('login2');
});
Route::get('/login3', function ()
{
    return view('login3');
});
Route::get('/logoff', function () { return view('login3'); }); 
Route::resource('/usersrest', 'App\Http\Controllers\UsersRestController');
Route::get('/api', 'App\Http\Controllers\RestClientController@index');




