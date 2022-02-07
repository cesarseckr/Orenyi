<?php  session_start();
  include('../../includes/conexion.php');
  
  $id_orden = $_POST['id_orden'];

  $sql="SELECT * FROM contenido_orden where id_orden='$id_orden'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  $total_orden=0;
  foreach ($rows as $row) {
    $total_orden=$row["total"]+$total_orden;
  }
  echo $total_orden;
?>