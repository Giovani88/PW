<?php 

    function artesanias(){
        require 'conexion.php';
        $sql = "SELECT * FROM artesanias";
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
    

    function agregarCarrito($id_artesania,$id_usuario){
        require 'conexion.php';
      /*  $sql = "INSERT INTO carrito VALUES ('',$id_usuario,$id_artesania,1,10)";
        $resultado = mysqli_query($con, $sql);*/
        $carrito = existeArtesania($id_usuario, $id_artesania);
        if($carrito!=null){ //Si es verdadero, se modifica                
            modificarCarrito($carrito['id_carrito'],$carrito['cantidad'],$carrito['subtotal']);
        }else{//si es falso, se inserta        
            $precio = precioArtesania($id_artesania);
            $sql = "INSERT INTO carrito VALUES ('',$id_usuario,$id_artesania,1,$precio)";
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

?>