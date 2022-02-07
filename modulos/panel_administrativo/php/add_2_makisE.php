<?php 
    require("../../includes/conexioncon.php");
    include('../../includes/conexion.php');

    $id_orden= $_POST["id_orden_2_makis"];
    $tipo_platillo = $_POST["tipo_2_makis"];
    if ($tipo_platillo==5) {
        $total=89;
        $tipo_orden=2;
        $tipo_platillo=1;
    }else if ($tipo_platillo==6) {
        $total=120;
        $tipo_orden=3;
        $tipo_platillo=2;
    }
    $cant_platillo="1"; 
    $id_platillo_1=$_POST["add_select_maki_1"];
    $id_platillo_2=$_POST["add_select_maki_2"];
    $platillo_detalles=$_POST["detalles_2_makis"];

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

    $consulta = mysqli_query($con,"INSERT INTO contenido_orden(id_orden, tipo_orden, tipo_platillo, id_tipo_orden, id_platillo_1, id_platillo_2, id_platillo_3, cantidad, total, detalles) VALUES ('$id_orden', '$tipo_orden', '$tipo_platillo', '$id_tipo_orden', '$id_platillo_1','$id_platillo_2', '0', '$cant_platillo', '$total', '$platillo_detalles')");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo"1";
    }
?>