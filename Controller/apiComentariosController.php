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
        $task = $this->model->GetComentario($id);
        if(!empty($task)){
            $this->view->response($task, 200);
        }else{
            $this->view->response("La tarea de id=$id no existe" ,404);
        }
    }
}