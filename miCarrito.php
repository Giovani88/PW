<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/alert.css">
    <link rel="stylesheet" href="css/miCarrito.css">
    <title>Document</title>
    <?php include('nav.php');?>
</head>

<body>

    <?php 
        if(!isset($_SESSION['id'])){session_start();} 
        if(isset($_SESSION['id'])){
            $id_usuario = $_SESSION['id'];
            require 'DBManager.php';
            $carrito = json_decode(getCarrito($id_usuario));
        }else{
            header("location:login.php");
        }
    ?>
    <div class="contenedor">
    <?php if($carrito!=null){ $total=0;?>
        

        <h1>Mi carrito</h1>
            <div class="tabla">
        <table class="unstyledTable">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acción</th>
            </tr>
        </thead>
        <form action=""></form>

    <?php  foreach($carrito as $item) { ?>
            <tr>
            <form action="itemCarrito.php" method="POST">
                <td><?php echo $item->nombre?></td>
                <td><?php echo $item->cantidad?></td>
                <td><?php echo $item->subtotal ?></td>
                <td><button class="btn" name="agregar"><i class="fi fi-sr-add"></i></button>
                <button button class="btn" name="borrar"><svg class="btn_decrementar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px" viewBox="0 0 32 32" version="1.1">
                <g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" d="M 16.21875 0 C 7.382812 0 0.21875 7.164062 0.21875 16 C 0.21875 24.835938 7.382812 32 16.21875 32 C 25.054688 32 32.21875 24.835938 32.21875 16 C 32.207031 7.167969 25.050781 0.0078125 16.21875 0 Z M 21.550781 17.332031 L 10.882812 17.332031 C 10.148438 17.332031 9.550781 16.738281 9.550781 16 C 9.550781 15.261719 10.148438 14.667969 10.882812 14.667969 L 21.550781 14.667969 C 22.289062 14.667969 22.882812 15.261719 22.882812 16 C 22.882812 16.738281 22.289062 17.332031 21.550781 17.332031 Z M 21.550781 17.332031 "/></g></svg></button></td>
                <input type="hidden" name="id_carrito" value="<?php echo $item->id_carrito?>">
                </form>
            </tr> 
            
    <?php $total+=$item->subtotal; }?>
    </table>
    <h3>Total: <?php echo "$$total MX"; ?></h3>
    <div class="botones">    
        <button class="btn_opcion vaciar">Vaciar Carrito</button>
        <button class="btn_opcion comprar">Comprar Ahora</button>        
    </div>
    </div>

    <?php }else{
        echo '<h1>Carrito Vacío</h1>';
    }?>
</div>

<?php include('footer.php');?>
</body>
</html>