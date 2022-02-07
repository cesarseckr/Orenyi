<?php
      $user = $_POST['b'];

      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
      	include("conexion.php");
          $hoy = date('Y-m-d');
          $sql="SELECT * FROM multas WHERE placa='$b' and fecha like '%$hoy%'"; 
 	$comp=0; 
 $sq = $db->query($sql); $rows= $sq->fetchAll();
  foreach ($rows as $row) { 
  	$comp=1; 
  	$fechaP=date("H:i", strtotime($row["fecha"])); 
  		$dir=$row["dir_inf"]; 
  }
             
            if($comp == 0){
                  echo "<center><span style='font-weight:bold;color:green;'><small>&nbsp;&nbsp;Este vehículo no ha sido infraccionado el día de hoy.</small></span></center>";
            }else{
                  echo '<center><span style="font-weight:bold;color:red;"><br><small>&nbsp;&nbsp;Este vehículo ya fue infraccionado el día de hoy a las <b>'.$fechaP.' Hrs.</b> en la siguiente dirección: <b>'.$dir.'</b></small></span></center>';
            }
      }     
?>

							