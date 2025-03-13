<?php

namespace App\Core;

use App\Core\Container;

class Application
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function run ()
    {        
        $this->container->route->start();
    }
}