<?php

namespace App;

use App\Controller\Home;
use App\Exceptions\RouteNotFoundException;
use App\Model\Invoice;
use App\Model\User;

/**
 * @property-read ?array $db
 */
class App
{

    private static DB $db;

    public static Container $container;

    /**
     * @param Router $router
     * @param array $request
     * @param array $config
     */
    public function __construct(
        protected Router $router,
        protected array  $request,
        protected Config $config
    )
    {
        static::$db = new DB($config->db ?? []);
        static::$container = new Container();
        static::$container->set(Home::class, function (Container $c) {
            return new Home($c->get(User::class),
                $c->get(Invoice::class));
        });

        static::$container->set(User::class, fn() => new User());
        static::$container->set(Invoice::class, fn() => new Invoice());
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                $this->request['method']
            );
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo \App\View::make('error/404');
        }

    }
}