<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/artesanias.css">
    <title>Document</title>
</head>
<body>
  

    <?php include('nav.php');?>
    
    <?php 
      require 'DBManager.php';
      $artesanias = json_decode(artesanias());
    ?>
    


  <?php foreach($artesanias as $artesania) { ?>
    <form action="agregarCarrito.php" method="POST" class="formulario">
        <input type="hidden" name="id_artesania" value="<?php echo $artesania->id_artesania?>">
        <p>
          <?php echo $artesania->nombre?>
       </p> 
       <button> Agregar</button>    
      </form> 
  <?php } ?>
      
    
</body>
</html>