<?php

namespace App\Core;

class Redirect
{
    public static function to(string $url)
    {
        header("Location: $url");
        exit;
    }
}