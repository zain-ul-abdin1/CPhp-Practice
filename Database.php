<?php
class Database
{
    public $connection;
    function __construct($connect)
    {
        $option = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];//declaraing fetch assoc as default
        
        $dsn = "mysql:" . http_build_query($connect, "", ";");//connection establishing
        $this->connection = new PDO($dsn, "root", "", $option);//object declaration 
    }
    public function query($query,$param = [])       //query function
    {

        $statment = $this->connection->prepare($query); // passing query

        $statment->execute($param); //executing query

        return $statment; // returnig what is asked in the query
    }
}
