<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /** @test */
    public function it_registers_a_route(): void
    {
        //given that we have a router object
        $router = new Router();

        //when we call register method
        $router->register('get','/users',['Users','index']);

        $expected = [
            'get' => [
                '/users' => ['Users','index'],
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected,$router->routes());
    }

    /** @test */
    public function it_registers_a_get_route():void
    {
        //given that we have a router object
        $router = new Router();

        //when we call register method
        $router->get('/users',['Users','index']);

        $expected = [
            'get' => [
                '/users' => ['Users','index'],
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected,$router->routes());
    }

    /** @test */
    public function it_registers_a_post_route():void
    {
        //given that we have a router object
        $router = new Router();

        //when we call register method
        $router->post('/users',['Users','store']);

        $expected = [
            'post' => [
                '/users' => ['Users','store'],
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected,$router->routes());
    }

    /** @test */
    public function there_are_no_routes_when_router_is_created(): void
    {
        $router = new Router();
        $this->assertEmpty($router->routes());

    }
}