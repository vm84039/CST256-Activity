<?php

namespace App\Services\Utility;

interface ILoggerService
{
    public function debug($param);
    public function info($param);
    public function warning($param);
    public function error($param);
}