<?php

namespace Tests\DataProvider;

class RouterDataProvider
{
    public function routeNotFoundCases(): array
    {
        return [
            ['users','put'],
            ['/invoices','post'],
            ['/users','get'],
            ['/users','post'],
        ];
    }
}