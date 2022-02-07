<? 
if($tipo==3 or $tipo==99){ 

  $sql="SELECT * FROM administrativos where id_administrativo='$datos'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $nombre=$row['nombres']." ".$row['apaterno']." ".$row['amaterno'];
    $nbre=$row['nombres'];
    $ap=$row['apaterno'];
    $am=$row['amaterno'];
  }
}else {
	echo'<meta http-equiv="Refresh" content="0; url=../index.php" />';
	echo'<style>  body{ visibility:hidden;} </style>';
}
?>