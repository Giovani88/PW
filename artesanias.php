<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/artesanias.css">
    <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/alert.css">
    <title>Artesanias</title>

</head>
<body>
  

    <?php include('nav.php');?>
    
    <?php 
      require 'DBManager.php';
      $artesanias = json_decode(artesanias());
    ?>

    <div class="contenedor-artesanias">
      <div class="item-titulo">
        <h1>Artesanias</h1>
      </div>
      <div class="item-categorias">

        <h2 class="titulo-categoria">Categoria</h2>
        <button class="btn-categoria">Catrinas</button>
        <button class="btn-categoria">Ropa</button>
        <button class="btn-categoria">Alebrijes</button>
        <button class="btn-categoria">Juguetes</button>
        <button class="btn-categoria">Jarrones</button>
        <button class="btn-categoria">Joyeria</button>
        <button class="btn-categoria">Vajillas</button>

      </div>
      <div class="item-artesanias">
        <div class="buscador">

          <div class="searchbar">
              <div class="searchbar-wrapper">
                  <div class="searchbar-center">
                      <div class="searchbar-input-spacer"></div>
                      <input type="text" class="searchbar-input" maxlength="2048" name="q" autocapitalize="off" autocomplete="off" title="Search" role="combobox" placeholder="Buscar un producto">
                  </div>
              </div>
          </div>

          <button class="btn-buscar"> Buscar </button>


        </div>
        <div class="artesanias">
          
        <div class="contenedor__producto">
          <a href="producto.php">
            <div class="contenedor__imagen">
              <img src="./img/guanengo.png" alt="Producto">
            </div>
          </a>
            <div class="contenedor__desc">
                <p id="desc">Guanengo</p>
                <p id="precio">$1,500.07</p>
            </div>
          
          <div class="contenedor__btn">
              <button>Agregar al carrito</button>
          </div>     
        </div>

        <div class="contenedor__producto">
          <a href="producto.php">
            <div class="contenedor__imagen">
              <img src="./img/guanengo.png" alt="Producto">
            </div>
          </a>
            <div class="contenedor__desc">
                <p id="desc">Guanengo</p>
                <p id="precio">$1,500.07</p>
            </div>
          
          <div class="contenedor__btn">
              <button>Agregar al carrito</button>
          </div>     
        </div>

        <div class="contenedor__producto">
          <a href="producto.php">
            <div class="contenedor__imagen">
              <img src="./img/guanengo.png" alt="Producto">
            </div>
          </a>
            <div class="contenedor__desc">
                <p id="desc">Guanengo</p>
                <p id="precio">$1,500.07</p>
            </div>
          
          <div class="contenedor__btn">
              <button>Agregar al carrito</button>
          </div>     
        </div>

        <div class="contenedor__producto">
          <a href="producto.php">
            <div class="contenedor__imagen">
              <img src="./img/guanengo.png" alt="Producto">
            </div>
          </a>
            <div class="contenedor__desc">
                <p id="desc">Guanengo</p>
                <p id="precio">$1,500.07</p>
            </div>
          
          <div class="contenedor__btn">
              <button>Agregar al carrito</button>
          </div>     
        </div>

        <div class="contenedor__producto">
          <a href="producto.php">
            <div class="contenedor__imagen">
              <img src="./img/guanengo.png" alt="Producto">
            </div>
          </a>
            <div class="contenedor__desc">
                <p id="desc">Guanengo</p>
                <p id="precio">$1,500.07</p>
            </div>
          
          <div class="contenedor__btn">
              <button>Agregar al carrito</button>
          </div>     
        </div>

        <div class="contenedor__producto">
          <a href="producto.php">
            <div class="contenedor__imagen">
              <img src="./img/guanengo.png" alt="Producto">
            </div>
          </a>
            <div class="contenedor__desc">
                <p id="desc">Guanengo</p>
                <p id="precio">$1,500.07</p>
            </div>
          
          <div class="contenedor__btn">
              <button>Agregar al carrito</button>
          </div>     
        </div>

        </div>
      </div>
    </div>
    


  <!-- <?php foreach($artesanias as $artesania) { ?>
    <form action="agregarCarrito.php" method="POST" class="formulario">
        <input type="hidden" name="id_artesania" value="<?php echo $artesania->id_artesania?>">
        <p>
          <?php echo $artesania->nombre?>
       </p> 
       <button> Agregar</button>    
      </form> 
  <?php } ?> -->



<?php
  include("footer.php");

?>
      
    
</body>
</html>