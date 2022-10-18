<?php

namespace App;

use App\Exceptions\RouteNotFoundException;

class App
{

    private static DB $db;

    /**
     * @param Router $router
     * @param array $request
     * @param array $config
     */
    public function __construct(
        protected Router $router,
        protected array $request,
        protected array $config
    )
    {
        static::$db = new DB($config);
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