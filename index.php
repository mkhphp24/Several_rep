<?php

use Klein\Klein;
use Klein\Request;
use kollex\Controller\HomeController;


require_once __DIR__ . '/vendor/autoload.php';

$klein = new Klein();

$klein->respond('GET', '/', function () {
    header('Content-Type: application/json');
    $homeController=new HomeController();
    return  $homeController->index();
});

$klein->respond('GET', '/product', function () {
    header('Content-Type: application/json');
    $homeController=new HomeController();
    return  $homeController->index();
});


$klein->dispatch();

?>

