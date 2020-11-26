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

    function GetPeliculaPorID($id){
        $sentencia = $this->db->prepare("SELECT * FROM peliculas WHERE id=?");
        $sentencia->execute(array($id));
        //print_r($sentencia->fetch(PDO::FETCH_OBJ)); 
        return $sentencia->fetch(PDO::FETCH_OBJ);
    } 


    function GetPeliculasConGenero(){//retorna tabla con nombre de la pelicula y su genero
        //$sentencia = $this->db->prepare("SELECT * FROM peliculas INNER JOIN genero ON peliculas.titulo = genero.nombre");
        $sentencia = $this->db->prepare("SELECT peliculas.titulo, peliculas.imagen, genero.nombre FROM peliculas INNER JOIN genero ON peliculas.id_genero = genero.id_genero");
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

    function GetPeliculasYGenero(){
        $sentencia = $this->db->prepare("SELECT * FROM genero , peliculas WHERE peliculas.id_genero = genero.id_genero");//selecciona de genero y peliculas y pones donde estan relacionadas. por id en este caso
        $sentencia->execute();
        // $test = $sentencia->fetchAll(PDO::FETCH_OBJ);
        // print_r($test[0]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function BorrarPelicula($id){
        $sentencia = $this->db->prepare("DELETE FROM peliculas WHERE id=?");
        $sentencia->execute(array($id));
        //return $sentencia->fetchAll(PDO::FETCH_OBJ);//no hay nada que retornar, no se retorna porque se borra y listo
    }

    function insertarPelicula($titulo, $sinopsis, $duracion, $puntuacion, $precio, $img){
        $genero = $this->db->prepare("SELECT * FROM genero WHERE nombre=?");//todo de genero del nombre que quiero
        $genero->execute(array($_POST['genero']));//le asignamos ese nombre
        $arrGenero = $genero->fetchAll(PDO::FETCH_OBJ);//lo pedimos a la  base de datos y me retorna un arreglo de lo buscado, en este caso solo una pos
        
        $pathImg = null;
        //if ($imagen)
        $pathImg = $this->uploadImage($img);
        $sentencia = $this->db->prepare("INSERT INTO peliculas(titulo, id_genero, sinopsis, duracion, puntuacion, precio, imagen) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array($titulo, $arrGenero[0]->id_genero, $sinopsis, $duracion, $puntuacion, $precio, $pathImg));
        
    }

    private function uploadImage($image){
        //$target = './imagenes/imagenes-de-usuario/' . uniqid() . '.jpg';
        $filePath = './imagenes/imagenes-de-usuario/' . uniqid("", true) .".". strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        move_uploaded_file($image, $filePath);
        return $filePath;
    }

    // function uniqueSaveName($realName, $tempName) {
    //     $filePath = "images/" . uniqid("", true) .  . strtolower(pathinfo($realName, PATHINFO_EXTENSION));
    //     move_uploaded_file($tempName, $filePath);
    //     return $filePath;
    // }

    /*
    $filePath = "img/" . uniqid("", true) . "." 
. strtolower(pathinfo($_FILES['input_name']['name'], PATHINFO_EXTENSION));
    */
    
    function EditarPeliculaConImg($titulo, $sinopsis, $duracion, $puntuacion, $precio, $img, $id){
        //echo $img;
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
        // print_r($arrGenero);
        // echo $id;
        // print_r($_POST);
        //if (isset($arrGenero[0])){
            $sentencia = $this->db->prepare("UPDATE peliculas SET titulo=?, sinopsis=?, duracion=?, id_genero=?, puntuacion=?, precio=? WHERE id=?");
            $sentencia->execute(array( $titulo, $sinopsis, $duracion, $arrGenero[0]->id_genero, $puntuacion, $precio, $id ));
        // }else{
        //     $sentencia = $this->db->prepare("INSERT INTO genero(nombre) VALUES(?)");//creamos el genero
        //     $sentencia->execute(array($_POST['genero']));//creamos el genero

        //     $genero = $this->db->prepare("SELECT * FROM genero WHERE nombre=?");//todo de genero del nombre que quiero
        //     $genero->execute(array($_POST['genero']));//pedimos el genero
        //     $arrGenero = $genero->fetchAll(PDO::FETCH_OBJ);//pedimos el genero
        //     // print_r($arrGenero);
        //     $sentencia = $this->db->prepare("UPDATE peliculas SET titulo=?, sinopsis=?, duracion=?, id_genero=?, puntuacion=?, precio=? WHERE id=?");
        //     $sentencia->execute(array( $_POST['titulo'] , $_POST['sinopsis'] , $_POST['duracion'] , $arrGenero[0]->id_genero, $_POST['puntuacion'] , $_POST['precio'], $id ));
        // }
    }

    private function BorrarImgDeArchivos($titulo_pelicula){
        $Pelicula = $this->GetPelicula($titulo_pelicula);
        //print_r($Pelicula);
        //print_r($Pelicula->imagen);
        $rutaDeImg = $Pelicula->imagen;
        unlink($rutaDeImg);
    }

    // function BorrarImagenByNombre($id_imagen){
    //     $imagen = $this->GetImagen($id_imagen);
    //     if(isset($imagen)){
    //         $sentencia = $this->db->prepare("delete from imagenlibro where id_imagen=?");
    //         $sentencia->execute(array($id_imagen));
    //         $this->carpeta .= $id_imagen;
    //         unlink($this->carpeta);
    //     }
    // }


    
}