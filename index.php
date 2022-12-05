<!DOCTYPE php>
<php lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script defer src="java.js"></script>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/alert.css">
</head>

<body>
<?php
  include("nav.php");
?>
  <section class="section">
      <div class="section-container">         
      <div class="slider-container"></div>
      </div>
  </section>
  <script src="./js/database.js"></script>
  <script src="./js/script.js"></script>

  <div class="contenedor-categorias">
    <div class="contenedor-titulo">
      <h1 class="titulo" >Categorias</h1>
    </div>
    <div class="categorias">
      <a href="login.html">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/catrinas.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Catrina</h2>
          </div>
        </div>
      </a>

      <a href="login.html">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/camisa.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Ropa</h2>
          </div>
        </div>
      </a>

      <a href="login.html">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/alebrijes.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Alebrijes</h2>
          </div>
        </div>
      </a>

      <a href="login.html">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/juguetes.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Juguetes</h2>
          </div>
        </div>
      </a>

      <a href="login.html">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/jarron.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Jarrones</h2>
          </div>
        </div>
      </a>

      <a href="login.html">
        <div class="categoria">
          <div class="circulo">
            <img class="circulo-img" src="./img/categorias/joyeria.png" alt="">
          </div>
          <div class="titulo-categoria">
            <h2 class="titulo-categorias">Joyeria</h2>
          </div>
        </div>
      </a>

      <a href="login.html">
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
  
  
  <div class="contenedor">
    <h1 class="titulo">Encuentra las artesanias que más te gusten</h1>
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
            <img src="./img/9.png" alt="Producto">
        </div>
        <div class="contenedor__desc">
            <p id="desc">Batea redonda Janitzio</p>
            <p id="precio">$755.18</p>
        </div>
        <div class="contenedor__btn">
            <button>Agregar al carrito</button>
        </div>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <h1 class="titulo">Conoce a nuestros artesanos</h1>
    <div class="contenedor__productos">

      <div class="contenedor__producto">
        <div class="contenedor__imagen--artesano">
            <img src="./img/artesanos/artesano.png" alt="Producto">
        </div>
        <div class="contenedor__desc">
            <p id="nombre"> Fabian GilbertoMartínez</p>

        </div>
        <div class="contenedor__btn">
            <button>Conocer más</button>
        </div>
        
      </div>
      <div class="contenedor__producto">
        <div class="contenedor__imagen--artesano">
            <img src="./img/artesanos/artesano2.png" alt="Producto">
        </div>
        <div class="contenedor__desc">
            <p id="nombre">José Alfonso Soteno Fernández</p>
            
        </div>
        <div class="contenedor__btn">
            <button>Conocer más</button>
        </div>
        
      </div>

      <div class="contenedor__producto">
        <div class="contenedor__imagen--artesano">
            <img src="./img/artesanos/artesano3.png" alt="Producto">
        </div>
        <div class="contenedor__desc">
            <p id="nombre">Irene Aguilar Alcántara</p>
        </div>
        <div class="contenedor__btn">
            <button>Conocer más</button>
        </div>
      </div>

      <div class="contenedor__producto">
        <div class="contenedor__imagen--artesano">
            <img src="./img/artesanos/artesano3.png" alt="Producto">
        </div>
        <div class="contenedor__desc">
            <p id="nombre">Irene Aguilar Alcántara</p>
        </div>
        <div class="contenedor__btn">
            <button>Conocer más</button>
        </div>
      </div>

      <div class="contenedor__producto">
        <div class="contenedor__imagen--artesano">
            <img src="./img/artesanos/artesano3.png" alt="Producto">
        </div>
        <div class="contenedor__desc">
            <p id="nombre">Irene Aguilar Alcántara</p>
        </div>
        <div class="contenedor__btn">
            <button>Conocer más</button>
        </div>
      </div>     
  </div>
  </div>
<?php
  include("footer.php");

?>

</body>
</php>