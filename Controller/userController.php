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
            $usserFromDB = $this->model->GetUser($user_mail);
            
            if(isset($usserFromDB) && $usserFromDB){
                if(password_verify($passWord, $usserFromDB->password)){
                    session_start();
                    $_SESSION['name'] = $userFromDB->email; 
                    header("Location:".BASE_URL."home");
                }else{
                    $this->view->ShowLogIn("Contraseña incorrecta");
                }
            }else{
                $this->view->ShowLogIn("El usuario no existe");
            }

        }
    }
}