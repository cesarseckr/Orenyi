<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM clientes";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $clientes[$i]["id_cliente"]=$row["id_cliente"];
    $clientes[$i]["nombre"]=$row["nombre"]." ".$row["apaterno"]." ".$row["amaterno"];
    $i++;
  }
  $valores= json_encode($clientes);
  echo $valores;
  
?>