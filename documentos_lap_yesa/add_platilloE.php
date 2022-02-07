<?php 
    require("../../includes/conexioncon.php");
    include('../../includes/conexion.php');

    $id_pedido= $_POST["id_pedido"];
    $tipo_platillo = $_POST["tipo_platillo"];
    $cant_platillo=$_POST["add_cant_platillo"];

    if($tipo_platillo<'5'){
        $id_platillo=$_POST["add_select_platillo"];
    }else if($tipo_platillo=='5'){
        $id_platillo=$_POST["add_select_maki_1"];
        $cant_platillo='1';
    }else if($tipo_platillo=='6'){
        $id_platillo=$_POST["add_select_platillo"];
        $cant_platillo='1';
    }else if($tipo_platillo=='7'){
        $id_platillo=$_POST["add_select_platillo"];
        $cant_platillo='1';
    }
    
    
    $id_platillo=$_POST["id_platillo"];
    
    $platillo_comentarios=$_POST["platillo_comentarios"];

    $sql_conteo="SELECT COUNT(id_tipo_promocion) FROM contenido_orden WHERE tipo_promocion='$tipo_platillo' AND id_orden='$id_pedido'";

    $sq_conteo= $db->query($sql_conteo);
    $rows=$sq_conteo->fetchAll();
    foreach ($rows as $row) {
        $conteo_id_tipo_promocion=$row["COUNT(id_tipo_promocion)"];
    }

    $sql_precio="SELECT COUNT(id_tipo_promocion) FROM contenido_orden WHERE tipo_promocion='$tipo_platillo' AND id_orden='$id_pedido'";

    $sq_precio= $db->query($sql_precio);
    $rows=$sq_precio->fetchAll();
    foreach ($rows as $row) {
        $conteo_id_tipo_promocion=$row["COUNT(id_tipo_promocion)"];
    }

    if ($conteo_id_tipo_promocio>0) {
        $sql_verificacion="SELECT id_tipo_promocion FROM contenido_orden WHERE tipo_promocion='$tipo_platillo' AND id_orden='$id_pedido' ORDER BY id_tipo_promocion DESC LIMIT 1";

        $sq_verificacion= $db->query($sql_verificacion);
        $rows=$sq_verificacion->fetchAll();
        foreach ($rows as $row) {
            $id_tipo_promocion=$row["id_tipo_promocion"]+1;
        }
    }else{
        $id_tipo_promocion=1;
    }

    $consulta = mysqli_query($con,"INSERT INTO contenido_orden(id_orden, tipo_promocion, id_tipo_promocion, id_platillo, cantidad, precio, comentarios) VALUES ('$id_pedido','$tipo_platillo','$id_tipo_promocion','$id_platillo', '$cant_platillo','','$platillo_comentarios')");

    //$consulta = mysqli_query($con,"INSERT INTO contenido_orden (id_orden, tipo_promocion, id_tipo_promocion, id_platillo, cantidad, precio, comentarios) VALUES ('$id_pedido','$tipo_platillo','$id_paciente','$tipo','1')");

    //if (!$consulta){
      //echo "error al registrar en la base de datos" . mysql_error();
    //}else{
    //echo "1";
    //}
?>