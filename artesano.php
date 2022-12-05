<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles2.css">
    <script defer src="java.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/artesano.css">
    <link rel="stylesheet" href="./css/alert.css">

</head>
<?php

        $id = $_GET['id'];
        require 'conexion.php';
        $sql = "SELECT * FROM artesanos WHERE id_artesano='$id'";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {            
            $id = $row['id_artesano'];
            $nombre = $row['nombre'];
            $origen = $row['origen'];
            $edad = $row['edad'];
            $historia = $row['historia'];
            $telefono = $row['telefono'];
            $correo = $row['correo'];      
            $imagen = $row['imagen'];              
          }
        } else {
          echo "0 results";
        }
        
    ?>
    <body>
<?php include('nav.php'); ?>
        <div class="contenedor">
            <div class="contenedor__titulo">
                <h1 class="titulo">Artesano: <?php echo $nombre;?> </h1>
            </div>    
            <div class="artesano">
                <div class="artesano__img">
                    <img class="artesano__img--img" src="./img/artesanos/<?php echo $imagen;?>" alt="">
                </div>
                <div class="artesano__desc">
                    <h2 class="subtitulo">Historia</h2>
                    <p class="parrafo"><b>Originario de:</b> <?php echo $origen;?></p>
                    <p class="parrafo"><b>Edad:</b> <?php echo $edad;?> Años</p>
                    <p class="parrafo"><b>Historia:</b> <?php echo $historia;?></p>
                    <h2 class="subtitulo">Contacto</h2>
                    <p class="parrafo"><b>Telefono:</b> <?php echo $telefono;?></p>
                    <p class="parrafo"><b>Correo:</b> <?php echo $correo;?></p>
                </div>
            </div>
        </div>    
        <?php include('footer.php'); ?>
    </body>
</html>