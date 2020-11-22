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

    function InsertarUsuario($userName, $email ,$password){

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sentencia = $this->db->prepare("INSERT INTO usuarios(userName, email, password, superUser) VALUES(?,?,?,?)");
        $sentencia->execute(array($userName, $email , $hash, 0));
    }

    function GetUsuarios(){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function BorrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id=?");
        $sentencia->execute(array($id));
    }

    function SetSuperUsuario($id){
        $sentencia = $this->db->prepare("UPDATE usuarios SET superUser=? WHERE id=?");
        $sentencia->execute(array(1, $id));
    }

    function SetNoSuperUsuario($id){
        $sentencia = $this->db->prepare("UPDATE usuarios SET superUser=? WHERE id=?");
        $sentencia->execute(array(0, $id));
    }

    
}