for create laravel project :
    1. Installed php (version above 8.4)
    2. Composer 


For api.php :
    created api.php manually and declared it in bootstrap/app.php


For JWT Token : 
    install package via -> 1. composer require tymon/jwt-auth
                           2. php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
                           3. php artisan jwt:secret
                           4. implement JWtSubject to users model
