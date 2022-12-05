<?php 
session_start();
if(isset($_SESSION['id'])){
    require 'DBManager.php';
    $id_artesania = $_POST['id_artesania'];
    $id_usuario = $_SESSION['id'];
    //echo "Hola $usuario desde agregarCArrito: $id_artesania";
    agregarCarrito($id_artesania,$id_usuario);
    header('location:artesanias.php');
}else{
    header('location:login.php');
}
    
?>