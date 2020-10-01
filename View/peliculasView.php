<?php

require_once "./libs/smarty/Smarty.class.php";

class peliculasView{

    

    //private $title;
    
    function __construct(){
       //$this->title = "Lista de Tareas";
    }

    function ShowHome($peliculasConGenero){
        $smarty = new Smarty();
        //$smarty->assign('titulo_s', $this->title);
        $smarty->assign('peliculasConGenero_s', $peliculasConGenero);
        $smarty->display('templates/home.tpl'); // muestro el template 
    }

    function ShowHomeLocation(){
        header(BASE_URL);
    }

    function ShowGeneros($Generos){
        $smarty = new Smarty();
        $smarty->assign('generos_s', $Generos);
        $smarty->display('templates/generos.tpl');
    }

    function ShowItem($item){
        $smarty = new Smarty();
        $smarty->assign('item_s',$item);
        $smarty->display('templates/item.tpl');
    }

    function ShowPeliculasPorGenero($peliculasPorGenero,$genero_nombre){
        $smarty = new Smarty();
        $smarty->assign('peliculasPorGenero_s',$peliculasPorGenero);
        $smarty->assign('genero_s',$genero_nombre);
        $smarty->display('templates/peliculasPorGenero.tpl');
    }
}