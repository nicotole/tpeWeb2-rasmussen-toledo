<?php
require_once 'RouterCLass.php';
require_once 'Controller/apiController.php';

//intancio el router
$router = new Router();

//tabla de routeo de API REST

$router->addRoute('comentarios', 'GET', 'apiController', 'GetComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'apiController', 'GetComentario');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);