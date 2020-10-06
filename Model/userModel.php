<?php

class userModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cinema_db;charset=utf8', 'root', '');
    }

    function GetUser($user_mail){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE email=?");
        $sentencia->execute(array($user_mail));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetPelicula($titulo_pelicula){
        $sentencia = $this->db->prepare("SELECT * FROM peliculas WHERE titulo=?");
        $sentencia->execute(array($titulo_pelicula));
        //print_r($sentencia->fetch(PDO::FETCH_OBJ)); 
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

}