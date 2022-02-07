<?php 
	require("../../includes/conexioncon.php");

	  $apaterno = $_POST["apaterno"];
    $amaterno= $_POST["amaterno"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];

    $consulta = mysqli_query($con,"INSERT INTO clientes(nombre, apaterno, amaterno, telefono, direccion, sexo) VALUES ('$nombre','$apaterno','$amaterno','$telefono', '$direccion', '$sexo')");

    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
		  echo"1";
  	}

 ?>