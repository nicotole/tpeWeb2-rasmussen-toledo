<?php
require_once 'RouterCLass.php';
require_once 'Controller/apiComentariosController.php';

//intancio el router
$router = new Router();

//tabla de routeo de API REST
//GET's
$router->addRoute('comentarios', 'GET', 'apiComentariosController', 'GetComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'apiComentariosController', 'GetComentario');
$router->addRoute('comentarios/peliculas/:ID', 'GET', 'apiComentariosController', 'GetComentariosPorPelicula');

//DELETE
$router->addRoute('comentarios/:ID', 'DELETE', 'apiComentariosController', 'BorrarComentario');

//POST
$router->addRoute('comentarios', 'POST', 'apiComentariosController', 'InsertarComentario');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);