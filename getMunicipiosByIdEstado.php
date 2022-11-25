<?php

use App\Models\Municipio;

require __DIR__ . '/vendor/autoload.php';

$json = json_decode(file_get_contents('php://input'), true);

$id_estado = $json['id_estado'];



$municipios = Municipio::getByIdEstado($id_estado);

$data = [];

foreach($municipios as $municipio) {
    $newData = ['id' => $municipio->getId(), 'municipio' => $municipio->getMunicipio()];
    array_push($data, $newData);
}

echo json_encode($data);