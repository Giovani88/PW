<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="css/styles2.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/alert.css">
  <script defer src="alert.js"></script>
  
  <title>Registrate</title>
</head>

<body class="body-registro">
<?php
  include("nav.php");
?>
<?php

if(isset($_POST['enviar'])){
  require 'conexion.php';
    $nombre = $_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo = $_POST['correo'];
    $password=$_POST['password'];

    $query = "INSERT INTO usuarios VALUES ('','$nombre','$apellidos','$correo',sha1('$password'),now())";

    $insert = mysqli_query($con, $query) or die(mysqli_error());
    if($insert){
      echo 'Registrado con exito';
    }else{
      echo 'Error';
    }   
}
?>

  <form class="contenedor-registro" action="" method="post" onsubmit="return verificarPasswords();" > 
      <div class="contenedor-formulario">
        <div class="item1">
          <h1 class="h1-r">Registro</h1>
        </div>
        <div id="alert" class='alert ocultar'>
       <span class='closebtn'>&times;</span>
       Las Contraseñas No Coinciden
     </div>
        <div class="item2">
          <input placeholder="Nombre" type="text" name="nombre" class="input" required><br>
          <input placeholder="Apellidos" type="text" name="apellidos" class="input" required><br>
          <input placeholder="Correo" type="email" name="correo" class="input" pattern="^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}$"required><br>                    
        </div>
        <div class="item3">
          <input placeholder="Contraseña" id="pass1" type="password" name="password" class="input" required><br>
          <input placeholder="Repite la contraseña" id="pass2" type="password" class="input" required><br>
        </div>
        <div class="item4">
            <input type="checkbox" class="checkbox" required> <a href="#">Acepto términos y condiciones</a>
            <div class="container-botones">
              <div class="btn-cancelar">
                <button class="cancelar">Cancelar</button>
              </div>
              <div class="btn-enviar">
                <button class="enviar" name="enviar" type="submit">Enviar</button>
              </div>
            </div>
        </div>
      </div>
  </form>
  <?php
  include("footer.php");
?>
  
</body>
</html>