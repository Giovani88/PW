<?php 
    include("sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="css/styles2.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/alert.css">
  <script defer src="alert.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
    include("nav.php");

        require 'conexion.php';
        $id = $_SESSION["id"];
        $query = "SELECT * FROM usuarios WHERE id_usuario='$id'";
        $consulta = mysqli_query($con,$query);
        if(mysqli_num_rows($consulta)!=0){//Si encontro el usuario		
            $row = mysqli_fetch_assoc($consulta);
            $nombre = $row['nombre'];    
            $apellidos = $row['apellidos'];    
            $correo = $row['correo'];    
        }
    ?>

      <form class="contenedor-registro" action="" method="post" onsubmit="return verificarPasswords();" > 
      <div class="contenedor-formulario">
        <div class="item1">
          <h1 class="h1-r">Mi cuenta</h1>
        </div>
        <div id="alert" class='alert ocultar'>
       <span class='closebtn'>&times;</span>
       Las Contraseñas No Coinciden
     </div>
        <div class="item2">
          <input placeholder="Nombre" type="text" name="nombre" class="input" value="<?php echo $nombre; ?>" required><br>
          <input placeholder="Apellidos" type="text" name="apellidos" class="input" value="<?php echo $apellidos; ?>" required><br>
          <input placeholder="Correo" type="email" name="correo" class="input" value="<?php echo $correo; ?>" pattern="^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}$"required><br>                    
        </div>
        <div class="item3">
          <input placeholder="Nueva contraseña" id="pass2" type="password" class="input" required><br>
          <input placeholder="Repite la contraseña" id="pass2" type="password" class="input" required><br>
        </div>
        <div class="item4">
            <div class="container-botones">
              <div class="btn-cancelar">
                <a class="cancelar" href="index.php">Cancelar</a>
              </div>
              <div class="btn-enviar">
                <button class="enviar" name="enviar" type="submit">Guardar Cambios</button>
              </div>
            </div>
        </div>
      </div>
  </form>
</body>
</html>