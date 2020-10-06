<?php

require_once "./View/peliculasView.php";
require_once "./Model/peliculasModel.php";

class peliculasController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new peliculasView();
        $this->model = new peliculasModel();
    }

    function Home(){
        //echo "Home";
        // $peliculas = $this->model->GetPeliculas();
        // $generos = $this->model->GetGeneros();
        // $this->view->ShowHome($peliculas, $generos);
        $peliculasConGenero = $this->model->GetPeliculasConGenero();
        $this->view->ShowHome($peliculasConGenero);
    }

    function Generos(){
        $Generos = $this->model->GetGeneros();
        $this->view->ShowGeneros($Generos);
    }

    function VisualizarItem($params = null){
        $pelicula_titulo = $params[':TITULO'];
        $pelicula_completa = $this->model->GetPelicula($pelicula_titulo);
        $this->view->ShowItem($pelicula_completa);
    }

    function VisualizarGenero($params = null){
        $genero_nombre = $params[':GENERO'];
        $peliculasPorGenero = $this->model->GetPeliculasPorGenero($genero_nombre);
        $this->view->ShowPeliculasPorGenero($peliculasPorGenero, $genero_nombre); 
    }

    function Administrar(){
        // $peliculas = $this->model->GetPeliculas();
        // $peliculasConGenero = $this->model->GetPeliculasConGenero();
        $peliculas = $this->model->GetPeliculasYGenero();
        $this->view->ShowAdministrar($peliculas);
    }

    function BorrarPelicula($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){// para que no pueda borrar solo pasando parametros por la barra
            $pelicula_id = $params[':ID'];//Este id pasa magico desde el router como declaramos la ruta
            $this->model->BorrarPelicula($pelicula_id);//pasamos el id para que lo borre el model
            header("Location:".BASE_URL."/administrar");//le hacemos recargar la pagina para que se vea el cambio    
        }else{
            header("Location:".BASE_URL."/login");
        }
        
    }

    function SubirPelicula(){//no usamos params porque params es para get
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $this->model->insertarPelicula();
            header("Location:".BASE_URL."/administrar");
        }else{
            header("Location:".BASE_URL."/login");
        }
    }
    

}