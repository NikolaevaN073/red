<?php

namespace App\Core;

use App\Core\Session;
use App\Core\Route;
use App\Core\IView;
use App\Core\View;
use App\Core\Model;
use App\Core\Request;
use App\Core\Redirect;
use App\Core\Auth;
use App\Core\DataBase;

class Container
{      
    public readonly Session $session;
    
    public readonly Route $route;
        
    public function __construct()
    {
        //$this->auth = new Auth();        
        
        $this->session = new Session();
        
        $this->route = new Route(
            //$this->auth,            
            $this->session            
        );           
    }

}


