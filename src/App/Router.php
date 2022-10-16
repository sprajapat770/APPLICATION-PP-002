<?php
declare(strict_types=1);
namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{
    private array $routers;

    public function register(string $route, callable $action): self
    {
        $this->routers[$route] = $action;
        return $this;
    }

    public function resolve(string $requestUri)
    {
        $route = explode('?',$requestUri)[0];
        $action = $this->routers[$route] ?? null;
        if (!$action) {
            throw new RouteNotFoundException();
        }

        return call_user_func($action);
    }
}