<?php

namespace App\Database;

use PDO;

class Connection
{
    private $host;
    private $user;
    private $db;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = '127.0.0.1';
        $this->user = 'root';
        $this->db = 'mexico';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }

    public function connect()
    {
        try {
            $connection = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}