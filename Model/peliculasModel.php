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
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetPeliculaPorID($id){
        $sentencia = $this->db->prepare("SELECT * FROM peliculas WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    } 


    function GetPeliculasConGenero(){//retorna tabla con nombre de la pelicula y su genero
        $sentencia = $this->db->prepare("SELECT peliculas.titulo, peliculas.imagen, genero.nombre FROM peliculas INNER JOIN genero ON peliculas.id_genero = genero.id_genero");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetPeliculasPorGenero($generoNombre){//le paso el nombre del genero que quiero
        $genero = $this->db->prepare("SELECT * FROM genero WHERE nombre=?");//todo de genero del nombre que quiero
        $genero->execute(array($generoNombre));//le asignamos ese nombre
        $arrGenero = $genero->fetchAll(PDO::FETCH_OBJ);//lo pedimos a la  base de datos        
        $sentencia = $this->db->prepare("SELECT * FROM peliculas WHERE id_genero=?");//todo de pelicuas de un id_genero que quiero
        $sentencia->execute(array($arrGenero[0]->id_genero));//lo ejecuto y le paso el id que busco
        return $sentencia->fetchAll(PDO::FETCH_OBJ);   
    }

    function GetPeliculasYGenero(){
        $sentencia = $this->db->prepare("SELECT * FROM genero , peliculas WHERE peliculas.id_genero = genero.id_genero");//selecciona de genero y peliculas y pones donde estan relacionadas. por id en este caso
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function BorrarPelicula($id){
        $sentencia = $this->db->prepare("DELETE FROM peliculas WHERE id=?");
        $sentencia->execute(array($id));
    }

    function insertarPelicula($titulo, $sinopsis, $duracion, $puntuacion, $precio, $img){
        $genero = $this->db->prepare("SELECT * FROM genero WHERE nombre=?");//todo de genero del nombre que quiero
        $genero->execute(array($_POST['genero']));//le asignamos ese nombre
        $arrGenero = $genero->fetchAll(PDO::FETCH_OBJ);//lo pedimos a la  base de datos y me retorna un arreglo de lo buscado, en este caso solo una pos
        $pathImg = null;
        $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare("INSERT INTO peliculas(titulo, id_genero, sinopsis, duracion, puntuacion, precio, imagen) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array($titulo, $arrGenero[0]->id_genero, $sinopsis, $duracion, $puntuacion, $precio, $pathImg));
        
    }

    private function uploadImage($image){
        $filePath = './imagenes/imagenes-de-usuario/' . uniqid("", true) .".". strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        move_uploaded_file($image, $filePath);
        return $filePath;
    }

    function EditarPeliculaConImg($titulo, $sinopsis, $duracion, $puntuacion, $precio, $img, $id){
        $this->BorrarImgDeArchivos($titulo);
        $genero = $this->db->prepare("SELECT * FROM genero WHERE nombre=?");
        $genero->execute(array($_POST['genero']));
        $arrGenero = $genero->fetchAll(PDO::FETCH_OBJ);
        $imagen = null;
        $imagen = $this->uploadImage($img);
        $sentencia = $this->db->prepare("UPDATE peliculas SET titulo=?, sinopsis=?, duracion=?, id_genero=?, puntuacion=?, precio=?, imagen=? WHERE id=?");
        $sentencia->execute(array( $titulo, $sinopsis, $duracion, $arrGenero[0]->id_genero, $puntuacion, $precio, $imagen, $id ));
    }

    function EditarPelicula($titulo, $sinopsis, $duracion, $puntuacion, $precio, $id){
        $genero = $this->db->prepare("SELECT * FROM genero WHERE nombre=?");
        $genero->execute(array($_POST['genero']));
        $arrGenero = $genero->fetchAll(PDO::FETCH_OBJ);
        $sentencia = $this->db->prepare("UPDATE peliculas SET titulo=?, sinopsis=?, duracion=?, id_genero=?, puntuacion=?, precio=? WHERE id=?");
        $sentencia->execute(array( $titulo, $sinopsis, $duracion, $arrGenero[0]->id_genero, $puntuacion, $precio, $id ));
    }

    private function BorrarImgDeArchivos($titulo_pelicula){
        $Pelicula = $this->GetPelicula($titulo_pelicula);
        $rutaDeImg = $Pelicula->imagen;
        unlink($rutaDeImg);
    }


}