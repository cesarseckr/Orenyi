<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM menu_kushiages";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $kushiages[$i]["id_kushiage"]=$row["id_kushiage"];
    $kushiages[$i]["nombre"]=$row["nombre"];+
    $kushiages[$i]["precio"]=$row["precio"];
    $i++;
  }
  $valores= json_encode($kushiages);
  echo $valores;
  
?>