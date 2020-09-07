<?php

use DI\ContainerBuilder;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Set up settings
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Create App instance
$app = $container->get(App::class);
//$headers = $app->request->headers;
//print_r($headers);

//$id_token ='eyJhbGciOiJSUzI1NiIsImtpZCI6IjBhN2RjMTI2NjQ1OTBjOTU3ZmZhZWJmN2I2NzE4Mjk3Yjg2NGJhOTEiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiOTgxNDg4MzI0MzkwLTA4ZTR0YzlqMm5yMGcwOWY2am9nN2hiYmE4YmRiOGdrLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXVkIjoiOTgxNDg4MzI0MzkwLTA4ZTR0YzlqMm5yMGcwOWY2am9nN2hiYmE4YmRiOGdrLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTAyOTM0Nzk0OTI5Mzg5MzI1MzQwIiwiaGQiOiJpZXNncmFuY2FwaXRhbi5vcmciLCJlbWFpbCI6ImxvdXZlbnRnY0BpZXNncmFuY2FwaXRhbi5vcmciLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXRfaGFzaCI6ImtEM3lVQ3kwWUl2ZmhmeHFQajR1NUEiLCJuYW1lIjoiTG91cmRlcyBWZW50dXJhIEZlcm7DoW5kZXoiLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDUuZ29vZ2xldXNlcmNvbnRlbnQuY29tLy1wZlp1SGdlMGR3NC9BQUFBQUFBQUFBSS9BQUFBQUFBQUFBQS9BTVp1dWNsaDFvMjJTM1UwSl91dldGOGVFUTlWejJwMFV3L3M5Ni1jL3Bob3RvLmpwZyIsImdpdmVuX25hbWUiOiJMb3VyZGVzIiwiZmFtaWx5X25hbWUiOiJWZW50dXJhIEZlcm7DoW5kZXoiLCJsb2NhbGUiOiJlcyIsImlhdCI6MTU5ODQ2MzcwMSwiZXhwIjoxNTk4NDY3MzAxLCJqdGkiOiIzMjFjZjExODVmOGUzYTE3Y2JlZTFlYWYxY2IwNDdkN2Q4MzE5ZDcwIn0.0clUtP6uUhuA4oHxCoVbuotrO9iMkQfdcWznrLAtG1VR4LAuLl3KraEIsFH3WKfdgUVYX7DMxHxW0nYxx3iFTmy7T-0vylTmtztdXgAf_0hGYTIeQTDznM-DwUsJfnqAI0vbQyX-IZyT4w1Gm7d9Bjz0qqZ0kk0HYZh-NsZYS9s0BtZnC_Vuj6RTuoh4d2AXoZGDFdThIs1Q0L7pregcqk0QU_agBs-JxuvQItxWw6J6jzhRYRM7TFKffFkkQbS5gc4dxmvPetaU8pLaQwryCX867tI69mY8ycb2rGAQLtTzux710ta8u2cvZwwcPTSw2hcLvYI5cvJ0_V2n--ABeg';
$id_token = "eyJhbGciOiJSUzI1NiIsImtpZCI6ImJjNDk1MzBlMWZmOTA4M2RkNWVlYWEwNmJlMmNlNDM3ZjQ5YzkwNWUiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiOTgxNDg4MzI0MzkwLTA4ZTR0YzlqMm5yMGcwOWY2am9nN2hiYmE4YmRiOGdrLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXVkIjoiOTgxNDg4MzI0MzkwLTA4ZTR0YzlqMm5yMGcwOWY2am9nN2hiYmE4YmRiOGdrLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTAyOTM0Nzk0OTI5Mzg5MzI1MzQwIiwiaGQiOiJpZXNncmFuY2FwaXRhbi5vcmciLCJlbWFpbCI6ImxvdXZlbnRnY0BpZXNncmFuY2FwaXRhbi5vcmciLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXRfaGFzaCI6ImVyY2xqSXdUTGNacndfelM5eHBUc1EiLCJuYW1lIjoiTG91cmRlcyBWZW50dXJhIEZlcm7DoW5kZXoiLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDUuZ29vZ2xldXNlcmNvbnRlbnQuY29tLy1wZlp1SGdlMGR3NC9BQUFBQUFBQUFBSS9BQUFBQUFBQUFBQS9BTVp1dWNsaDFvMjJTM1UwSl91dldGOGVFUTlWejJwMFV3L3M5Ni1jL3Bob3RvLmpwZyIsImdpdmVuX25hbWUiOiJMb3VyZGVzIiwiZmFtaWx5X25hbWUiOiJWZW50dXJhIEZlcm7DoW5kZXoiLCJsb2NhbGUiOiJlcyIsImlhdCI6MTU5OTA2MTQ2NiwiZXhwIjoxNTk5MDY1MDY2LCJqdGkiOiI2MTU4ZDRhOThjYTQxMGJhYmI1ODllODYyOWQ2ZDM0ZGIwY2VhNWNhIn0.Llim9gRD8eUKrOhTFOfTo_3P-X1UxqmcauqylBg9sYjfdQCny9d4YATpzj-2ewlO8Fs7Nt0b0l2WnCkzt538Pe0Q6hvqBWepchXQ_ao2yfpPSayjJQ5PcwvF-0DrQyCcInep7L94RQZ_cQwfhC6acug-wn4EFT1qiTxMspbkEh5GX5NKOrxhopL4JWoIwbhK4v5F1cg5F6OBfuOavZlT152pGcfCHlllkl1RD1UXVYkswLl7Xf0kPaiyHLcvTFCdOKR-43spBCmxBleDNun2qmBvvj5m0rjpsrgiPSZX820jI_pHZDv8m1_l86ayGhjdULv6KItKJfHj9sAJta0A3A";
$client = new Google_Client(['client_id' => '981488324390-08e4tc9j2nr0g09f6jog7hbba8bdb8gk.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($id_token);
$payload = true;
//Si se ha verificado el token en payload se cargan los datos.
if ($payload) {
   //echo "Valid ID token";
         $userid = $payload['sub'];
         $email = $payload['email'];
         $domain = $payload['hd'];
        
         
    } 
    else {
    echo "Invalid ID token";
       // $app->redirect('/http://localhost/phpmyadmin');
       exit;
    }



// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;