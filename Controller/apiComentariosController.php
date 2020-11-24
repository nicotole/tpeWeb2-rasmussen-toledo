<?php
require_once './Model/comentariosModel.php';
require_once 'apiController.php';

class apiComentariosController extends apiController {
    function __construct(){
        parent::__construct();
        $this->model = new comentariosModel();
        $this->view = new apiView();
    }

    public function GetComentarios($params = null){
        $comentarios = $this->model->GetComentarios();
        $this->view->response($comentarios, 200);
    }

    public function GetComentario($params = null){
        $id = $params[':ID'];
        $comentario = $this->model->GetComentario($id);
        if(!empty($comentario)){
            $this->view->response($comentario, 200);
        }else{
            $this->view->response("El comentario de id=$id no existe" , 404);
        }
    }

    public function GetComentariosPorPelicula($params = null){
        $id = $params[':ID'];
        //echo $id;
        $comentarios = $this->model->GetComentariosPorPelicula($id);
        if(!empty($comentarios)){
            $this->view->response($comentarios, 200);
        }else{
            $this->view->response("Los comentarios de la pelicula id=$id no existen" , 404);
        }
    }

    public function BorrarComentario($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $id = $params[':ID'];
            $comentario = $this->model->GetComentario($id);
            if (isset($comentario)){
                $this->model->BorrarComentario($id);
            }else{
                $this->view->response("El comentario de id=$id no existe");
            }
        }else{
            $this->view->response("No se poseen los permisos necesarios para el request");
        }
    }

    public function InsertarComentario($params = null){
        session_start();
        if ( isset($_SESSION['email'])){
            $body = $this->getData();//get data me da un json, por eso depues lo puedo manejar como objeto
            $idComentario = $this->model->InsertarComentario($body->id_pelicula,$body->id_usuario,$body->puntaje, $body->comentario);
            if(!empty($idComentario)){
                $this->view->response($this->model->GetComentario($idComentario), 201);
            }else{
                $this->view->response("El comentario no pudo ser insertado", 404);           
            }
        }else{
            $this->view->response("No esta logueado, imposible insertar comentario");
        }
    }
}