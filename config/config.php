<?php
require_once(__DIR__.'/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();


// En Producción
$bandera = false; // falso para desarrollo y verdadero para producción

if($bandera===true){
    define('DRIVER', $_ENV['P_DRIVER']);
    define('HOST', $_ENV['P_HOST']);
    define('USER', $_ENV['P_USER']);
    define('PASS', $_ENV['P_PASSWORD']);
    define('BASE', $_ENV['P_BASE']);
    define('PORT', $_ENV['P_PORT']);
}else{
    define('DRIVER', $_ENV['D_DRIVER']);
    define('HOST', $_ENV['D_HOST']);
    define('USER', $_ENV['D_USER']);
    define('PASS', $_ENV['D_PASSWORD']);
    define('BASE', $_ENV['D_BASE']);
    define('PORT', $_ENV['D_PORT']);
}

?>