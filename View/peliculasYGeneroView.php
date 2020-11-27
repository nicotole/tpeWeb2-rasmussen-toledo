<?php

require_once "./libs/smarty/Smarty.class.php";

class peliculasYGeneroView{

    private $smarty;
    
    
    function __construct(){
       $this->smarty = new Smarty();
    }

    function ShowHome($peliculasConGenero){
        //$this->smarty->assign('titulo_s', $this->title);
        //$this->smarty = new Smarty();
        session_start();
        if (isset($_SESSION['email'])){
            //echo "está seteado";
            //echo $_SESSION['superuser'];
            //echo $_SESSION['email'];
            // echo $_SESSION['userName'];
            // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
            // $this->smarty->assign('UserName_s', $_SESSION['userName']);
            // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
            $this->setUserBasicsToSmarty();
        }
        $this->smarty->assign('peliculasConGenero_s', $peliculasConGenero);
        $this->smarty->display('templates/home.tpl'); // muestro el template 
    }

    function ShowHomeLocation(){
        header(BASE_URL);
    }

    function ShowGeneros($Generos){
        $this->smarty->assign('generos_s', $Generos);
        session_start();
        if (isset($_SESSION['email'])){
            //echo "está seteado";
            // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
            // $this->smarty->assign('UserName_s', $_SESSION['userName']);
            // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
            $this->setUserBasicsToSmarty();
        }else{
            //echo "no esta seteado";//por ahora para testear
        }
        $this->smarty->display('templates/generos.tpl');
    }

    function ShowItem($item){
        session_start();
        if (isset($_SESSION['email'])){//si esta set el email es porque hay sesion 
            //echo "está seteado";
            //$this->smarty->assign('UserEmail_s', $_SESSION['email']);//le damos a smarty una var con el email
            //$this->smarty->assign('UserName_s', $_SESSION['userName']);
            //$this->smarty->assign('superUser_s', $_SESSION['superuser']);//le damos una var para saber si es super user
            $this->setUserBasicsToSmarty();
        }
        $this->smarty->assign('item_s',$item);
        $this->smarty->display('templates/item.tpl');
    }

    function ShowPeliculasPorGenero($peliculasPorGenero,$genero_nombre){
        session_start();
        if (isset($_SESSION['email'])){
            //echo "está seteado";
            // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
            // $this->smarty->assign('UserName_s', $_SESSION['userName']);
            // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
            $this->setUserBasicsToSmarty();
        }
        $this->smarty->assign('peliculasPorGenero_s',$peliculasPorGenero);
        $this->smarty->assign('genero_s',$genero_nombre);
        $this->smarty->display('templates/peliculasPorGenero.tpl');
    }

    function ShowAdministrar($peliculas, $generos){//peliculas es un arreglo de obj pelicula
        //session_start();
        if (isset($_SESSION['email'])){
            //echo "está seteado";
            // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
            // $this->smarty->assign('UserName_s', $_SESSION['userName']);
            // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
            $this->setUserBasicsToSmarty();
           // $this->smarty->assign('peliculas_s', $peliculas);
            //$this->smarty->assign('generos_s',$generos);
            $this->smarty->display('templates/admin.tpl');
        }else{
            $this->ReLocalizar("login");
            //header("Location:".BASE_URL."/login");//si no hay sesion iniciada manda a login
        }
    }
  
    function ShowEditPelicula($peliculas, $id_pelicula,$generos){
        //session_start();//error,no hace falta porque ya esta iniciada
        $this->smarty->assign('peliculas_s', $peliculas);
        $this->smarty->assign('generos_s', $generos);
        $this->smarty->assign('id_pelicula_s', $id_pelicula);
        // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
        // $this->smarty->assign('UserName_s', $_SESSION['userName']);
        // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
        $this->setUserBasicsToSmarty();
        //var_dump($pelicula);
        $this->smarty->display('templates/adminPeliculas.tpl');
    }

    function ShowEditGenero($peliculas, $generos, $id){
        $this->smarty->assign('peliculas_s', $peliculas);
        $this->smarty->assign('generos_s', $generos);
        $this->smarty->assign('id_genero_s', $id);
        // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
        // $this->smarty->assign('UserName_s', $_SESSION['userName']);
        // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
        $this->setUserBasicsToSmarty();
        $this->smarty->display('templates/adminGeneros.tpl');
    }

    function AdminPeliculas($peliculasConGenero, $generos){
        $this->smarty->assign('peliculas_s',$peliculasConGenero);
        $this->smarty->assign('generos_s', $generos);
        // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
        // $this->smarty->assign('UserName_s', $_SESSION['userName']);
        // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
        $this->setUserBasicsToSmarty();
        //var_dump($peliculasConGenero);
        //var_dump($peliculasConGenero[0]->imagen);
        $this->smarty->display('templates/adminPeliculas.tpl');
    }

    function AdminGeneros($generos){
        //session_start();
        if (isset($_SESSION['email'])){
            //echo "está seteado";
            // $this->smarty->assign('UserEmail_s', $_SESSION['email']);
            // $this->smarty->assign('UserName_s', $_SESSION['userName']);
            // $this->smarty->assign('superUser_s', $_SESSION['superuser']);
            $this->setUserBasicsToSmarty();
            $this->smarty->assign('generos_s',$generos);
            $this->smarty->display('templates/adminGeneros.tpl');
        }else{
            $this->ReLocalizar("login");
            //header("Location:".BASE_URL."/login");//si no hay sesion iniciada manda a login
        }
    }

    private function setUserBasicsToSmarty(){
        $this->smarty->assign('UserEmail_s', $_SESSION['email']);
        $this->smarty->assign('UserId_s', $_SESSION['id']);
        $this->smarty->assign('UserName_s', $_SESSION['userName']);
        $this->smarty->assign('superUser_s', $_SESSION['superuser']);
    }


    function ReLocalizar($direcion){
        header("Location:".BASE_URL."/$direcion");
    }
    
}