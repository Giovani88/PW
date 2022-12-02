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



<div class="contenedor-nosotros">
  <div class="contenedor-grid">
    <div class="item-historia">
      <h2 class="desc-titule">Guanengo</h2>

      <p class="descripcion" style="margin-top: 2rem;">Descripción:
        <br>
        <br>
      </p>
      <p class="desc-producto">
                El huanengo es una blusa típica indígena de Michoacán, México. Es blanca y tiene tiene bordados brillantes. Esta palabra viene de una palabra tarasca (lengua hablada por los purépechas), uanenju que significa blusa.
      </p>
      <br>
      <br>

      <p class="desc-product">Creado por: <strong>Irene Aguilar Alcántara</strong> </p>
      <br>
      <br>

      <p class="desc-precio">Precio: $280.00 Mx</p>
      <br>
      <br>

      <label for="lang">Elige tu talla: </label>
      <select name="lenguajes" id="lang">
          <option value="javascript">32</option>
          <option value="php">34</option>
          <option value="java">36</option>
          <option value="golang">37</option>
        </select>
            


      <br>
      <br>
      Cantidad: <input type="number" value="1" step="1" >

      <br>
      <br>
      <button class="bnt-añadir">Añadir al carrito</button>

      
    </div>
    <div class="item-img1">
      <div class="contenedor-img">
        <img class="cont-img" src="./img/guanengo.png" alt="">
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