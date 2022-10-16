<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/../" . str_replace("\\", "/", $class) . '.php';
    require $path;
});

define('STORAGE_PATH',__DIR__.'/../storage');

use App\Router;

$router = new Router();
$router->get('/', [App\Classes\Home::class, 'index'])
    ->post('/upload', [App\Classes\Home::class, 'upload'])
    ->get('/invoices',[App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create',[App\Classes\Invoice::class,'create'])
    ->post('/invoices/create',[App\Classes\Invoice::class,'store']);


echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);
?>