<?php

namespace App\Services\Utility;

use App\Services\Utility\ILogger;
use Illuminate\Support\Facades\Log;


class MyLogger3 implements ILoggerService {
    public function info($param) {
        return Log::info($param);
    }
    public function debug($param) {
        return Log::debug($param);
    }
    public function warning($param) {
        return Log::warning($param);
    }
    public function error($param) {
        return Log::error($param);
    }
}