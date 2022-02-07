<?php 
    require("../../includes/conexioncon.php");
    include('../../includes/conexion.php');

    $id_orden= $_POST["id_orden_combo"];
    $tipo_orden=4;
    $tipo_platillo=0;
    $id_platillo_1=$_POST["combo_select_platillo"];
    $id_platillo_2=$_POST["combo_select_kushiage"];
    $id_platillo_3=$_POST["combo_select_bebida"];
    $cant_platillo="1";
    $total=85; 
    $platillo_detalles=$_POST["combo_detalles"];

    $sql_conteo="SELECT COUNT(id_tipo_orden) FROM contenido_orden WHERE id_orden='$id_orden' AND tipo_orden='$tipo_orden' AND tipo_platillo='$tipo_platillo'";

    $sq_conteo= $db->query($sql_conteo);
    $rows=$sq_conteo->fetchAll();
    foreach ($rows as $row) {
        $conteo_id_tipo_orden=$row["COUNT(id_tipo_orden)"];
    }

    if ($conteo_id_tipo_orden>0) {
        $sql_verificacion="SELECT id_tipo_orden FROM contenido_orden WHERE id_orden='$id_orden' AND tipo_orden='$tipo_orden' AND tipo_platillo='$tipo_platillo' ORDER BY id_tipo_orden DESC LIMIT 1";

        $sq_verificacion= $db->query($sql_verificacion);
        $rows=$sq_verificacion->fetchAll();
        foreach ($rows as $row) {
            $id_tipo_orden=$row["id_tipo_orden"]+1;
        }
    }else{
        $id_tipo_orden=1;
    }

    $consulta = mysqli_query($con,"INSERT INTO contenido_orden(id_orden, tipo_orden, tipo_platillo, id_tipo_orden, id_platillo_1, id_platillo_2, id_platillo_3, cantidad, total, detalles) VALUES ('$id_orden', '$tipo_orden', '$tipo_platillo', '$id_tipo_orden', '$id_platillo_1','$id_platillo_2', '$id_platillo_3', '$cant_platillo', '$total', '$platillo_detalles')");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo"1";
    }
?>