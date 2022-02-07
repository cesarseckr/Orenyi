<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM menu_makis_especiales";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $makis_especial[$i]["id_maki_especial"]=$row["id_maki_especial"];
    $makis_especial[$i]["nombre"]=$row["nombre"];+
    $makis_especial[$i]["precio"]=$row["precio"];
    $i++;
  }
  $valores= json_encode($makis_especial);
  echo $valores;
  
?>