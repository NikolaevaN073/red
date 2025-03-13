<?php

namespace App\Core;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return $_SESSION[$name] ?? null;
    }

    public function exists($key) : bool
    {
        return isset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_destroy();
    }
}