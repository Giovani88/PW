<?php
require 'conexion.php';

session_start();
	if(!isset($_SESSION['username'])){
		header("location: login.php");
	}

$id = $_SESSION["id"];

$file = $_FILES["fileTest"]["name"]; //Nombre de nuestro archivo

$query = "UPDATE usuarios SET foto='$file' WHERE id_usuario='$id'";

$insert = mysqli_query($con, $query) or die(mysqli_error());
    if($insert){
      echo 'Registrado con exito';
  } else {
    echo 'Error';
  }

$url_temp = $_FILES["fileTest"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

//dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
$url_insert = dirname(__FILE__) . "/img/usuarios"; //Carpeta donde subiremos nuestros archivos

//Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

//Si la carpeta no existe, la creamos
if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

//movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
if (move_uploaded_file($url_temp, $url_target)) {
    echo "El archivo " . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo.";
}


header('Location: editar_cuenta.php')

?>