<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styles2.css">
  <link rel="stylesheet" href="css/producto.css">
  <title>Nosotros</title>
</head>
<body>

<?php
  include("nav.php");
?>
<?php 
  $id=$_GET['id'];
  require 'DBManager.php';
  $artesania=json_decode(getArtesania($id));  
  $artesanias = json_decode(artesanias(2,$artesania->categoria));  
?>
<div class="contenedor-nosotros">
  <div class="contenedor-grid">
    <div class="item-historia">
      <h2 class="desc-titule"><?php echo $artesania->nombre?></h2>

      <p class="descripcion" style="margin-top: 2rem;">Descripción:
        <br>
        <br>
      </p>
      <p class="desc-producto">
          <?php echo $artesania->descripcion ?>
      </p>
      <br>
      <br>
      <p class="desc-producto">Creado por: <strong>Irene Aguilar Alcántara</strong> </p>
      <br>
      <p class="desc-producto">Piezas disponibles: <b><?php echo $artesania->unidades?></b></p>
      <br>
      <p class="desc-precio">Precio: $ <?php echo $artesania->precio?> MX</p>
      <br>
      <form action="agregarCarrito.php" method="POST">
      <label>Cantidad:</label> <input type="number" id="cantidad" name="cantidad" value="1" step="1" min="1">
      <br>
      <br>

        <input type="hidden" name="id_artesania" value="<?php echo $artesania->id_artesania?>">
            <button class="bnt-añadir">Añadir al carrito</button>
      </form>
     
    </div>
    <div class="item-img1">
      <div class="contenedor-img">
        <img class="cont-img" src="./img/artesanias/<?php echo $artesania->imagen ?>" alt="">
      </div>
    </div>    
    <div class="item-img2">   
      <div class="contenedor">
        <?php if($artesanias){?>
          <h1 class="titulo">Artesanias de la misma categoría...</h1>
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
        <?php } ?>
        </div>

    </div>

</div>



<?php
  include("footer.php");
?>



</body>
</html>