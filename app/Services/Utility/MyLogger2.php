<?php

namespace App\Services\Utility;

use App\Services\Utility\ILogger;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class MyLogger2 implements ILogger {
    public static function getLogger() {
        $log = new Logger('Monolog');
        $log->pushHandler(new StreamHandler('App\Services\Utility\MyLogger2.log', Logger::DEBUG));
        $dateFormat = "Y n j, g:i a";
        $output = "%datetime% > %level_name% > %message% %context% %extra%\n";
        $formatter = new LineFormatter($output, $dateFormat);
        
        $stream = new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG);
        $stream->setFormatter($formatter);
        
        $log->pushHandler($stream);
        
    }
    public function info($param) {
        $log = new MyLogger2();
        return $log->info($param);
    }
    public function debug($param) {
        return $log->debug($param);
    }
    public function warning($param) {
        return $log->warning($param);
    }
    public function error($param) {
        return $log->error($param);
    }
}