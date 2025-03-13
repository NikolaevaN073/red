<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\RegisterModel;

class RegisterController extends Controller 
{    
    protected $model;
    
    public function __construct()
    {
        $this->model = new RegisterModel();
    }
    
    function index() 
    { 
        if (isset($_POST['name'])) {            
            $this->register($_POST);  
        }
        $this->view('register.php', 'template.php', [], 'Регистрация');         
    } 

    public function register($data) 
    {          
        $this->model->fetchData($data);

        $errors = $this->model->errors;

        if (!empty($errors)) {            

            $this->session()->set('errors', $errors);    
                       
            $this->redirect('/register');
        }
        else {

            $this->redirect('/auth');
        }
    }
}