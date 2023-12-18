<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Dota stratz api URL
    |--------------------------------------------------------------------------
    */

    'stratz_url' => env('GRAPHQL_ENDPOINT', ''),

    /*
    |--------------------------------------------------------------------------
    | Dota stratz api credentials
    |--------------------------------------------------------------------------
    */

    'stratz_token' => env('GRAPHQL_CREDENTIALS', ''),
];
