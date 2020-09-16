<?php

namespace App\Middleware;
//require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../vendor/autoload.php';


use App\Domain\Profesor\Repository\ProfesorReaderRepository;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use App\Domain\Profesor\Service\ProfesorReader as ProfesorReader;
use Illuminate\Database\Connection;
use App\Slim;
use Google_Client;
use Illuminate\Support\Facades\Config;

/**
 * AUTH middleware.
 */
class AuthMiddleware 
{
    private $client;
    private $connection;
    private $profesorReader;
   
    
    /**
     * @var container
     */
    private $container;
   
     /**
     * The constructor.
     *
     * @param  $container
     */
    public function __construct($container)
    { 
       $this->container = $container;
       $this->connection = $this->container->get(Connection::class);
       $this->client = new Google_Client(['client_id' => '981488324390-08e4tc9j2nr0g09f6jog7hbba8bdb8gk.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
       $repositorio = new ProfesorReaderRepository($this->connection);
       $this->profesorReader = new ProfesorReader($repositorio);

    }

    /**
     * Middleware para autorizacióninvokable class
     *
     * @param  ServerRequest  $request PSR-7 request
     * @param  RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
     
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        
        //Comprobamos si hay token en la petición.
        $header = $request->getHeaders('Authorization');
        foreach ($header as $valor){
           if (strpos($valor[0], 'Bearer')!==false) {
                $token = explode(" ",$valor[0]);
                $existeToken = true;
                }
        }
       /*  Este es el comentrio que hay que quitar 
           para que vuelva a funcionar el control del token
       if (!($existeToken)) {
           $data = [
            "status" => 1100,
            "messsage" => 'Error de acceso',
           ];
            $msg = json_encode($data);
            $response = new Response();
            $response->getBody()->write($msg);
            return $response
                     ->withHeader('Content-Type', 'application/json');
                     
        }
        
        $id_token = $token[1];
        $payload = $this->client->verifyIdToken($id_token);
      
        if (!$payload) {
            $data = [
                "status" => 1100,
                "messsage" => 'Error de acceso',
               ];
                $msg = json_encode($data);
                $response = new Response();
                $response->getBody()->write($msg);
                return $response
                         ->withHeader('Content-Type', 'application/json');
        }
        //Si se ha verificado el token en payload se cargan los datos.
        $userid = $payload['sub'];
        $email = $payload['email'];
        $domain = $payload['hd'];
        */
        $email = "joseaguilera@iesgrancapitan.org";
        $result= $this->profesorReader->getProfesorByEmail($email)[0];
        $request = $request->withAttribute('profesorId',$result['id']);
        $response = $handler->handle($request);
        $existingContent = (string) $response->getBody();
        $response = new Response();
        $response->getBody()->write($existingContent);
        return $response;
    }


}
        