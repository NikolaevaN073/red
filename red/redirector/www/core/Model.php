<?php

namespace App\Core;

use App\Core\DataBase;

class Model
{
    protected Database $db;

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function fetchData($data)
    {
        
    }
}