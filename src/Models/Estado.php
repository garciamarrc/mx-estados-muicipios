<?php

namespace App\Models;

use App\Database\Connection;
use PDO;

class Estado extends Connection
{
    private int $id;
    private string $estado;

    public function __construct(string $estado)
    {
        parent::__construct();

        $this->estado = $estado;
    }

    public static function getAll()
    {
        $db = new Connection();
        $query = $db->connect()->query("SELECT * FROM estados");

        $estados = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $estado = Estado::convertFromArray($row);
            array_push($estados, $estado);
        }

        return $estados;
    }

    public static function convertFromArray(array $arr): Estado
    {
        $estado = new Estado($arr['estado']);
        $estado->setId($arr['id']);

        return $estado;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEstado()
    {
        return $this->estado;
    }

}