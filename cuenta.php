<?php 
    include("sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script defer src="js/alert.js"></script>
    <script  src="js/eliminarReg.js"></script>
    <link rel="stylesheet" href="css/cuenta.css">
    <title>Document</title>
</head>
<body class="body-cuenta">
  <?php
    include("nav.php");

        require 'conexion.php';
        $id = $_SESSION["id"];
        $query = "SELECT * from domicilio INNER JOIN usuarios on usuarios.correo = domicilio.fk_usuario WHERE usuarios.id_usuario = '$id'";
        $consulta = mysqli_query($con,$query);
        if(mysqli_num_rows($consulta)!=0){//Si encontro el usuario		
            $row = mysqli_fetch_assoc($consulta);
            $nombre = $row['nombre'];    
            $apellidos = $row['apellidos'];    
            $correo = $row['correo'];
            $foto = $row['foto'];
            $calle = $row['calle'];
            $numero = $row['numero']; 
            $cod_postal = $row['cp']; 
            $ciudad = $row['ciudad'];
            $estado = $row['estado'];
            $municipio = $row['municipio'];     
        }

        

    ?>

  <div class="contenedor-micuenta">
    <div class="item-cuenta">

      <div class="titulo-perfil">
        <h2>Mi perfil</h2>
      </div>

      <div class="contenedor-img">
        <img class="imagen-perfil" src="img/usuarios/<?php echo $foto ?> " alt="">
      </div>
      
      <div class="contenedor-informacion">
        <p class="nombre"><strong>Nombre:</strong>  <?php echo $nombre ?></p>
        <p class="apellidos"><strong>Apellidos:</strong> <?php echo $apellidos ?> </p>
        <p class="correo"><strong>Correo:</strong> <?php echo $correo ?> </p>
        <p class="direccion"><strong>Direccion:</strong> <?php echo $calle," #",$numero,", ",$cod_postal ," ",$municipio,", ",$ciudad,", ",$estado ?> </p>
      </div>

      <div class="item-compras">

          <!-- <button class="btn editar"  onclick="location.href='http://localhost/artesanias_copia/editar_cuenta.php'">Editar informacion</button> -->
          <a class="btn editar" href="editar_Cuenta.php">Editar informacion</a>
          
          <a class="btn carrito"  href="compras.php">Ir a mi carrito</a>

          <button class="btn eliminar"  onclick="notificar(<?php echo $id ?>)">Eliminar cuenta</button>
          
            
      </div>
    
    </div>

  </div>

  <?php
  include("footer.php");
  ?>
</body>
</html>