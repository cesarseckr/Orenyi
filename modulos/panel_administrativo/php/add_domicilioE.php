<?php 
    require("../../includes/conexioncon.php");
    include('../../includes/conexion.php');

    $id_orden= $_POST["id_orden_domicilio"];
    $tipo_orden=5;
    $tipo_platillo=0;
    $id_tipo_orden=0;
    $id_platillo_1=0;
    $id_platillo_2=0;
    $id_platillo_3=0;
    $cant_platillo="1";
    $servicio_domicilio=$_POST["add_select_domicilio"];
    if ($servicio_domicilio==1) {
        $total=5;
    }else if ($servicio_domicilio==2) {
        $total=10;
    }else if ($servicio_domicilio==3) {
        $total=15;
    }else if ($servicio_domicilio==4) {
        $total=20;
    }

    $consulta = mysqli_query($con,"INSERT INTO contenido_orden(id_orden, tipo_orden, tipo_platillo, id_tipo_orden, id_platillo_1, id_platillo_2, id_platillo_3, cantidad, total, detalles) VALUES ('$id_orden', '$tipo_orden', '$tipo_platillo', '$id_tipo_orden', '$id_platillo_1','$id_platillo_2', '$id_platillo_3', '$cant_platillo', '$total', '$platillo_detalles')");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo"1";
    }
?>