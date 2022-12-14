<!DOCTYPE php>
<php lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script defer src="java.js"></script>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/alert.css">
  <link rel="stylesheet" href="./css/artesanos.css">
</head>

<body>
<?php
  include("nav.php");
  require 'DBManager.php';
  $artesanias = json_decode(artesanias(0,""));
  $artesanos = json_decode(getArtesanos());
?>
  <section class="section">
      <div class="section-container">         
      <div class="slider-container"></div>
      </div>
  </section>
  <script src="./js/database.js"></script>
  <script src="./js/script.js"></script>
<!-- CATEGORIAS -->  
  <div class="contenedor-categorias">
      <h1 class="titulo" >Categorias</h1>
    
    <div class="categorias">
      <a href="artesanias.php?categoria=Catrina">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/catrinas.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Catrina</h2>
          </div>
        </div>
      </a>

      <a href="artesanias.php?categoria=Ropa">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/camisa.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Ropa</h2>
          </div>
        </div>
      </a>

      <a href="artesanias.php?categoria=Alebrijes">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/alebrijes.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Alebrijes</h2>
          </div>
        </div>
      </a>

      <a href="artesanias.php?categoria=Juguetes">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/juguetes.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Juguetes</h2>
          </div>
        </div>
      </a>

      <a href="artesanias.php?categoria=Jarrones">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/jarron.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Jarrones</h2>
          </div>
        </div>
      </a>

      <a href="artesanias.php?categoria=Joyeria">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/joyeria.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Joyeria</h2>
          </div>
        </div>
      </a>

      <a href="artesanias.php?categoria=Vajillas">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/vajillas.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Vajillas</h2>
          </div>
        </div>
      </a>

    </div>
  </div>
  
<!-- ARTESANIAS -->  
  <div class="contenedor">
  <?php if($artesanias){?>
    <h1 class="titulo">Encuentra las artesanias que más te gusten</h1>
    <div class="contenedor__productos">
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
 <!-- ARTESANOS -->
  <div class="contenedor__artesanos">
  <?php if($artesanos){?>
    <h1 class="titulo">Conoce a nuestros artesanos</h1>
       <?php foreach($artesanos as $artesano){?>
        <a class='url' href=artesano.php?id=<?php echo $artesano->id_artesano?>>
            <div class='contenedor__artesano'>
                <div class='contenedor__imagen--artesano'>
                    <img src='./img/artesanos/<?php echo $artesano->imagen?>' alt='artesano'>
                </div>
                <div class='contenedor__desc'>
                    <p id='nombre'><?php echo $artesano->nombre?></p>            
                </div>
                <div class='contenedor__btn'>
                    <button>Conocer más</button>
                </div> 
            </div>
        </a>
  <?php }?>
  <?php }?>
  </div>

<?php
  include("footer.php");
?>
</body>
</php>