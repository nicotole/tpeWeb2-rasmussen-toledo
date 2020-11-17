<?php

require_once "./View/peliculasYGeneroView.php";
require_once "./Model/peliculasModel.php";
require_once "./Model/generoModel.php";

class peliculasYGeneroController{

    private $view;
    private $model;
    private $modelGenero;

    function __construct(){
        $this->view = new peliculasYGeneroView();
        $this->model = new peliculasModel();
        $this->modelGenero = new generoModel();
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
        $Generos = $this->modelGenero->GetGeneros();
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
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            // $peliculas = $this->model->GetPeliculas();
            // $peliculasConGenero = $this->model->GetPeliculasConGenero();
            $peliculas = $this->model->GetPeliculasYGenero();
            $generos = $this->modelGenero->GetGeneros();
            $this->view->ShowAdministrar($peliculas, $generos);
        }else{
            header("Location:".BASE_URL."/login");
        }
    }

    function AdminPeliculas(){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $peliculas = $this->model->GetPeliculasYGenero();
            $generos = $this->modelGenero->GetGeneros();
            $this->view->AdminPeliculas($peliculas, $generos);
        }else{
            header("Location:".BASE_URL."/login");
        }
    }

    function AdminGeneros(){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $generos = $this->modelGenero->GetGeneros();
            $this->view->AdminGeneros($generos);
        }else{
            header("Location:".BASE_URL."/login");
        }
    }

    function BorrarPelicula($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){// para que no pueda borrar solo pasando parametros por la barra
            $pelicula_id = $params[':ID'];//Este id pasa magico desde el router como declaramos la ruta
            $this->model->BorrarPelicula($pelicula_id);//pasamos el id para que lo borre el model
            header("Location:".BASE_URL."/adminPeliculas");//le hacemos recargar la pagina para que se vea el cambio    
        }else{
            header("Location:".BASE_URL."/login");
        }
        
    }

    function SubirPelicula(){//no usamos params porque params es para get
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $this->model->insertarPelicula();
            header("Location:".BASE_URL."/adminPeliculas");
        }else{
            header("Location:".BASE_URL."/login");
        }
    }

    function EditarPelicula($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $id_pelicula = $params[':ID'];
            $peliculas = $this->model->GetPeliculasYGenero();//pido toda la tabla de peliculas junto con la tambla de genero, viene todo en un arreglo
            //print_r($peliculas[1]);
            $generos = $this->modelGenero->GetGeneros();
            $this->view->ShowEditPelicula($peliculas, $id_pelicula,$generos);
        }else{
            header("Location:".BASE_URL."/login");
        }
    }
    
    function GuardarPelicula($params = null){
        // echo("pase por el controller uhu");
        $this->model->EditarPelicula($params[':ID']);
        header("Location:".BASE_URL."/adminPeliculas");
    }
//-----------
    function BorrarGenero($params = null){
        $this->modelGenero->BorrarGenero($params[':ID']);
        header("Location:".BASE_URL."/adminGeneros");
    }

    function EditarGenero($params = null){
        session_start();
        if ( isset($_SESSION['email']) && ( $_SESSION['superuser'] == 1 ) ){
            $peliculas = $this->model->GetPeliculasYGenero();
            $generos = $this->modelGenero->GetGeneros();
            $this->view->ShowEditGenero($peliculas, $generos, $params[':ID']);
        }else{
            header("Location:".BASE_URL."/login");
        }
    }

    function GuardarGenero($params = null){
        $this->modelGenero->GuardarGenero($params[':ID']);
        header("Location:".BASE_URL."/adminGeneros");
    }

    function SubirGenero(){
        $this->modelGenero->SubirGenero();
        header("Location:".BASE_URL."/adminGeneros");
    }


   
}