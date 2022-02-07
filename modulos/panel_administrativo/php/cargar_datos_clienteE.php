<?php session_start();

include('../../includes/conexion.php');

  $id_cliente=$_POST['id_cliente'];
  $sql="SELECT * FROM clientes WHERE id_cliente='$id_cliente'";
  $sq= $db->query($sql);
  $rows=$sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $cliente[$i]["telefono"]=$row["telefono"];
    $cliente[$i]["direccion"]=$row["direccion"];
    $i++;
  }
    $valores= json_encode($cliente);
    echo $valores;

?>