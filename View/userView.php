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

    function ShowRegistrarse(){
        $smarty = new Smarty();
        $smarty->display('templates/registrarse.tpl');
    }

    function AdminUsuarios($Usuarios){
        $smarty = new Smarty();
        if (isset($_SESSION['email'])){
            $smarty->assign('UserEmail_s', $_SESSION['email']);
            $smarty->assign('UserName_s', $_SESSION['userName']);
            $smarty->assign('superUser_s', $_SESSION['superuser']);
            $smarty->assign('usuarios_s', $Usuarios);
            $smarty->display('templates/adminUsuarios.tpl');
        }else{
            header("Location:".BASE_URL."/login");
        }
    }

  
}
