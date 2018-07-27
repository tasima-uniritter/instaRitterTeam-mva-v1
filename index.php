<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/fotos/', function (Request $request, Response $response) {
    $data = '{
    			"path": "/fotos",    			
    			"fotos": 
    			[
    				{	"id":1, 
    					"legenda":"Foto numero 1", 
    					"conteudo": "https://www.instaritter.com.br/images/1.jpg",
    					"data":"2018-07-21 11:00:00",
                        "usuario":"Fulano da Silva"
    				},
    				{
    					"id":2, 
    					"legenda":"Foto numero 2",  
    					"conteudo": "https://www.instaritter.com.br/images/2.jpg",
    					"data":"2018-07-21 11:00:00",
                        "usuario":"Beltrano Morais"
    				},
    				{
    					"id":3, 
    					"legenda":"Foto numero 3",  
    					"conteudo": "https://www.instaritter.com.br/images/3.jpg",
    					"data":"2018-07-21 11:00:00",
                        "usuario":"Juka Bala"
    				}
    			]
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,200);

    return $newResponse;
});

$app->get('/fotos/{id}', function (Request $request, Response $response, array $args) {
            
     $data = '{
    			"id":'.$args['id'].', 
    			"legenda":"Foto numero '.$args['id'].'", 
    			"conteudo": "https://www.instaritter.com.br/images/'.$args['id'].'.jpg",
    			"data":"2018-07-21 11:00:00",
                "usuario":"Nome do Usuario"
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,200);

    return $newResponse;
    
});

$app->put('/fotos/', function (Request $request, Response $response) {
            
     $data = '{
    			"id":'.mt_rand(5,35).'
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,201);

    return $newResponse;
    
});

$app->delete('/fotos/{id}', function (Request $request, Response $response, array $args) {
            
     $data = '{
    			"id":'.$args['id'].'
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,200);

    return $newResponse;
    
});

$app->run();
