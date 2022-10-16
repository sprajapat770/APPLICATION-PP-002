<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/../" . str_replace("\\", "/", $class) . '.php';
    require $path;
});

session_start();

define('STORAGE_PATH',__DIR__.'/../storage');
define('VIEW_PATH',__DIR__.'/../views');

try {
    $router = new App\Router();
    $router->get('/', [App\Controller\Home::class, 'index'])
        ->get('/download', [App\Controller\Home::class, 'download'])
        ->post('/upload', [App\Controller\Home::class, 'upload'])
        ->get('/invoices',[App\Controller\Invoice::class, 'index'])
        ->get('/invoices/create',[App\Controller\Invoice::class,'create'])
        ->post('/invoices/create',[App\Controller\Invoice::class,'store']);
    echo $router->resolve(
        $_SERVER['REQUEST_URI'],
        strtolower($_SERVER['REQUEST_METHOD'])
    );
} catch (\App\Exceptions\RouteNotFoundException $e) {
    //header('HTTP/1.1 404 Not Found');
    http_response_code(404);
    echo \App\View::make('error/404');
}



?>