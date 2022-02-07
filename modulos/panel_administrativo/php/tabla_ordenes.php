<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
	<script>
    	$(document).ready(function() {
     		tabla("Listado de ordenes");
    	});
  	</script>
  	<table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
  		<thead>
	    	<tr>
		        <th class="noExport">Ver</th>
		        <th class="noExport">Editar</th>
		        <th>Cliente</th>
		        <th>Hora</th>
		        <th>Total</th>
		        <th>Estatus</th>
		        <th></th>
	    	</tr>
	    </thead>
	  	<tbody>
	  		<?
	  			$sql_tabla_orden="SELECT * FROM orden WHERE fecha ='$fecha'"; 
	  			$sq=$db->query($sql_tabla_orden);
        		$rows=$sq->fetchAll();
        		foreach($rows as $row){
        			$id_orden=$row["id_orden"];
        			$id_cliente=$row["id_cliente"];
        			$fecha=$row["fecha"];
        			$hora=$row["hora"];
        			$tipo=$row["tipo"];
        			$clase=$row["clase"];
        			$estado=$row["estado"];
        			$detalles=$row["detalles"];
        			$total=$row["total"];

        			
        			$sql_datos_cliente="SELECT * FROM clientes WHERE id_cliente ='$id_cliente'"; 
		  			$sq_datos_cliente=$db->query($sql_datos_cliente);
	        		$rows_datos_cliente=$sq_datos_cliente->fetchAll();
	        		foreach($rows_datos_cliente as $row_datos_cliente){
	        			$nombre=$row_datos_cliente['nombre']." ".$row_datos_cliente['apaterno']." ".$row_datos_cliente['amaterno'];
	        		}

	        		$ver='<a class="btn btn-secondary" id="ver_orden" id_orden="'.$id_orden.'" href="" target="_blank"><i class="fas fa-eye"></i></a>';

	        		if ($estado=="1") {
	        			$estado='<button class="btn btn-warning"> <i class="far fa-clock"></i> Preparando</button>';
	        			$editar='<button class="btn btn-success" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo"> <i class="fa fa-edit"></i> Edtiar</button>';
						$entregar='<button class="btn btn-primary" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo"> <i class="far fa-check-circle"></i> Entregar</button>';
						$cancelar='<button class="btn btn-danger" id="cancelar_orden" id_orden="'.$id_orden.'"> <i class="fa fa-ban"></i> Cancelar</button>';
	        		}else if($estado=="2") {
	        			$estado='<button class="btn btn-info"> <i class="far fa-bell"></i> Finalizado</button>';
	        			$editar='<button class="btn btn-success" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo"> <i class="fa fa-edit"></i> Edtiar</button>';
						$entregar='<button class="btn btn-primary" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo"> <i class="far fa-check-circle"></i> Entregar</button>';
						$cancelar='<button class="btn btn-danger" id="cancelar_orden" id_orden="'.$id_orden.'"> <i class="fa fa-ban"></i> Cancelar</button>';
	        		}else if($estado=="3") {
	        			$estado='<button class="btn btn-primary"> <i class="far fa-check-circle"></i> Entregado</button>';
	        			$editar='<button class="btn btn-secondary" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo" disabled> <i class="fa fa-edit"></i> Edtiar</button>';
	        			$entregar='<button class="btn btn-secondary" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo" disabled> <i class="far fa-check-circle"></i> Entregar</button>';
	        			$cancelar='<button class="btn btn-secondary" id="cancelar_orden" id_orden="'.$id_orden.'" disabled> <i class="fa fa-ban"></i> Cancelar</button>';	        			
	        		}else if($estado=="4") {
	        			$estado='<button class="btn btn-secondary"> <i class="fa fa-ban"></i> Cancelado</button>';
	        			$editar='<button class="btn btn-secondary" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo" disabled> <i class="fa fa-edit"></i> Edtiar</button>';
	        			$entregar='<button class="btn btn-secondary" data-toggle="modal" data-target="#add_orden" id="mdl_editar_orden" id_orden="'.$id_orden.'" data-whatever="@mdo" disabled> <i class="far fa-check-circle"></i> Entregar</button>';
	        			$cancelar='<button class="btn btn-secondary" id="cancelar_orden" id_orden="'.$id_orden.'" disabled> <i class="fa fa-ban"></i> Cancelar</button>';
	        		}

	        		echo "
		                <tr>
			                <td><center>".$ver."</center></td>
			                <td><center>".$editar."</center></td>
			                <td>".$nombre."</td>
			                <td>".$hora."</td>
			                <td>".$total."</td>
			                <td>".$estado."</td>
			                <td>".$cancelar."</td>
		                </tr>
		              ";	
        		}
	  		?>
	  	</tbody>
  	</table>
</div>