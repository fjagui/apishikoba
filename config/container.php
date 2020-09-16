<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;
use Illuminate\Container\Container as IlluminateContainer;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors\ConnectionFactory;

return [
    'settings' => function () {
        return require __DIR__ . '/settings.php';
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },

    ErrorMiddleware::class => function (ContainerInterface $container) {
        $app = $container->get(App::class);
        $settings = $container->get('settings')['error'];

        return new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool)$settings['display_error_details'],
            (bool)$settings['log_errors'],
            (bool)$settings['log_error_details']
        );
    },
    /* CONEXION SIN UTILIZAR eloquent, directamente usariamos pdo y mapeariamos directamente
    PDO::class => function (ContainerInterface $container) {
        $settings = $container->get('settings')['db'];
    
        $host = $settings['host'];
        $dbname = $settings['database'];
        $username = $settings['username'];
        $password = $settings['password'];
        $charset = $settings['charset'];
        $flags = $settings['flags'];
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    
        return new PDO($dsn, $username, $password, $flags);
    },
    */
    Connection::class => function (ContainerInterface $container) {
        $factory = new ConnectionFactory(new IlluminateContainer());
        $connection = $factory->make($container->get('settings')['db']);

        // Disable the query log to prevent memory issues
        $connection->disableQueryLog();
        //return $connection;
        //Añadido para probar orm
        $resolver = new \Illuminate\Database\ConnectionResolver();
        $resolver->addConnection('default', $connection);
        $resolver->setDefaultConnection('default');
        \Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);

        return $connection;
        
    },

    PDO::class => function (ContainerInterface $container) {
        return $container->get(Connection::class)->getPdo();
    },
    
    GoogleClient::class => function (ContainerInterface $container) {

        $client = new Google_Client(['client_id' => '981488324390-08e4tc9j2nr0g09f6jog7hbba8bdb8gk.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
        return $client;

    },

];