<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yilaob</title>
    <link rel="stylesheet" href="./css/artesanos.css">
    <script defer src="java.js"></script>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/alert.css">
</head>
<body>
    <?php
        include('nav.php');    
    ?>

    <h1 class='titulo'>Nuestros Artesanos</h1>

<!--         
    <div class="contenedor__artesano">
        <div class="contenedor__imagen--artesano">
            <img src="./img/artesano/artesano.png" alt="artesano">
        </div>
        <div class="contenedor__desc">
            <p id="nombre"> Fabian Gilberto Martínez</p>

        </div>
        <div class="contenedor__btn">
            <button>Conocer más</button>
        </div>
      </div>

      <div class="contenedor__artesano">
        <div class="contenedor__imagen--artesano">
            <img src="./img/artesano2.png" alt="artesano">
        </div>
        <div class="contenedor__desc">
            <p id="nombre">José Alfonso Soteno Fernández</p>
            
        </div>
        <div class="contenedor__btn">
            <button>Conocer más</button>
        </div>
        
      </div>

        <div class="contenedor__artesano">
            <div class="contenedor__imagen--artesano">
                <img src="./img/artesano3.png" alt="artesano">
            </div>
            <div class="contenedor__desc">
                <p id="nombre">Irene Aguilar Alcántara</p>
            </div>
            <div class="contenedor__btn">
                <button>Conocer más</button>
            </div>
        </div>

        <div class="contenedor__artesano">
            <div class="contenedor__imagen--artesano">
                <img src="./img/artesanos/juana.jpg" alt="artesano">
            </div>
            <div class="contenedor__desc">
                <p id="nombre">Francisca Rivera Pérez</p>
            </div>
            <div class="contenedor__btn">
                <button>Conocer más</button>
            </div>
        </div>

        <div class="contenedor__artesano">
            <div class="contenedor__imagen--artesano">
                <img src="./img/artesanos/artesano2.jpg" alt="artesano">
            </div>
            <div class="contenedor__desc">
                <p id="nombre">Rogelio Bustos</p>
            </div>
            <div class="contenedor__btn">
                <button>Conocer más</button>
            </div>
        </div>

        <div class="contenedor__artesano">
            <div class="contenedor__imagen--artesano">
                <img src="./img/artesanos/maria.jpg" alt="artesano">
            </div>
            <div class="contenedor__desc">
                <p id="nombre">Fabiola Espino</p>
            </div>
            <div class="contenedor__btn">
                <button>Conocer más</button>
            </div>
        </div>          -->
<div class='contenedor__artesanos'>
    <?php
        require 'conexion.php';
        $sql = "SELECT * FROM artesanos";
        $result = mysqli_query($con, $sql);        
        if (mysqli_num_rows($result) > 0) {        
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {            
            $id = $row['id_artesano'];
            $nombre = $row['nombre'];
            $imagen = $row['imagen'];
            echo "<a class='url' href=artesano.php?id=$id>
                <div class='contenedor__artesano'>
                    <div class='contenedor__imagen--artesano'>
                        <img src='./img/artesanos/$imagen' alt='artesano'>
                    </div>
                    <div class='contenedor__desc'>
                        <p id='nombre'>$nombre</p>            
                    </div>
                    <div class='contenedor__btn'>
                        <button>Conocer más</button>
                    </div> 
                </div>
                </a>";
          }
        }     

    ?>
</div>


</body>
</html>