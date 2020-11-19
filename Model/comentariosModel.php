<?php

class comentariosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cinema_db;charset=utf8', 'root', '');
    }

    function GetComentarios(){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetComentario($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    } 

    function GetComentariosPorPelicula($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_pelicula=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id=?");
        $sentencia->execute(array($id));
    }

    function InsertarComentario($id_pelicula,$id_usuario,$puntaje, $comentario){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(id_pelicula, id_usuario, puntaje, comentario) VALUES(?,?,?,?)");
        $sentencia->execute(array($id_pelicula,$id_usuario,$puntaje, $comentario));
        return $this->db->lastInsertId();
    }

}