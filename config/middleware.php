<?php

use Slim\App;
use Slim\Middleware\ErrorMiddleware;

return function (App $app) {
    
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add the Slim built-in routing middleware
    $app->add(\App\Middleware\CorsMiddleware::class);
    $app->addRoutingMiddleware();

    // Catch exceptions and errors
    $app->add(ErrorMiddleware::class);
};