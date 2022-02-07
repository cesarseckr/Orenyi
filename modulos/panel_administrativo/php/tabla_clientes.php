<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de Clientes");
    });
  </script>
  <table id="tabla-1" class="display nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="noExport">Editar</th>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Dirección</th>
      <th>Género</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <? 
      $sql="SELECT * FROM clientes";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
       $id_cliente=$row["id_cliente"];
       $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombre"];
       $direccion=$row["direccion"];
       $telefono=$row["telefono"];
       $email=$row["email"];
       $sexo=$row["sexo"];
       if ($sexo==1) {
        $genero='<i class="fas fa-female text-female"></i>'; 
       }else if ($sexo==2) {
        $genero='<i class="fas fa-male text-male"></i>';  
       }else if ($sexo==3) {
        $genero='<i class="fas fa-circle text-neutral"></i>'; 
       }
       $editar='<button id="modificar_cliente" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mod_clientes" id="boton" data-whatever="@mdo"
            btn-id_cliente="'.$id_cliente.'"
            btn-apaterno="'.$row["apaterno"].'"
            btn-amaterno="'.$row["amaterno"].'"
            btn-nombre="'.$row["nombre"].'"
            btn-direccion="'.$direccion.'"
            btn-telefono="'.$telefono.'"
            btn-genero="'.$sexo.'"
         ><i class="fas fa-user-edit"></i></button>';

        $eliminar='<button type="button" class="btn btn-danger" id="del_cliente" btn-id_cliente="'.$id_cliente.'"><i class="fas fa-minus-circle"></i></button>';
    ?>
    <tr>
      <td><center><? echo $editar; ?></center></td>
      <td><? echo $nombre; ?></td>
      <td><? echo $telefono; ?></td>
      <td><? echo $direccion; ?></td>
      <td><? echo $genero; ?></td>
      <td><? echo $eliminar; ?></td>
    </tr>
    <? } ?>
  </tbody>
</table>