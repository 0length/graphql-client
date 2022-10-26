<?php

namespace Zerolength\Graphql\Facades;

use Illuminate\Support\Facades\Facade;

class GraphqlClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'graphql-client';
    }
}
