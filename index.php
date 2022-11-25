<?php

use App\Models\Estado;

require __DIR__ . '/vendor/autoload.php';

$estados = Estado::getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MX Estados y Municipios</title>
</head>

<body>
    <header>
        <h1>Este es un ejemplo sencillo de cómo implementar los datos traidos en el frontend con ayuda de Javascript</h1>
    </header>
    <main>
        <form action="#">
            <div>
                <label for="estado">Estado</label>
                <select name="estado" id="estado" required>
                    <option value="">-- Selecciona --</option>
                    <?php foreach ($estados as $estado) : ?>
                        <option value="<?= $estado->getId(); ?>"><?= $estado->getEstado(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="municipio">Municipio</label>
                <select name="municipio" id="municipio" required>
                </select>
            </div>

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </main>
    <script src="public/js/main.js"></script>
</body>

</html>