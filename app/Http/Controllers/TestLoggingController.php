<?php

namespace App\Http\Controllers;

use App\Services\Utility\ILoggerService;
use Illuminate\Http\Request;

class TestLoggingController extends Controller
{
    protected $logger;
    
    public function __construct(ILoggerService $service) {
        $this->logger = $service;
    }
    public function index(Request $request, $msg) {
        $this->logger->info($msg);
    }
}
