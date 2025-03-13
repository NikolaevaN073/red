<?php

namespace App\Core;

use \PDO;
use \PDOException;
use RedBeanPHP\R;

class DataBase extends R
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->getConnection();
    }

    public function getConnection() 
    {    
        require_once ROOT_DIR . '/config/db.php';

        try {
            $this->pdo = new PDO ('mysql:host='.HOST.';dbname='.DB.';charset=UTF8',
            USERNAME,PASSWORD);    
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

        R::setup('mysql:host='.HOST.';dbname='.DB.';charset=UTF8', 
        USERNAME, PASSWORD);

        if(!R::testConnection()) die('No DB connection!');
        
    }

    public function insert (string $table, array $data) : void
    {       
        $fields = implode(", ", array_keys($data));
        $values = array_values($data);
        $placeholders = [];

        while (count($placeholders) < count($values)) {
            $placeholders[] = '? ';
        }
                
        $query = "INSERT INTO $table ($fields) VALUES (" . implode(',', $placeholders) . ")";
        
        $stmt = $this->pdo->prepare($query);

        try {
            $stmt->execute($values);  
        }
        catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function update (string $table, array $data, $condition = []) : void
    {                
        $fields = array_keys($data);
        $set = implode(', ', array_map(fn($field) => "$field = ?", $fields));   

        $where = '';
        
        if (!empty($condition)) {
            $where = 'WHERE ' . array_key_first($condition) . ' = ?';    
        }      

        $query = "UPDATE $table SET $set $where";

        $values = array_merge(array_values($data), array_values($condition));
        $stmt = $this->pdo->prepare($query);

        //try {
            $stmt->execute($values);  
        //}
        // catch (\PDOException $e){
        //     echo $e->getMessage("Error!");
        // }      
    }

    public function select (string $table, 
        $fields = ' * ',         
        $condition = '', 
        $values = '', 
        $group = '', 
        $order = '',
        $limit = ''
        ) : array 
    {
        $query = "SELECT $fields FROM $table";
        
        if ($condition !== '') {
            $query .= " WHERE $condition = ?";
        }  
        
        if ($group !== '') {
            $query .= " GROUP BY $group";
        }

        if ($order !== '') {
            $query .= " ORDER BY $order";
        }

        if ($limit !=='') {
            $query .= " LIMIT $limit";
        }
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$values]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];        
    }


    public function selectAll (string $table, 
        $fields = ' * ',         
        $condition = '', 
        $values = [], 
        $group = '', 
        $order = ''
        ) : array
    {
        $query = "SELECT $fields FROM $table";
        
        if ($condition !== '') {
            $query .= " WHERE $condition = ?";
        }        

        if ($group !== '') {
            $query .= " GROUP BY $group";
        }

        if ($order !== '') {
            $query .= " ORDER BY $order";
        }
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row; 
        }

        return $result ?? [];        
    }


    public function delete (string $table, $condition = '', $values = '') : void
    {       
        $query = "DELETE FROM $table";

        if ($condition !== '') {
            $query .= ' WHERE ' .$condition;
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$values]);
    }
}
