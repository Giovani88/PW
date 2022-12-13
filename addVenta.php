<?php 
session_start();
if(isset($_SESSION['id'])){
    require 'DBManager.php';
    $total = $_POST['total'];
    $id_usuario = $_SESSION['id'];
    
    
    addVenta($id_usuario,$total);
    header('location:miCarrito.php');
}else{
    header('location:login.php');
} 
?>