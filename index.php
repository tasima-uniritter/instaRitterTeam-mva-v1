<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/photos/', function (Request $request, Response $response) {
    $data = '{
    			"path": "/photos",    			
    			"photos": 
    			[
    				{	"id":1, 
    					"subtitle":"Foto numero 1", 
    					"content": "https://www.instaritter.com.br/images/1.jpg",
    					"date":"2018-07-21 11:00:00"
    				},
    				{
    					"id":2, 
    					"subtitle":"Foto numero 2",  
    					"content": "https://www.instaritter.com.br/images/2.jpg",
    					"date":"2018-07-21 11:00:00"
    				},
    				{
    					"id":3, 
    					"subtitle":"Foto numero 3",  
    					"content": "https://www.instaritter.com.br/images/3.jpg",
    					"date":"2018-07-21 11:00:00"
    				}
    			]
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,201);

    return $newResponse;
});

$app->get('/photos/{id}', function (Request $request, Response $response, array $args) {
            
     $data = '{
    			"id":'.$args['id'].', 
    			"subtitle":"Foto numero '.$args['id'].'", 
    			"content": "https://www.instaritter.com.br/images/'.$args['id'].'.jpg",
    			"date":"2018-07-21 11:00:00"
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,201);

    return $newResponse;
    
});

$app->put('/photos/', function (Request $request, Response $response) {
            
     $data = '{
    			"id":'.mt_rand(5,35).'
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,201);

    return $newResponse;
    
});

$app->delete('/photos/{id}', function (Request $request, Response $response, array $args) {
            
     $data = '{
    			"id":'.$args['id'].'
    		}';
    $data = json_decode($data);
	$newResponse = $response->withJson($data,201);

    return $newResponse;
    
});

$app->run();