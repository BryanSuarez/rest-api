<?php


 class DatabaseFile{

    private $host = 'localhost';
    private $db_name = 'posts';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,$this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOPException $e){
            echo 'Connect error: ' . $e->getMessage();
        }
        return $this->conn;
    }
 }
