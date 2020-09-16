<?php

use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use Illuminate\Database\Connection;

return function (App $app) {
    
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();
    // Add the Slim built-in routing middleware
    $app->add(\App\Middleware\CorsMiddleware::class);

 
    //Autentificación en Shikoba con el token de google
    $client = new Google_Client(['client_id' => '981488324390-08e4tc9j2nr0g09f6jog7hbba8bdb8gk.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
    //$app->add(new \App\Middleware\AuthMiddleware($client));
    $container = $app->getContainer();
    $app->add(new \App\Middleware\AuthMiddleware($container));
    $app->add(\App\Middleware\CorsMiddleware::class);
    $app->addRoutingMiddleware();
    // Catch exceptions and errors
    $app->add(ErrorMiddleware::class);
       
    

};