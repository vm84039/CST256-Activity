<?php

namespace App\Http\Controllers;


use App\Services\Business\OrderService;

class TestController extends Controller

{
    public function test()
    {
        return view('hello');
    }
    public function test2()
    
    {
        $test = new OrderService();
        $test->createOrder("test2", "test2","TV");
        return view('helloworld');
    }

    
}