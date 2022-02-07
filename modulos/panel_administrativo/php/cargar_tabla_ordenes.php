<?php  session_start();
  include('../../includes/conexion.php');
  
  $id_orden = $_POST['id_orden'];
  $sql="SELECT * FROM contenido_orden where id_orden='$id_orden'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  $total_orden=0;
  foreach ($rows as $row) {
    $id_contenido_orden=$row["id_contenido_orden"];
    $tipo_orden=$row["tipo_orden"];
    $tipo_platillo=$row["tipo_platillo"];
    $id_tipo_orden=$row["id_tipo_orden"];
    $id_platillo_1=$row["id_platillo_1"];
    $id_platillo_2=$row["id_platillo_2"];
    $id_platillo_3=$row["id_platillo_3"];
    $cantidad=$row["cantidad"];
    $total=$row["total"];
    $detalles=$row["detalles"];
    $eliminar_orden='<button type="button" class="btn btn-danger" id="del_contenido_orden" id_orden ="'.$id_orden .'" id_contenido_orden ="'.$id_contenido_orden .'"><i class="fas fa-minus-circle"></i></button>';

    if ($tipo_orden==1) {
      $tipo_orden = "Normal";
      if ($tipo_platillo==1) {
        $sql_platillo="SELECT * FROM menu_makis_clasicos where id_maki_clasico='$id_platillo_1'";
        $sq_platillo = $db->query($sql_platillo);
        $rows_platillo= $sq_platillo->fetchAll();
        foreach ($rows_platillo   as $row_platillo) {
          $tipo_platillo=$row_platillo["nombre"];
        }
      }else if ($tipo_platillo==2) {
        $sql_platillo="SELECT * FROM menu_makis_especiales where id_maki_especial='$id_platillo_1'";
        $sq_platillo = $db->query($sql_platillo);
        $rows_platillo= $sq_platillo->fetchAll();
        foreach ($rows_platillo as $row_platillo) {
          $tipo_platillo=$row_platillo["nombre"];
        }
      }else if ($tipo_platillo==3) {
        $sql_platillo="SELECT * FROM menu_kushiages where id_kushiage='$id_platillo_1'";
        $sq_platillo = $db->query($sql_platillo);
        $rows_platillo= $sq_platillo->fetchAll();
        foreach ($rows_platillo as $row_platillo) {
          $tipo_platillo="Kushiage ".$row_platillo["nombre"];
        }
      }else if ($tipo_platillo==4) {
        $sql_platillo="SELECT * FROM menu_bebidas where id_bebida='$id_platillo_1'";
        $sq_platillo = $db->query($sql_platillo);
        $rows_platillo= $sq_platillo->fetchAll();
        foreach ($rows_platillo as $row_platillo) {
          $tipo_platillo=$row_platillo["nombre"];
        } 
      }
    }else if ($tipo_orden==2) {
      $tipo_orden = "2 makis clásicos por $89";
      $sql_platillo_1="SELECT * FROM menu_makis_clasicos where id_maki_clasico='$id_platillo_1'";
      $sq_platillo_1 = $db->query($sql_platillo_1);
      $rows_platillo_1= $sq_platillo_1->fetchAll();
      foreach ($rows_platillo_1 as $row_platillo_1) {
        $tipo_platillo_1=$row_platillo_1["nombre"];
      }
      $sql_platillo_2="SELECT * FROM menu_makis_clasicos where id_maki_clasico='$id_platillo_2'";
      $sq_platillo_2 = $db->query($sql_platillo_2);
      $rows_platillo_2= $sq_platillo_2->fetchAll();
      foreach ($rows_platillo_2 as $row_platillo_2) {
        $tipo_platillo_2=$row_platillo_2["nombre"];
      }  
      $tipo_platillo=$tipo_platillo_1." y ".$tipo_platillo_2;
    }else if ($tipo_orden==3) {
      $tipo_orden = "2 makis especiales por $120";
      $sql_platillo_1="SELECT * FROM menu_makis_especiales where id_maki_especial='$id_platillo_1'";
      $sq_platillo_1 = $db->query($sql_platillo_1);
      $rows_platillo_1= $sq_platillo_1->fetchAll();
      foreach ($rows_platillo_1 as $row_platillo_1) {
        $tipo_platillo_1=$row_platillo_1["nombre"];
      }
      $sql_platillo_2="SELECT * FROM menu_makis_especiales where id_maki_especial='$id_platillo_2'";
      $sq_platillo_2 = $db->query($sql_platillo_2);
      $rows_platillo_2= $sq_platillo_2->fetchAll();
      foreach ($rows_platillo_2 as $row_platillo_2) {
        $tipo_platillo_2=$row_platillo_2["nombre"];
      }  
      $tipo_platillo=$tipo_platillo_1." y ".$tipo_platillo_2;
    }else if ($tipo_orden==4) {
      $tipo_orden = "Combo orenyi";
      $sql_platillo_1="SELECT * FROM menu_makis_clasicos where id_maki_clasico='$id_platillo_1'";
      $sq_platillo_1 = $db->query($sql_platillo_1);
      $rows_platillo_1= $sq_platillo_1->fetchAll();
      foreach ($rows_platillo_1 as $row_platillo_1) {
        $tipo_platillo_1=$row_platillo_1["nombre"];
      }
      $sql_platillo_2="SELECT * FROM menu_kushiages where id_kushiage='$id_platillo_2'";
      $sq_platillo_2 = $db->query($sql_platillo_2);
      $rows_platillo_2= $sq_platillo_2->fetchAll();
      foreach ($rows_platillo_2 as $row_platillo_2) {
        $tipo_platillo_2="Kushiage ".$row_platillo_2["nombre"];
      }
      $sql_platillo_3="SELECT * FROM menu_bebidas where id_bebida='$id_platillo_3'";
      $sq_platillo_3 = $db->query($sql_platillo_3);
      $rows_platillo_3= $sq_platillo_3->fetchAll();
      foreach ($rows_platillo_3 as $row_platillo_3) {
        $tipo_platillo_3=$row_platillo_3["nombre"];
      }  
      $tipo_platillo=$tipo_platillo_1." , ".$tipo_platillo_2." y ".$tipo_platillo_3;
    }else if ($tipo_orden==5) {
      $tipo_orden = "Servicio a Domicilio";
      $tipo_platillo="";
    }
    echo"
      <tr>
        <td>".$eliminar_orden."</th>
        <td>".$cantidad."</th>
        <td><b>".$tipo_orden."</b><br>".$tipo_platillo."<br><i class='text-danger'>".$detalles."</i></th>
        <td>".$total."</th>
      </tr>";
  }
?>