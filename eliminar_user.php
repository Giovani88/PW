<?php

if($_GET['s']!=''){

  require 'conexion.php';
        $id = $_GET['s'];
        $query = "SELECT * from domicilio INNER JOIN usuarios on usuarios.correo = domicilio.fk_usuario WHERE usuarios.id_usuario = '$id'";
      $consulta = mysqli_query($con,$query);
      if(mysqli_num_rows($consulta)!=0){//Si encontro el usuario		
            $row = mysqli_fetch_assoc($consulta);
            $correo = $row['correo'];
      }

      $query = "DELETE from usuarios WHERE correo = '$correo'";

      $insert = mysqli_query($con, $query) or die(mysqli_error());
      if($insert){
          header("Location: cerrarSesion.php");
          
      } else {
        echo 'Error';
      }
}

?>