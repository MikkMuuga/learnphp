<?php

namespace App;

use PDO;
use PDOException;

class DB
{
    private $conn;

    public function __construct()
    {
        try {

            if (!in_array('sqlite', PDO::getAvailableDrivers())) {
                die('SQLite PDO driver not enabled. Please enable pdo_sqlite in php.ini');
            }
            
            $dbPath = __DIR__ . '/../db.sqlite';

            if (!file_exists($dbPath)) {
                $this->createDatabase($dbPath);
            }
            
            $this->conn = new PDO("sqlite:$dbPath");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage() . 
                '<br>Please ensure pdo_sqlite extension is enabled in php.ini');
        }
    }

    private function createDatabase($dbPath)
    {
        touch($dbPath);
        
        $conn = new PDO("sqlite:$dbPath");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $conn->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL
        )");

        $conn->exec("CREATE TABLE IF NOT EXISTS posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            body TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
    }

    public function all($table, $class)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function where($table, $class, $field, $value)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE $field='$value'");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function find($table, $class, $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    public function insert($table, $fields)
    {   
        $fieldNames = array_keys($fields);
        $fieldNamesText = implode(', ', $fieldNames);
        
        $fieldValuesText = implode("', '", $fields);

        $sql = "INSERT INTO $table ($fieldNamesText)
                VALUES ('$fieldValuesText')";
        // use exec() because no results are returned
        $this->conn->exec($sql);
    }

    public function update($table, $fields, $id) {
        $updateText = '';
        foreach($fields as $key=>$value) {
            $updateText .= "$key='$value', ";
        }
        $updateText = substr($updateText, 0, -2);
        $sql = "UPDATE $table SET $updateText WHERE id=$id";
        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }
    
    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id=$id";

        // use exec() because no results are returned
        $this->conn->exec($sql);
    }
}
