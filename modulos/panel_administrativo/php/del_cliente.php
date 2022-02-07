<?php
  require("../../includes/conexioncon.php");

  $id_cliente = $_POST['id_cliente'];

  $eliminar_id_cliente = mysqli_query($con,"DELETE FROM clientes WHERE id_cliente='$id_cliente'");

  if (!$eliminar_id_cliente){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }
?>