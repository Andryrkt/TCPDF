<?php

namespace App\Model;

use PDO;
use PDOException;

class PdoOdbcModel
{
    private $dsn;
    private $username;
    private $password;
    private $connection;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connection = null;
    }

    public function connect()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->username, $this->password);
            echo "Connexion réussie.";
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la base de données: " . $e->getMessage();
        }
    }

    public function executeQuery($query)
    {
        try {
            if ($this->connection === null) {
                $this->connect();
            }
            $result = $this->connection->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de l'exécution de la requête: " . $e->getMessage();
            return null;
        }
    }

    public function create($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->executeQuery($query);
    }

    public function read($table, $conditions = '')
    {
        $query = "SELECT * FROM $table";
        if (!empty($conditions)) {
            $query .= " WHERE $conditions";
        }
        return $this->executeQuery($query);
    }

    public function update($table, $data, $conditions = '')
    {
        $setValues = '';
        foreach ($data as $key => $value) {
            $setValues .= "$key = '$value', ";
        }
        $setValues = rtrim($setValues, ', ');
        $query = "UPDATE $table SET $setValues";
        if (!empty($conditions)) {
            $query .= " WHERE $conditions";
        }
        return $this->executeQuery($query);
    }

    public function delete($table, $conditions)
    {
        $query = "DELETE FROM $table WHERE $conditions";
        return $this->executeQuery($query);
    }

    public function closeConnection()
    {
        try {
            $this->connection = null;
            echo "Connexion fermée.";
        } catch (PDOException $e) {
            echo "Erreur lors de la fermeture de la connexion: " . $e->getMessage();
        }
    }
}
