<?php 
    include("sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/alert.css">
    <link rel="stylesheet" href="css/compras.css">
</head>

<body>
 

    <?php 
        include('nav.php');
        require 'DBManager.php';    
        $compras = json_decode(getCompras($_SESSION['id']));
    ?>
<div class="contenedor">
    <?php if($compras!=null){ ?>
    <h1>Mis Compras</h1>
    <?php foreach($compras as $compra){?>
        <h3><b>Fecha:</b> <?php echo $compra->fecha_venta?></h3>
    <div class="tabla">
        <table class="unstyledTable">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
        <?php foreach(json_decode(getDetalleCompra($compra->id_venta)) as $detalle){  ?>
                <tr>            
                    <td><?php echo $detalle->nombre?></td>
                    <td><?php echo $detalle->cantidad?></td>
                    <td><?php echo $detalle->subtotal ?></td>                        
                </tr>             
        <?php }?>
        </table>
        <h3 id='precio'><b>Total</b>: $<?php echo "$compra->total MX"; ?></h3>
    </div>
    <?php }?>
    <?php }else{
        echo '<h1>Carrito Vacío</h1>';
    }?>
</div>
<?php include('footer.php');?>

</body>
</html>