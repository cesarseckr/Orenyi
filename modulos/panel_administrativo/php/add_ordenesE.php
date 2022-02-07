<?php 
    require("../../includes/conexioncon.php");
    include('../../includes/conexion.php');

    ini_set('date.timezone', 'America/Mexico_City');

    $id_orden= $_POST["id_orden"];
    $id_cliente = $_POST["select_cliente"];
    $direccion = $_POST["orden_direccion"];
    $telefono = $_POST["orden_telefono"];
    $fecha = date('Y-m-d', time());
    $hora = date('H:i:s', time());
    $tipo = $_POST["agregar_tipo_orden"];
    $estado =1;
    $notas = $_POST["orden_notas"];
    
    $consulta = mysqli_query($con,"UPDATE orden SET id_cliente='$id_cliente',direccion='$direccion', telefono='$telefono', fecha='$fecha', hora='$hora', tipo='$tipo', estado='$estado', notas='$notas' WHERE id_orden='$id_orden'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo"1";
    }
?>