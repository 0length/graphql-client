<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Graphql workspace endpoint
    |--------------------------------------------------------------------------
    |
    */

    'workspace' => env('GRAPHQL_WORKSPACE', ''),

    /*
    |--------------------------------------------------------------------------
    | Heaeders
    |--------------------------------------------------------------------------
    |
    */

    'headers' => explode(',', env('GRAPHQL_HEADERS', '')),
];