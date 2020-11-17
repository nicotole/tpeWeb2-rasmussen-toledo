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
                    $_SESSION['email'] = $userFromDB->email;
                    $_SESSION['superuser'] = $userFromDB->superUser;
                    //echo $_SESSION['seperuser'];
                    header("Location:".BASE_URL."/home");
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
        header("Location:".BASE_URL."/home");
    }

    
}