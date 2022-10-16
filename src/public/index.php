<?php

$obj = '{"a":1,"b":2,"c":3}';

//$jsonobj = json_decode($obj);
//var_dump($jsonobj->a);
//$jsonobj = json_decode($obj,true);
//var_dump($jsonobj['a']);

//$arr = ['a'=> 1,'b'=> 2,'c'=>3];
//$obj = (object) $arr;
////var_dump($obj->{b});
//var_dump($obj->b);
//require_once 'PaymentGatway/Paddel/Transaction.php';

//spl_autoload_register(function ($class){
//    var_dump($class);
//});

//spl_autoload_register(function ($class){
//    var_dump("AUTOLOADER 1");
//});
//
//spl_autoload_register(function ($class){
//    var_dump("AUTOLOADER 2");
//}, prepend: true);

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/../" . str_replace("\\", "/", $class) . '.php';
    require $path;
});

//use App\PaymentGatway\Paddel\Transaction;
//var_dump(new Transaction());
//
//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';
use App\Router;

$router = new Router();
session_start();
$router->get('/', [App\Classes\Home::class, 'index'])
    ->get('/invoices',[App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create',[App\Classes\Invoice::class,'create'])
    ->post('/invoices/create',[App\Classes\Invoice::class,'store']);


echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);

var_dump($_SESSION);
//
//echo 1;
//sleep(3);
//echo 2;
//phpinfo();
?>