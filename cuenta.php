<?php 
    include("sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/cuenta.css">
  <script defer src="alert.js"></script>
    <title>Mi cuenta</title>
</head>
<body>

    <?php
    include("nav.php");

        require 'conexion.php';
        $id = $_SESSION["id"];
        $query = "SELECT * from domicilios INNER JOIN usuarios on usuarios.domicilio = domicilios.id_domicilios where usuarios.id_usuario = '$id'";
        $consulta = mysqli_query($con,$query);
        if(mysqli_num_rows($consulta)!=0){//Si encontro el usuario		
            $row = mysqli_fetch_assoc($consulta);
            $nombre = $row['nombre'];    
            $apellidos = $row['apellidos'];    
            $correo = $row['correo'];
            $foto = $row['foto'];
            $calle = $row['calle'];
            $numero = $row['numero']; 
            $cod_postal = $row['cod_postal']; 
            $ciudad = $row['ciudad'];
            $estado = $row['estado'];
            $senas = $row['señas'];     
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
        <p class="nombre">Nombre: <?php echo $nombre ?></p>
        <p class="apellidos">Apellidos: <?php echo $apellidos ?> </p>
        <p class="correo">Correo: <?php echo $correo ?> </p>
        <p class="direccion">Direccion: <?php echo $calle," #",$numero,", ",$cod_postal ,", ",$ciudad,", ",$estado ?> </p>
        <p class="senas">Señas particulares: <?php echo $senas ?></p>
      </div>
    
    </div>

    
    <div class="item-compras">
      <div class="titulo-perfil">
        <h2>Mis compras</h2>
      </div>
      <div class="compras">
        <p>no tienes compras</p>
      </div>
    </div>
  
  </div>

  <?php
  include("footer.php");
  ?>

</body>
</html>