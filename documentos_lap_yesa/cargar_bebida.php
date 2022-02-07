<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM menu_bebidas";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $bebidas[$i]["id_bebida"]=$row["id_bebida"];
    $bebidas[$i]["nombre"]=$row["nombre"];+
    $bebidas[$i]["precio"]=$row["precio"];
    $i++;
  }
  $valores= json_encode($bebidas);
  echo $valores;
  
?>