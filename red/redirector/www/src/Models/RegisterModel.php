<?php

namespace App\Models;

use App\Core\DataBase;

class RegisterModel
{
    protected DataBase $db;
    public $errors = [];

    public function __construct()
    {
        $this->db = new DataBase();
        
    }
    
    public function fetchData($data)
    {               
        $user = $this->db->select('users', condition: 'email', values: $data['login']);
       
        if (!empty($user)) {
            $this->errors['register'] = [
                'email' => 'Пользователь с таким e-mail уже существует'
            ];
        }   
        elseif (strlen($data['password']) < 6) {
            $this->errors['register'] = [
                'password' => 'Длина пароля меньше 6 символов'
            ];
        } 
        else {
            $this->createUser($data);
        }

    }

    public function createUser($data) 
    {          
        $this->db->insert('users', [
            'name' => $data['name'],
            'email' => $data['login'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => $data['role']
        ]);
                
    }
    
}
    