<?php
//Connect to the database, and execute a query
class Database
{
    public $connection;
    public function __construct()
    {

        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;username=root;charset=utf8mb4";

        $this->connection = new PDO($dsn); //dsn = Data Source Name
    }
    public function query($query)
    {

        //Mysql Connection


        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}


?>