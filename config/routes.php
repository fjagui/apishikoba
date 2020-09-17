<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\App;
//
//return function (App $app) {

    /* SIN ACCTION
    $app->get('/', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $response->getBody()->write('Hola, Mundo!');

        return $response;
    });*/
    return function (App $app) {
        
       

        $app->get('/', \App\Action\HomeAction::class)->setName('home');
        $app->options('/', function (
            ServerRequestInterface $request, 
            ResponseInterface $response
          ): ResponseInterface {
       return $response;
        });
        
        $app->get('/users/{id}', \App\Action\UserReadAction::class)->setName('users-get');
       // $app->get('/profesores', \App\Action\ProfesorReadAction::class)->setName('profesores-get');
       
       //End Point con perfil profesores de profesores. El valido para tShikoba


      
       $app->get('/profesores/{id}', \App\Action\ProfesorReadAction::class)->setName('profesores-get');
      
       $app->get('/profesores/{id}/partes', \App\Action\PartesProfesorReadAction::class)->setName('partes-profesor-get');
       $app->options('/profesores/{id}/partes', function (
             ServerRequestInterface $request, 
             ResponseInterface $response
           ): ResponseInterface {
        return $response;
       });
      
       $app->post('/users', \App\Action\UserCreateAction::class)->setName('users-post');
        //$app->get('/partes_profesor', \App\Action\PartesProfesorReadAction::class)->setName('partes-profesor-get');
       
        //Partes
        $app->get('/partes/{id}', \App\Action\ParteReadAction::class)->setName('partes-get');
        $app->options('/partes/{id}', function (
            ServerRequestInterface $request, 
            ResponseInterface $response
          ): ResponseInterface {
       return $response;
        });

/*
        $app->options('/{routes:.+}', function ($request, $response, $args) {
            return $response;
        });*/
        /*
        $app->add(function ($request, $handler) {
            $response = $handler->handle($request);
            return $response
                    ->withHeader('Access-Control-Allow-Origin', '*')
                    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        });*/
/*
        $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
            throw new HttpNotFoundException($request);
        });*/

    };
