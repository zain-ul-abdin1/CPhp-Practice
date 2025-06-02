<?php
class Database
{
    public $connection;
    function __construct($connect)
    {
        $option = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        
        $dsn = "mysql:" . http_build_query($connect, "", ";");
        $this->connection = new PDO($dsn, "root", "", $option);
    }
    public function query($query)
    {

        $statment = $this->connection->prepare($query);

        $statment->execute();

        return $statment;
    }
}
