<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles2.css">
  <link rel="stylesheet" href="css/editar_cuenta.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="./css/alert.css">
  <script defer src="js/alert.js"></script>
  <script src="js/eliminarReg.js"></script>
  
  <title>Registrate</title>
</head>

<body class="body-registro">
<?php
  include("nav.php");
?>
<?php

require 'conexion.php';
  
if (isset($_POST['enviar'])) {
    $id = $_SESSION["id"];
    $nombre = $_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo = $_POST['correo'];
    $password=$_POST['password'];

    $calle=$_POST['calle'];
    $numero=$_POST['numero'];
    $cod_postal=$_POST['cp'];
    $municipio=$_POST['municipio'];
    $ciudad=$_POST['ciudad'];
    $estado=$_POST['estado'];

    if($password == ""){
      
      $query = "UPDATE domicilio INNER JOIN usuarios ON usuarios.correo = domicilio.fk_usuario SET usuarios.nombre='$nombre',usuarios.apellidos='$apellidos', domicilio.calle='$calle', domicilio.cp='$cod_postal', domicilio.municipio='$municipio', domicilio.ciudad='$ciudad', domicilio.estado='$estado', domicilio.numero='$numero' WHERE usuarios.id_usuario = '$id'";

    }else{

      $query = "UPDATE domicilio INNER JOIN usuarios ON usuarios.correo = domicilio.fk_usuario SET usuarios.nombre='$nombre',usuarios.apellidos='$apellidos', usuarios.contraseña=sha1('$password'), domicilio.calle='$calle', domicilio.cp='$cod_postal', domicilio.municipio='$municipio', domicilio.ciudad='$ciudad', domicilio.estado='$estado', domicilio.numero='$numero' WHERE usuarios.id_usuario = '$id'";

    }
    
    $insert = mysqli_query($con, $query) or die(mysqli_error());
    if($insert){
      echo 'Registrado con exito';
  } else {
    echo 'Error';
  }
  
  echo '<script language="javascript">alert("juas");</script>';
  header("Location: cuenta.php");

}else{
  $id = $_SESSION["id"];
    $query = "SELECT * from domicilio INNER JOIN usuarios on usuarios.correo = domicilio.fk_usuario WHERE usuarios.id_usuario = '$id'";
    $consulta = mysqli_query($con,$query);
    if(mysqli_num_rows($consulta)!=0){//Si encontro el usuario		
        $row = mysqli_fetch_assoc($consulta);
        $nombre = $row['nombre'];    
        $apellidos = $row['apellidos'];
        $password = $row['contraseña'];    
        $correo = $row['correo'];
        $foto = $row['foto'];
        $calle = $row['calle'];
        $numero = $row['numero']; 
        $cod_postal = $row['cp']; 
        $ciudad = $row['ciudad'];
        $estado = $row['estado'];
        $municipio = $row['municipio'];     
    }

}

?>

<div class="contenedor-editar">

  <div class="contenedor-items">

  <div class="item-alerta">

    <div id="alert" class='alert ocultar'>
        <span class='closebtn'>&times;</span>
        <center>Las Contraseñas No Coinciden</center>
    </div>

  </div>

  <div class="item-formulario1">
    <h1 class="h1-r">Editar perfil</h1>
    <img class="img-usuario" src="img/usuarios/<?php echo $foto ?>" alt=""><br>

    <form  action="add_img.php" method="post" enctype="multipart/form-data">
        <input id="fileTest" name="fileTest" type="file">
        <button type="submit"  class="input-filetest">Actualizar foto de perfil</button>
    </form>

  </div>
    
  <div class="item-formulario2">
    <form class="contenedor-registro" action="" method="post" onsubmit="return verificarPasswords();" > 
      <div class="contenedor-formulario">
        <div class="item1">

        </div>
        <div class="item2">
          <p>informacion personal</p>
          <input type="text" name="nombre" class="input" value="<?php echo $nombre ?>" ><br>
          
          <input value="<?php echo $apellidos ?>" type="text" name="apellidos" class="input" ><br>
          
          <input value="<?php echo $correo ?>"  type="email" name="correo" class="input" pattern="^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}$"><br>
          
          <input placeholder="Contraseña" id="pass1" type="password" name="password" class="input" ><br>
          
          <input placeholder="Repetir Contraseña" id="pass2" type="password" class="input" ><br>
        </div>
        <div class="item3">
          <p>informacion del domicilio</p>

          <input value="<?php echo $calle ?>" id="calle" type="text" name="calle" class="input" ><br>
          
          <input value="<?php echo $numero ?>" id="numero" type="text" name="numero" class=" num" >
          
          <input value="<?php echo $cod_postal ?>" id="cp" type="text" name="cp" class=" codp" ><br>
          
          <input value="<?php echo $municipio ?>" id="municipio" type="text" name="municipio" class="input" ><br>
          
          <input value="<?php echo $ciudad ?>" id="ciudad" type="text" name="ciudad" class="input" ><br>
          
          <input value="<?php echo $estado ?>" id="estado" type="text" name="estado" class="input" ><br>

          

          
        </div>
        <div class="item4">
            <div class="container-botones">
              <div class="btn-cancelar">
                <a href="cuenta.php" class="cancelar">Cancelar</a>
              </div>
              <div class="btn-enviar">
                <button class="enviar" name="enviar" type="submit">Guardar Información</button>
              </div>
            </div>
        </div>
      </div>
  </form>

  </div>
  


  </div>

</div>

  <?php
  include("footer.php");
?>
  
</body>
</html>