<?php

class generoModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=cinema_db;charset=utf8', 'root', '');
    }

    function GetGeneros(){
        $sentencia = $this->db->prepare("SELECT * FROM genero");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

    }

    function BorrarGenero($id){
        $sentencia = $this->db->prepare("DELETE FROM genero WHERE  id_genero=?");
        $sentencia->execute(array($id));
    }

    function GuardarGenero($id){
        $sentencia = $this->db->prepare("UPDATE genero SET nombre=? WHERE id_genero=?");
        $sentencia->execute(array($_POST['nombre'], $id));
    }

    function SubirGenero(){
        $sentencia = $this->db->prepare("INSERT INTO genero(nombre) VALUES(?)");//creamos el genero
        $sentencia->execute(array($_POST['nombre']));//creamos el genero
    }

}