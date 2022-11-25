<?php

namespace App\Models;

use App\Database\Connection;
use PDO;

class Municipio extends Connection
{
    private int $id;
    private int $id_estado;
    private string $municipio;

    public function __construct(int $id_estado, string $municipio)
    {
        parent::__construct();

        $this->id_estado = $id_estado;
        $this->municipio = $municipio;
    }

    public static function getByIdEstado(int $id_estado)
    {
        $db = new Connection();
        $query = $db->connect()->query("SELECT * FROM municipios WHERE id_estado = '$id_estado'");

        $municipios = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $municipio = Municipio::convertFromArray($row);
            array_push($municipios, $municipio);
        }

        return $municipios;
    }

    public static function convertFromArray(array $arr): Municipio
    {
        $municipio = new Municipio($arr['id_estado'], $arr['municipio']);
        $municipio->setId($arr['id']);

        return $municipio;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdEstado()
    {
        return $this->id_estado;
    }

    public function getMunicipio()
    {
        return $this->municipio;
    }
}