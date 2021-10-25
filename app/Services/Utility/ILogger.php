<?php

namespace App\Services\Utility;

interface ILogger
{
    public static function getLogger();
    public function debug($param);
    public function info($param);
    public function warning($param);
    public function error($param);
}