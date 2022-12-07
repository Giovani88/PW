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

      <p class="desc-product">Creado por: <strong>Irene Aguilar Alcántara</strong> </p>
      <br>
      <br>

      <p class="desc-precio">Precio: $ <?php echo $artesania->precio?> MX</p>
      <br>
      <form action="agregarCarrito.php" method="POST">
      Cantidad: <input type="number" name="cantidad" value="1" step="1" min="1">
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
        <h1 class="titulo">Artesanias de la misma categoría...</h1>
        <div class="contenedor__productos">
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
              <div class="contenedor__imagen">
                  <img src="./img/frida.jpg" alt="Producto">
              </div>
              <div class="contenedor__desc">
                  <p id="desc">Craneo Frida Kahlo</p>
                  <p id="precio">$1,221.07</p>
              </div>
              

              
            </div>
            <div class="contenedor__producto">

                <div class="contenedor__imagen">
                    <img src="./img/catrina.png" alt="Producto">
                </div>
                <div class="contenedor__desc">
                    <p id="desc">Catrina con calabazas</p>
                    <p id="precio">$1,221.07</p>
                </div>
              <div class="contenedor__btn">
                  <button>Agregar al carrito</button>
              </div>
              
            </div>
            <div class="contenedor__producto">
              <div class="contenedor__imagen">
                  <img src="./img/catrina.png" alt="Producto">
              </div>
              <div class="contenedor__desc">
                  <p id="desc">Catrina con calabazas</p>
                  <p id="precio">$1,221.07</p>
              </div>
              <div class="contenedor__btn">
                  <button>Agregar al carrito</button>
              </div>
              
            </div>
            <div class="contenedor__producto">
              <div class="contenedor__imagen">
                  <img src="./img/catrina.png" alt="Producto">
              </div>
              <div class="contenedor__desc">
                  <p id="desc">Catrina con calabazas</p>
                  <p id="precio">$1,221.07</p>
              </div>
              <div class="contenedor__btn">
                  <button>Agregar al carrito</button>
              </div>
              
            </div>
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