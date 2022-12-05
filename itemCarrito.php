<?php 
    $id_carrito = $_POST['id_carrito'];
    require 'DBManager.php';
    if(isset($_POST['borrar'])){
        disminuirCantidad($id_carrito);
    }else if(isset($_POST['agregar'])){
        aumentarCantidad($id_carrito);        
    }
   header('location: miCarrito.php');

?>