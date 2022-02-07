<?php 
	require("../../includes/conexioncon.php");

	  
    ini_set('date.timezone', 'America/Mexico_City');
    $fecha_pedido= date('Y-m-d', time());
    $hora_pedido= date('H:i:s', time());

    $consulta = mysqli_query($con,"INSERT INTO orden (fecha, hora) VALUES ('$fecha_pedido','$hora_pedido')");

    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
      require("../../includes/conexion.php");
      $sql_id_pedido="SELECT MAX(id_orden) as id_orden FROM orden";
      $sq= $db->query($sql_id_pedido);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id_orden=$row["id_orden"];  
      }
      echo $id_orden;
  	}

 ?>