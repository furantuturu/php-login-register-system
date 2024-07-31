<?php

namespace Classes;

use PDO;
use PDOException;

class Database
{
    private $connection;
    private $statement;
    public function __construct($dsnData, $username = 'root', $password = '')
    {
        try {

            $dsn = 'mysql:' . http_build_query($dsnData, '', ';');

            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
    
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {

            dieDump($e->getMessage());

        }
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }
}