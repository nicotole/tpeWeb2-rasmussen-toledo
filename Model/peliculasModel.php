<?php

class peliculasModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cinema_db;charset=utf8', 'root', '');
    }

    function GetPeliculas(){
        $sentencia = $this->db->prepare("SELECT * FROM peliculas");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetPelicula($titulo_pelicula){
        $sentencia = $this->db->prepare("SELECT * FROM peliculas WHERE titulo=?");
        $sentencia->execute(array($titulo_pelicula));
        //print_r($sentencia->fetch(PDO::FETCH_OBJ)); 
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetGeneros(){
        $sentencia = $this->db->prepare("SELECT * FROM genero");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

    }

    function GetPeliculasConGenero(){
        //$sentencia = $this->db->prepare("SELECT * FROM peliculas INNER JOIN genero ON peliculas.titulo = genero.nombre");
        $sentencia = $this->db->prepare("SELECT peliculas.titulo, genero.nombre FROM peliculas INNER JOIN genero ON peliculas.id_genero = genero.id_genero");
        $sentencia->execute();
        //print_r( $sentencia->fetchAll(PDO::FETCH_OBJ));// vemos que este cargado y con que 
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetPeliculasPorGenero($generoNombre){//le paso el nombre del genero que quiero
        $genero = $this->db->prepare("SELECT * FROM genero WHERE nombre=?");//todo de genero del nombre que quiero
        $genero->execute(array($generoNombre));//le asignamos ese nombre
        $arrGenero = $genero->fetchAll(PDO::FETCH_OBJ);//lo pedimos a la  base de datos
        //print_r($id_generos[0]->id_genero);//lo imprimimos para ver que tal
        
        $sentencia = $this->db->prepare("SELECT * FROM peliculas WHERE id_genero=?");//todo de pelicuas de un id_genero que quiero
        $sentencia->execute(array($arrGenero[0]->id_genero));//lo ejecuto y le paso el id que busco
        // print_r($sentencia->fetchAll(PDO::FETCH_OBJ));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);   
    }

}