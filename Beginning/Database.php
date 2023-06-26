<?php
//Connect to the database, and execute a query
class Database
{
    public $connection;
    public function __construct($config, $username = 'root', $password = '')
    {

        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};username=root;charset={$config['charset']}";
        //simpler version
        //http_build_query first receives the data you gonna work with, if you want a prefix for ir {yourdomain ex} and a separator 
        $dsn = 'mysql:' . http_build_query($config, '', ';'); 

        $this->connection = new PDO($dsn, $username, $password, [          //dsn = Data Source Name
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]); 

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