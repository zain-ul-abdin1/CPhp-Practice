<?php
namespace Core;
use PDO;
class Database
{
    public $connection;
    public $statment;
    function __construct($connect)
    {
        $option = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];//declaraing fetch assoc as default
        
        $dsn = "mysql:" . http_build_query($connect, "", ";");//connection establishing
        $this->connection = new PDO($dsn, "root", "", $option);//object declaration 
    }
    public function query($query,$param = [])       //query function
    {

        $this->statment = $this->connection->prepare($query); // passing query
        $this->statment->execute($param); //executing query

        return $this; // returnig what is asked in the query
    }
    public function getAll()
    {
        return $this->statment->fetchAll();
    }
    public function find()
    {
        return $this->statment->fetch();
    }   
    public function findOrFail()
    {
        $result= $this->find();
        if(!$result)
        {
            abort();
        }
        return $result;
    } 
}

