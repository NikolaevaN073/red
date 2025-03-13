<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\AuthModel;

class AuthController extends Controller 
{   
    protected $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    public function index() 
    {           
        $this->session()->get('CSRF') ??
        $this->session()->set('CSRF', hash('gost-crypto', random_int(0, 999999)));

        if (isset($_POST['login'])) {

            if ($_POST['CSRF'] === $this->session()->get('CSRF')) {

                $this->login($_POST);
            }  
            else {

                $this->session()->set('errors', [
                    'auth' => [
                        'CSRF' => 'Ошибка авторизации'
                    ]                    
                ]);
            }        
        }        

        $this->view('auth.php', 'template.php', [], 'Вход');         
    } 

    public function login ($data)
    {
        $errors = $this->model->check($data);

        if (!empty($errors)) {
            $this->session()->set('errors', $errors);
        }
        else {
            $user = $this->model->getUser($data);

            $this->session()->set('user_id', $user['id']);            
            
            $this->redirect('/' . $user['role']);
        }
        
    }

    public function logout ()
    {
        if($this->session()->exists('user_id')) {                        

            $this->session()->destroy();

            $this->redirect('/');
        }
    }
}
