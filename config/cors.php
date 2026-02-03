<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    */

    // Define the URIs that should be accessible
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // HTTP verbs allowed
    'allowed_methods' => ['*'],

    // Allowed origins (Angular running on 4300)
    'allowed_origins' => ['http://localhost:4300','https://gem-frontend-eight.vercel.app'],

    // If needed, you can use regex patterns here
    'allowed_origins_patterns' => [],

    // Allowed headers
    'allowed_headers' => ['*'],

    // Which headers can be exposed to the browser
    'exposed_headers' => [],

    // How long the results of a preflight request can be cached (in seconds)
    'max_age' => 0,

    // Allow cookies/auth across origins? (true for auth)
    'supports_credentials' => false,

];
