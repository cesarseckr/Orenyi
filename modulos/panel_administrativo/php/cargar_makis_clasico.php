<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM menu_makis_clasicos";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $makis_clasico[$i]["id_maki_clasico"]=$row["id_maki_clasico"];
    $makis_clasico[$i]["nombre"]=$row["nombre"];+
    $makis_clasico[$i]["precio"]=$row["precio"];
    $i++;
  }
  $valores= json_encode($makis_clasico);
  echo $valores;
  
?>