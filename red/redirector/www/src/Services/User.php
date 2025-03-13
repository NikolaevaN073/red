<?php

namespace App\Services;

class User 
{    
    public function __construct(
        protected $id,
        protected $name, 
        protected $login, 
        protected $password, 
        protected $role,
        protected $status ='N'
    )
    { }  
    
    public function id () : int
    {
        return $this->id;
    }

    public function name () : string
    {
        return $this->name;
    }

    public function login () : string
    {
        return $this->login;
    }

    public function password () : string
    {
        return $this->password();
    }

    public function role () : string
    {
        return $this->role;
    }

    public function status () : string
    {
        return $this->status;
    }
}
