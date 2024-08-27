<?php

echo 'Inicio de index.php';

require __DIR__ . '/../vendor/autoload.php';

echo 'Autoload cargado con éxito';

$request = new App\Http\Request;
$request->send();

