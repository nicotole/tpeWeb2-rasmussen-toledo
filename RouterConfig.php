<?php
    require_once 'Controller/peliculasController.php';
    //require_once 'Controller/TasksAdvanceController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]));

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "peliculasController", "Home");//el primer parametro es lo que tipeas en URL, la ultima es la funcion que llamas en "peliculasController"
    $r->addRoute("generos", "GET", "peliculasController", "Generos");//URL; METODO; clase; funcion a usar de la clase
    $r->addRoute("visualizarItem/:TITULO","GET","peliculasController","VisualizarItem");
    $r->addRoute("visualizarGenero/:GENERO","GET","peliculasController","VisualizarGenero");
    // //Esto lo veo en TasksView
    // $r->addRoute("insert", "POST", "TasksController", "InsertTask");

    // $r->addRoute("delete/:ID", "GET", "TasksController", "BorrarLaTaskQueVienePorParametro");
    // $r->addRoute("completar/:ID", "GET", "TasksController", "MarkAsCompletedTask");
    // $r->addRoute("edit/:ID", "GET", "TasksController", "EditTask");

    // //Ruta por defecto.
    // $r->setDefaultRoute("TasksController", "Home");

    // //Advance
    // $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    // //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);  
?>