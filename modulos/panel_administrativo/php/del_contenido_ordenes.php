<?php
  include("../../includes/conexion.php"); 
  require("../../includes/conexioncon.php");

  $id_contenido_orden = $_POST['id_contenido_orden'];

  $eliminar_contenido_orden = mysqli_query($con,"DELETE FROM contenido_orden WHERE id_contenido_orden='$id_contenido_orden'");

  if (!$eliminar_contenido_orden){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>