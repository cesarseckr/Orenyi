<?php 
    require("../../includes/conexioncon.php");
    include('../../includes/conexion.php');

    ini_set('date.timezone', 'America/Mexico_City');

    $id_orden= $_POST["id_orden"];
    $total = $_POST["campo_total"];

    $consulta = mysqli_query($con,"UPDATE orden SET total='$total' WHERE id_orden='$id_orden'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo"1";
    }
?>