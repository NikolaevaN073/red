<?php

namespace App\Models;

use App\Core\DataBase;

class AuthModel
{
    private DataBase $db;

    private $user = [];

    public $errors = [];  


    public function __construct()
    {
        $this->db = new DataBase();        
    }

    public function getUser ($data) : array
    {
        return $this->db->select('users', condition: 'email', values: $data['login']);        

    }

    public function check ($data) : array
    {
        $user = $this->getUser($data);

        if (empty($user)) {
            $this->errors['auth'] = [                 
                'email' => 'Пользователь не найден'                
            ];
        } 

        if (!empty($user) && !password_verify($data['password'], $user['password'])) {
            $this->errors['auth'] = [
                'password' => 'Неверный пароль'
            ];
        }

        return $this->errors;

        // var_dump($user);
            
        // exit();
    }

    
}
   
    
    
    


    // public function get_data ()
    // {
    //     $_SESSION['CSRF'] = $_SESSION['CSRF'] ?? hash('gost-crypto', random_int(0, 999999));
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    
    //         $this->auth->token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING); 
    //         $this->auth->login = $_POST['login']; 
    //         $this->auth->password = $_POST['password'];

    //         if (!$this->auth->check_token()) {
    //             $this->data[] = 'Ошибка авторизации';
    //         } else {
                
    //             if ($this->auth->check_login()) {
    //                 $this->data[] = 'Пользователя с таким логином не существует';
    //             } else {   
    //                 if (!$this->auth->check_password()) {
    //                     $this->data[] = 'Неверный пароль';
    //                 } else {                         
    //                     $_SESSION['isLoggedIn'] = true;
    //                     $user = $this->db->get_data_row('users', 'login', $this->auth->login);
    //                     setcookie('user_id', $user['id'], time()+60*60*24); 
    //                     $role = $this->db->get_data_row('roles', 'id', $user['role_id']);              
    //                     $this->auth->redirect($role['role_name']);                
    //                 }
    //             }        
    //         }
    //         return $this->data;
    //     }
    // }
//}        
