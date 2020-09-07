<?php

namespace App\Action;

use App\Domain\Profesor\Service\ProfesorReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class ProfesorReadAction
{
    /**
     * @var ProfesorReader
     */
    private $profesorReader;

    /**
     * The constructor.
     *
     * @param ProfesorReader $userReader The user reader
     */
    public function __construct(ProfesorReader $profesorReader)
    {
        $this->profesorReader = $profesorReader;
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
       
       $result= $this->profesorReader->getProfesorDetails($profesorId);
      
        // Transform the result into the JSON representation
       /*
        $result = [
            'id' => $profesorData->id,
            'nombre' => $profesorData->nombre,
            'apellido1' => $profesorData->apellido1,
            'apellido2' => $profesorData->apellido2,
            'telefono' => $profesorData->telefono,
            'email' => $profesorData->email,
            'idUsuario' => $profesorData->idUsuario,
        ];*/

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
