<?php

require_once "./libs/smarty/Smarty.class.php";

class userView{

    

    //private $title;
    
    function __construct(){
       //$this->title = "Lista de Tareas";
    }


    function ShowLogIn($mensaje){
        $smarty = new Smarty();
        $smarty->assign('mensaje_s', $mensaje);
        $smarty->display('templates/login.tpl');
    }

    
}
