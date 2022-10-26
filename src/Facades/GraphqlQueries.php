<?php

namespace Zerolength\Graphql\Facades;

use Illuminate\Support\Facades\Facade;

class GraphqlQueries extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'graphql-query';
    }
}
