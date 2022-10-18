<?php

namespace App;

class Config
{
    protected $config = [];
    /**
     * @param array $config
     */
    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'host' => 'db',
                'user' => 'root',
                'pass' => 'root',
                'database' => 'my_db',
                'driver' => 'mysql'
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}