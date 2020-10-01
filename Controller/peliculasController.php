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

   
}