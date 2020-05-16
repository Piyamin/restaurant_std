<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './api/vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => false, // set to false in production
        // Database connection settings
        "db" => [
            "host" => "127.0.0.1",
            "dbname" => "restaurant",
            "user" => "root",
            "pass" => "usbw",
            "charset" => "utf8"
        ],
    ],
];



$app = new \Slim\App ($config);

// DIC configuration
$container = $app->getContainer();

// PDO database library 
$container ['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'] . ";charset=" . $settings['charset'],
        $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};
 

// $app->get('/', function (Request $request, Response $response, array $args) {
    
//     return $response->withRedirect("/v3/view/index.php");
// });

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");

//     return $response;
// });

// $app->post('/hello', function (Request $request, Response $response) {
//     $data = $request->getParsedBody();
//     $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });

// $app->get('/getdb', function (Request $request, Response $response, array $args) {
    
//     $sql = "Select * from person";
//     $sth = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
//     return $this->response->withJson($sth);
// });
$app->get('/showdata', function (Request $request, Response $response, array $args) {
    
    $sql = "Select * from menu";
    $sth = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
    return $this->response->withJson($sth);
});
$app->post('/savedata', function (Request $request, Response $response, array $args) {
    $menu_id = $_REQUEST['menu_id'];
    $menu_name = $_REQUEST['menu_name'];
    $menu_type = $_REQUEST['menu_type'];
    $menu_price = $_REQUEST['menu_price'];
    
    $sql = "INSERT INTO  menu(menu_id, menu_name, menu_type, menu_price)
    value('$menu_id', '$menu_name', '$menu_type', '$menu_price')";
    
    try{
        $this->db->query($sql);
        return $this->response->withJson(array("message"=>"success"));
    }catch(PDOException $e){
        return $this->response->withJson(array("message"=>$e));
    }
});
$app->post('/searchdata', function (Request $request, Response $response, array $args) {
    $key = $_REQUEST['keyword'];
    
    $sql = "SELECT * FROM restaurant.menu where menu_id = '$key' or menu_name = '$key';";   
    try{
        $sth = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $this->response->withJson($sth);
        return $this->response->withJson(array("message"=>"success"));
    }catch(PDOException $e){
        return $this->response->withJson(array("message"=>$e));
    }
});
$app->post('/savedata_edit', function (Request $request, Response $response, array $args) {
    $menu_id = $_REQUEST['menu_id'];
    $menu_name = $_REQUEST['menu_name'];
    $menu_type = $_REQUEST['menu_type'];
    $menu_price = $_REQUEST['menu_price'];
    
    $sql = "UPDATE  menu set  menu_name = '$menu_name', menu_type ='$menu_type', menu_price = '$menu_price' 
    where menu_id = '$menu_id'";
    try{
        $this->db->query($sql);
        return $this->response->withJson(array("message"=>"success"));
    }catch(PDOException $e){
        return $this->response->withJson(array("message"=>$e));
    }
});
$app->post('/deldata', function (Request $request, Response $response, array $args) {
    $menu_id = $_REQUEST['menu_id'];  
    $sql = "DELETE  from menu where menu_id = '$menu_id'";
    try{
        $this->db->query($sql);
        return $this->response->withJson(array("message"=>"success"));
    }catch(PDOException $e){
        return $this->response->withJson(array("message"=>$e));
    }
});



$app->run();
