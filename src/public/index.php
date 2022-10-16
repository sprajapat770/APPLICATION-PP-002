<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/../" . str_replace("\\", "/", $class) . '.php';
    require $path;
});

define('STORAGE_PATH',__DIR__.'/../storage');
define('VIEW_PATH',__DIR__.'/../views');


use App\Router;

$router = new Router();
$router->get('/', [App\Controller\Home::class, 'index'])
    ->post('/upload', [App\Controller\Home::class, 'upload'])
    ->get('/invoices',[App\Controller\Invoice::class, 'index'])
    ->get('/invoices/create',[App\Controller\Invoice::class,'create'])
    ->post('/invoices/create',[App\Controller\Invoice::class,'store']);


echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);
?>