<?php
  include("../../includes/conexion.php"); 
  require("../../includes/conexioncon.php");

  $id_orden = $_POST['id_orden'];

  $eliminar_servicio_dom= mysqli_query($con,"DELETE FROM contenido_orden WHERE id_orden='$id_orden' AND tipo_orden='5'");

  if (!$eliminar_servicio_dom){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>