<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index() 
    {        
        $this->view('home.php', 'template.php', [], 'Главная - SF-AdTech');
    }
}