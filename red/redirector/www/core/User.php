<?php

namespace App\Core;

class User
{
    public function __construct(
        private $id,
        private $name,
        private $email,
        private $password,
        private $role,
        private $status
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

    public function email () : string
    {
        return $this->email();
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