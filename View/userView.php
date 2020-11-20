<?php

require_once "./libs/smarty/Smarty.class.php";

class userView{

    private $smarty;

    //private $title;
    
    function __construct(){
       $this->smarty = new Smarty();
    }


    function ShowLogIn($mensaje){
        $this->smarty->assign('mensaje_s', $mensaje);
        $this->smarty->display('templates/login.tpl');
    }

    function ShowRegistrarse(){
        $this->smarty->display('templates/registrarse.tpl');
    }

    function AdminUsuarios($Usuarios){
        if (isset($_SESSION['email'])){
            $this->smarty->assign('UserEmail_s', $_SESSION['email']);
            $this->smarty->assign('UserName_s', $_SESSION['userName']);
            $this->smarty->assign('superUser_s', $_SESSION['superuser']);
            $this->smarty->assign('usuarios_s', $Usuarios);
            $this->smarty->display('templates/adminUsuarios.tpl');
        }else{
            $this->ReLocalizar("login");
            //header("Location:".BASE_URL."/login");
        }
    }

    function ReLocalizar($direcion){
        header("Location:".BASE_URL."/$direcion");
    }

}
