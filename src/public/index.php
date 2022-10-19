<?php


require  __DIR__.'/../vendor/autoload.php';

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . "/../" . str_replace("\\", "/", $class) . '.php';
//    require $path;
//});

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

use App\Config;
use App\Router;
$container = new \App\Container();
$router = new Router($container);
$router->get('/', [App\Controller\Home::class, 'index'])
    ->get('/download', [App\Controller\Home::class, 'download'])
    ->post('/upload', [App\Controller\Home::class, 'upload'])
    ->get('/invoices', [App\Controller\Invoice::class, 'index'])
    ->get('/invoices/create', [App\Controller\Invoice::class, 'create'])
    ->post('/invoices/create', [App\Controller\Invoice::class, 'store']);

(new App\App($router,['uri' => $_SERVER['REQUEST_URI'],
    'method' => strtolower($_SERVER['REQUEST_METHOD'])],
new Config([])))->run();
?>