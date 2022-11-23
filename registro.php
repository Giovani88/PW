<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="css/styles2.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Registrate</title>
</head>

<body class="body-registro">
<?php
  include("nav.php");
?>
  <div class="contenedor-registro"> 
      <div class="contenedor-formulario">
        <div class="item1">
          <h1 class="h1-r">Registro</h1>
        </div>
        
        <div class="item2">
          <input placeholder="Nombre" type="text" class="input" required><br>
          <input placeholder="Apellidos" type="text" class="input" required><br>
          <input placeholder="Correo" type="text" class="input" required><br>
          
          
        </div>
        <div class="item3">
          <input placeholder="Contraseña" type="password" class="input" required><br>
          <input placeholder="Repite la contraseña" type="password" class="input" required><br>

        </div>
        <div class="item4">

            <input type="checkbox" class="checkbox" required> <a href="#">Acepto terminos y condiciones</a>

            <div class="container-botones">
              <div class="btn-cancelar">
                <button class="cancelar">Cancelar</button>
              </div>
              <div class="btn-enviar">
                <button class="enviar" type="submit">Enviar</button>
              </div>

            </div>

        </div>
      </div>

    
  </div>



  <?php
  include("footer.php");
?>
  
</body>
</html>