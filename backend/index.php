<?php


error_reporting(0);

ini_set('display_errors', FALSE);

$loader = require __DIR__ . "/vendor/autoload.php";

use \Slim\Slim;
use WaterStore\Controllers\UserController;

$userController = new UserController();

$app = new Slim();

$app->get('/', function(){
    echo json_encode([
        "api"     => "Water Store",
        "version" => "1.0.0"
    ]);   
});

$app->get('/user(/)', function() use ($userController) {
    echo json_encode($userController->get(null));
});

$app->get('/user(/(:id))', function($id = null) use ($userController) {
    echo json_encode($userController->get($id));
});

$app->post('/user(/)', function() use ($userController) {
    $app = Slim::getInstance();
    $userJson = json_decode($app->request()->getBody());
    echo json_encode($userController->insert($userJson));
});

$app->put('/user/:id', function($id = null) use ($userController) {
    $app = Slim::getInstance();
    $userJson = json_decode($app->request()->getBody());
    echo json_encode($userController->update($id, $userJson));
});

$app->delete('/user/:id', function($id = null) use ($userController) {
    $app = Slim::getInstance();
    echo json_encode($userController->delete($id));
});


$app->run();

?>