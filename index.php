<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$request = $_SERVER['REQUEST_URI'];

// Definir rotas
if ($request == '/') {
    require './src/view/login.php';
} elseif ($request == '/home') {
    require './src/view/home.php';
} elseif ($request == '/contact') {
    require 'contact.php';
} else {
    http_response_code(404);
    echo "Página não encontrada.";
}
