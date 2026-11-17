<?php

use App\Helpers;

class Logger
{
    public static function log(string $message): void
    {
        $date = date("Y-m-d H:i:s");
        echo "[$date] $message <br>";
    }
}
