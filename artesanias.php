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
      if(isset($_GET['nombre'])){
        $artesanias = json_decode(artesanias(1,$_GET['nombre']));  
      }else if(isset($_GET['categoria'])){
        $artesanias = json_decode(artesanias(2,$_GET['categoria']));  
      }
      else{
        $artesanias = json_decode(artesanias(0,""));
      }
      
    ?>

    <div class="contenedor-artesanias">
      <div class="item-titulo">
        <h1>Artesanias</h1>
      </div>
      <form method="GET" class="item-categorias">

        <h2 class="titulo-categoria">Categoria</h2>
        <button type="submit" id="Catrinas"  name="categoria" value="Catrinas" class="btn-categoria">Catrinas</button>
        <button type="submit" id="Ropa"  name="categoria" value="Ropa" class="btn-categoria">Ropa</button>
        <button type="submit" id="Alebrijes" name="categoria" value="Alebrijes" class="btn-categoria">Alebrijes</button>
        <button type="submit" id="Juguetes"  name="categoria" value="Juguetes" class="btn-categoria">Juguetes</button>
        <button type="submit" id="Jarrones"  name="categoria" value="Jarrones" class="btn-categoria">Jarrones</button>
        <button type="submit" id="Joyeria"  name="categoria" value="Joyeria" class="btn-categoria">Joyeria</button>
        <button type="submit" id="Vajillas"  name="categoria" value="Vajillas" class="btn-categoria">Vajillas</button>
        <?php 
          if(isset($_GET['categoria'])){
            $categoria = $_GET['categoria'];
            $s = "<script>";
            $s.= "document.getElementById('$categoria').style='color:#fff;background-color:#6A994E;'";
            $s.= "</script>";
            echo $s;
          } 
        
          ?>

      </form>
      <div class="item-artesanias">
        <div class="buscador">
          
          <div class="searchbar">
              <div class="searchbar-wrapper">
                  <div class="searchbar-center">
                      <div class="searchbar-input-spacer"></div>
                      <form style="width:100%" action="" method="get">
                      <input type="text" class="searchbar-input" value="<?php if(isset($_GET['nombre']))echo $_GET['nombre']; ?>" maxlength="2048" name="nombre" autocapitalize="off" autocomplete="off" title="Search" role="combobox" placeholder="Buscar un producto">
                  </div>
              </div>
          </div>
          <button type="submit" class="btn-buscar"> Buscar </button>
          </form>

        </div>
        <div class="artesanias">
        <?php if($artesanias){?>
        <?php foreach($artesanias as $artesania) { ?>
         <a href="producto.php?id=<?php echo $artesania->id_artesania?>" target="_self">
          <form action="agregarCarrito.php" method="POST" class="contenedor__producto">
              <input type="hidden" name="id_artesania" value="<?php echo $artesania->id_artesania?>">
              <div class="contenedor__imagen">
                  <img src="./img/artesanias/<?php echo $artesania->imagen?>" alt="Producto">
              </div>
              <div class="contenedor__desc">
                    <p id="desc"><?php echo $artesania->nombre ?></p>
                    <p id="precio">$<?php echo $artesania->precio ?> MX</p>
              </div>
              <div class="contenedor__btn">
                  <button>Agregar al carrito</button>
              </div>    
          </form> 
          </a>
        <?php } ?>
        <?php }else{
          echo '<h3>Artesania no disponible</h3>';
        } ?>
        </div>
  
      </div>
    </div>
    






<?php
  include("footer.php");

?>
      
    
</body>
</html>