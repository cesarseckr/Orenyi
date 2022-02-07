<?php 
	require("../../includes/conexioncon.php");
    $id_cliente = $_POST["id_cliente"];
    $apaterno = $_POST["apaterno_mod"];
    $amaterno= $_POST["amaterno_mod"];
    $nombre = $_POST["nombre_mod"];
    $direccion = $_POST["direccion_mod"];
    $telefono = $_POST["telefono_mod"];
    $sexo = $_POST["sexo_mod"];

    $consulta = mysqli_query($con,"UPDATE clientes SET nombre='$nombre', apaterno='$apaterno', amaterno='$amaterno', telefono='$telefono', direccion='$direccion', sexo='$sexo' WHERE id_cliente='$id_cliente'");

    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
		echo"1";
  	}
 ?>