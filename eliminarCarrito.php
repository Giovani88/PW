<?php 
    require 'DBManager.php';
    session_start();
    eliminarCarrito($_SESSION['id']);
    header('location:miCarrito.php');
?>