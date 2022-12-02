<?php
  if(!isset($_SESSION["id"])){
  session_start();
  }
?>
<head>
<link rel="stylesheet" href="./css/styles2.css">
</head>
<div class="menu">
      <img class="menu_logo" src="./img/logo.png" alt="">
      <h1 class="menu_titulo">Yila’ob</h1>
      <div class="menu_pestañas">
        <ul>           
          <li> <a href="index.php" target="_self">Inicio</a> </li>
          <li> <a href="nosotros.php">Nosotros</a> </li>
          <li> <a href="">Artesanos</a> </li>
          <li> <a href="">Artesanias</a> </li>
          <?php 
     
        
            if(!isset($_SESSION["id"])){
              echo "<li> <a href='login.php' target='_self'>Iniciar Sesion</a> </li>";
            }else{
              echo "<li> <a href='cuenta.php' target='_self'>Mi Cuenta</a> </li>";
              echo "<li> <a href='cerrarSesion.php' target='_self'>Cerrar Sesion</a> </li>";     
            }
          ?>
         
          <li> <img calass="shope" src="./img/shope.png" alt=""> </li>
        </ul>
      </div>
  </div>