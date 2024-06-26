<?php 

    function artesanias($tipo,$filtro){
        require 'conexion.php';
        $sql = "SELECT * FROM artesanias";
        if($tipo==1){
            $sql= "SELECT * FROM artesanias WHERE nombre LIKE '%$filtro%'";
        }else if($tipo==2){
            $sql= "SELECT * FROM artesanias WHERE categoria='$filtro'";
        }        

        $resultArray = mysqli_query($con, $sql);        
        if (mysqli_num_rows($resultArray) > 0) {
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC))!= NULL) {
                array_push($resultados, $fetch);
            }   
            mysqli_close($con);
            return json_encode($resultados);
        }
    }
    function getCarrito($id_usuario){
        require 'conexion.php';
        $sql = "SELECT * FROM carrito 
        INNER JOIN artesanias ON carrito.id_artesania=artesanias.id_artesania
        WHERE id_usuario=$id_usuario";
        $resultArray = mysqli_query($con, $sql);        
        if (mysqli_num_rows($resultArray) > 0) {
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC))!= NULL) {
                array_push($resultados, $fetch);
            }   
            mysqli_close($con);
            return json_encode($resultados);
        }
    }                
    

    function agregarCarrito($id_artesania,$id_usuario,$cantidad){
        require 'conexion.php';
        $carrito = existeArtesania($id_usuario, $id_artesania);
        if($carrito!=null){ //Si es verdadero, se modifica                
            modificarCarrito($carrito['id_carrito'],$carrito['cantidad'],$carrito['subtotal']);
        }else{//si es falso, se inserta        
            $precio = precioArtesania($id_artesania);
            $precio *= $cantidad;
            $sql = "INSERT INTO carrito VALUES ('',$id_usuario,$id_artesania,$cantidad,$precio)";
            mysqli_query($con, $sql);
        } 
        mysqli_close($con);
    }

    function modificarCarrito($id_carrito,$cantidad,$subtotal){
        require 'conexion.php';
        $precio_unitario = $subtotal/$cantidad;
        
        $cantidad +=1;
       // $subtotal +=$subtotal;
        $precio_unitario *=$cantidad;
        $sql = "UPDATE carrito SET cantidad=$cantidad, subtotal=$precio_unitario WHERE id_carrito=$id_carrito";
        mysqli_query($con, $sql);
        mysqli_close($con);
    }

    function precioArtesania($id_artesania){
        require 'conexion.php';
        $consulta = mysqli_query($con, "SELECT precio FROM artesanias WHERE id_artesania=$id_artesania");
        $artesania = mysqli_fetch_array($consulta);
        mysqli_close($con);
        return $artesania['precio'];
    }
    function existeArtesania($id_usuario,$id_artesania){
        require 'conexion.php';
        $sql ="SELECT * FROM carrito WHERE id_usuario=$id_usuario AND id_artesania=$id_artesania" ;
        $resultado = mysqli_query($con, $sql);
        $array = mysqli_fetch_array($resultado);
       /* if($array['contar']>0){
            return true;
        }else{
            return false;
        }*/
        mysqli_close($con);
        return $array;
        
    }

    function disminuirCantidad($id_carrito){
        require 'conexion.php';
        $consulta = mysqli_query($con, "SELECT cantidad,subtotal FROM carrito WHERE id_carrito=$id_carrito");
        $item = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
        
        if($item['cantidad']!=1){
            //obtenemos el precio unitario 
            $precio_unitario=$item['subtotal']/$item['cantidad'];
            //restamos una unidad a cantidad
            $cantidad=$item['cantidad']-1;
            $precio_unitario *=$cantidad;
            //Hacemos el UPDATE
            $consulta = mysqli_query($con, "UPDATE carrito SET cantidad=$cantidad,subtotal=$precio_unitario WHERE id_carrito=$id_carrito");
        }else{ //cantidad igual a 1, por lo tanto, borrar el registro
            $consulta = mysqli_query($con, "DELETE FROM carrito WHERE id_carrito=$id_carrito");
        }
        mysqli_close($con);
    }
    function aumentarCantidad($id_carrito){
        require 'conexion.php';
        $consulta = mysqli_query($con, "SELECT cantidad,subtotal FROM carrito WHERE id_carrito=$id_carrito");
        $item = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
         //obtenemos el precio unitario 
        $precio_unitario=$item['subtotal']/$item['cantidad'];
        //restamos una unidad a cantidad
        $cantidad=$item['cantidad']+1;
        $precio_unitario *=$cantidad;
        $consulta = mysqli_query($con, "UPDATE carrito SET cantidad=$cantidad,subtotal=$precio_unitario WHERE id_carrito=$id_carrito");
        mysqli_close($con);
    }
    function getArtesania($id_artesania){
        require 'conexion.php';        
        $sql = "SELECT * FROM artesanias WHERE id_artesania=$id_artesania"; 
        $result = mysqli_query($con, $sql);        
        if (mysqli_num_rows($result) > 0) {
            // Los resultados se agregan a un arreglo
            $resultados = array();
            $fetch = mysqli_fetch_array($result, MYSQLI_ASSOC);
            mysqli_close($con);
            return json_encode($fetch);
        }

    }
    function eliminarCarrito($id_usuario){
        require 'conexion.php';
        mysqli_query($con, "DELETE FROM carrito WHERE id_usuario=$id_usuario");

    }

    function addVenta($id_usuario,$total){
        require 'conexion.php';
        $sql = "INSERT INTO ventas VALUES ('','$id_usuario','$total',now())";
        mysqli_query($con, $sql);
        mysqli_close($con); 
        $id = getIdVenta();
        insertarDetalle($id_usuario,$id);
        eliminarCarrito($id_usuario);
    }
    function getIdVenta(){
        require 'conexion.php';
        $sql = "SELECT id_venta FROM ventas order by id_venta desc LIMIT 1";        
        $consulta = mysqli_query($con, $sql);
        $id = mysqli_fetch_array($consulta);
        mysqli_close($con); 
        return $id['id_venta'];
    }
    function modificarArtesaniaStock($id_artesania,$cantidad){
        require 'conexion.php';
        //obtener el valor actual
        $sql = "UPDATE artesanias SET unidades=unidades-$cantidad WHERE id_artesania=$id_artesania";
        mysqli_query($con, $sql);
        mysqli_close($con); 
    }

    function insertarDetalle($id_usuario,$id_venta){
        require 'conexion.php';
        $sql = "SELECT * FROM carrito WHERE id_usuario=$id_usuario";
        $resultArray = mysqli_query($con, $sql);        
        if (mysqli_num_rows($resultArray) > 0) {
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC))!= NULL) {
                // array_push($resultados, $fetch);
                $id_artesania= $fetch['id_artesania'];
                $cantidad= $fetch['cantidad'];
                $subtotal= $fetch['subtotal'];
                $sql = "INSERT INTO detalle_venta VALUES('',$id_artesania,$cantidad,$subtotal,$id_venta)";
                modificarArtesaniaStock($id_artesania,$cantidad);
                mysqli_query($con, $sql); 
            }   
            mysqli_close($con);
            return json_encode($resultados);
        }     
    }
    function getArtesanos(){
        require 'conexion.php';
        $sql = "SELECT * FROM artesanos";
        $resultArray = mysqli_query($con, $sql);        
        if (mysqli_num_rows($resultArray) > 0) {
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC))!= NULL) {
                array_push($resultados, $fetch);
            }   
            mysqli_close($con);
            return json_encode($resultados);
        }
    }
    function getCompras($id_usuario){
        require 'conexion.php';
        $sql = "SELECT * FROM ventas WHERE id_usuario='$id_usuario' ORDER BY fecha_venta desc";
        $resultArray = mysqli_query($con, $sql);        
        if (mysqli_num_rows($resultArray) > 0) {
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC))!= NULL) {
                array_push($resultados, $fetch);
            }   
            mysqli_close($con);
            return json_encode($resultados);
        }
    }
    function getDetalleCompra($id_venta){
        require 'conexion.php';
        $sql = "SELECT * FROM detalle_venta INNER JOIN artesanias ON detalle_venta.id_artesania=artesanias.id_artesania WHERE id_venta='$id_venta'";
        $resultArray = mysqli_query($con, $sql);        
        if (mysqli_num_rows($resultArray) > 0) {
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC))!= NULL) {
                array_push($resultados, $fetch);
            }   
            mysqli_close($con);
            return json_encode($resultados);
        }        
    }
    /*
        1) Insertar en la tabla de ventas done
        2) obtener el id del registro del paso 1 ¿ SELECT * FROM `ventas` order by id_venta desc LIMIT 1 ?
            2.1) Obtener los valores de la tabla carrito donde id_user sea el mismo
            2.2) Insertar los mismos valores a la tabla detalle carrito    
        3) insertar uno o mas registros (ciclo) en la tabla de detalle junto con el id del paso 2
        4)Eliminar el carrito del usuario


        //Compras
        1) Obtener todas las compras de un cliente 
            SELECT * FROM `ventas` WHERE id_usuario=23
        2) Buscar los detalles de dicha venta (id_venta) en un ciclo
    */
?>

