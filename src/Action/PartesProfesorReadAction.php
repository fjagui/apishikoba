<?php

namespace App\Action;

use App\Domain\Parte\Service\ParteReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class PartesProfesorReadAction
{
    /**
     * @var ParteReader
     */
    private $parteReader;

    /**
     * The constructor.
     *
     * @param ParteReader $parteReader The user reader
     */
    public function __construct(ParteReader $parteReader)
    {
        $this->parteReader = $parteReader;
    }

    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     * @param array $args The route arguments
     *
     * @return ResponseInterface The response
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
        // Collect input from the HTTP request
        $profesorId = (int)$args['id'];

        // Invoke the Domain with inputs and retain the result
     
     //   $resultado = $this->profesorReader->getAllProfesores();
     //   print_r($resultado);  
     // print_r($request->getAttribute('id'));


       $idprofesor = $request->getAttribute('profesorId');
       
       
       $result= $this->parteReader->getPartesByIdProfesor($idprofesor);
       $partes = array();
       foreach($result as $objeto) {
          $partes[] = (array) $objeto;
           }
       $result = $partes;
       $response->getBody()->write((string)json_encode($result));
       return $response
                  ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
                  ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                  ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                  ->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
