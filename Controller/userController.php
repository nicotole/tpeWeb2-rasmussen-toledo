<?php

require_once "./View/userView.php";
require_once "./Model/userModel.php";

class userController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new userView();
        $this->model = new userModel();
    }

    function VisualizarLogin(){
        $this->view->ShowLogIn(" ");
    }

    function VerifyUser(){
        $user_mail = $_POST['input_mail'];
        $passWord = $_POST['input_password'];
        
        if (isset($user_mail)){
            $userFromDB = $this->model->GetUser($user_mail);
            
            if(isset($userFromDB) && $userFromDB){
                if(password_verify($passWord, $userFromDB->password)){
                    session_start();
                    $_SESSION['userName'] = $userFromDB->userName;
                    $_SESSION['email'] = $userFromDB->email;
                    //$_SESSION['contraseña'] =$userFromDB->password;
                    $_SESSION['superuser'] = $userFromDB->superUser;
                    //echo $_SESSION['superuser'];
                    $this->view->ReLocalizar("home");
                    //header("Location:".BASE_URL."/home");
                }else{
                    $this->view->ShowLogIn("Contraseña incorrecta");
                }
            }else{
                $this->view->ShowLogIn("El usuario no existe");
            }
        }
    }

    function LogOut(){
        session_start();
        session_destroy();
        $this->view->ReLocalizar("home");
        //header("Location:".BASE_URL."/home");
    }

    function Registrarse(){
        $this->view->ShowRegistrarse();
    }
    
    function RegistrarUsuario(){
        $this->model->InsertarUsuario($_POST['userName'], $_POST['email'], $_POST['contraseña']);
        $userFromDB = $this->model->GetUser($_POST['email']);
        session_start();
        $_SESSION['userName'] = $_POST['userName'];
        $_SESSION['email'] = $_POST['email'];
        //$_SESSION['contraseña'] = $_POST['contraseña'];
        $_SESSION['superuser'] = $userFromDB->superUser;
        //echo  $userFromDB->superUser;
        //$_SESSION['superuser'] = 0;
        $this->view->ReLocalizar("home");
        //header("Location:".BASE_URL."/home");
    }

    function AdminUsuarios(){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $Usuarios = $this->model->GetUsuarios();
            $this->view->AdminUsuarios($Usuarios);
        }else{
            $this->view->ReLocalizar("login");
            //header("Location:".BASE_URL."/login");
        }
    }


    function BorrarUsuario($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $id = $params[":ID"];
            $this->model->BorrarUsuario($id);
            $this->view->ReLocalizar("adminUsuarios");
            //header("Location:".BASE_URL."/adminUsuarios");
        }else{
            $this->view->ReLocalizar("login");
            //header("Location:".BASE_URL."/login");
        }
    }

    function SetSuperUsuario($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $id = $params[":ID"];
            $this->model->SetSuperUsuario($id);
            $_SESSION['superuser'] = 1;
            $this->view->ReLocalizar("adminUsuarios");
            //header("Location:".BASE_URL."/adminUsuarios");
        }else{
            $this->view->ReLocalizar("login");
            //header("Location:".BASE_URL."/login");
        }
    }


    function SetNoSuperUsuario($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $id = $params[":ID"];
            $this->model->SetNoSuperUsuario($id);
            $_SESSION['superuser'] = 0;
            $this->view->ReLocalizar("home");
            //header("Location:".BASE_URL."/home");
        }else{
            $this->view->ReLocalizar("login");
            //header("Location:".BASE_URL."/login");
        }
    }

}