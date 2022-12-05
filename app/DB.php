<?php

class DB{
    private $host="127.0.0.1:3308";
    private $dbname='travel';
    private $username="root";
    private $password="";
    public $connection;

    public function connect(){
        try{
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            return $this->connection;
        }catch(Exception $e){

        }
    }
}