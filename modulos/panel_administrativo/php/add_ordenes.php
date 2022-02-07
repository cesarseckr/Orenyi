<div class="modal fade"  style="overflow-y: scroll;" id="add_orden" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title">
          			<i class="fas fa-utensils"></i>&nbsp; Nueva orden
        		</h5>
         		<button type="button" class="close" id="close_registro_orden" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>

      		<? include("php/add_clientes.php"); ?>
      		<? include("php/add_platillo.php"); ?>
      		<? include("php/add_2_makis.php"); ?>
      		<? include("php/add_combo.php"); ?>
      		<? include("php/add_domicilio.php"); ?>
      		<form id="form-ordenes" action="php/add_ordenesE.php" modal="add_orden" nombre_form="Ordenes" method="post" enctype="multipart/form-data">
	      		<div class="modal-body">
			        <div class="form-row">
			          	<div class="form-group col-md-12">
			            	<div class="row">
			              		<div class="form-group col-12" style="display:none">
			                		<label>Id orden:</label>
			                		<input type="text" class="form-control" placeholder="Id orden" name="id_orden" id="id_orden">
			              		</div>
			              		<div class="form-group col-12">
			                		<label>Seleccionar Cliente:</label>
			                		<div class="form-row">
				                  		<SELECT name="select_cliente" id="select_cliente" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione Cliente" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese nombre del Cliente</p>"></SELECT>
				                  		<div class="col-1"></div>
				                  		<button class="btn btn-icons btn-orenyi-1" data-toggle="modal" data-target="#add_cliente" id="mdl_add_cliente" data-whatever="@mdo"><i class="mdi mdi-account-plus"></i></button>
				                	</div>
			              		</div>
			              		<div class="form-group col-12">
			              			<div class="row">
			              				<div class="form-group col-6">
			              					<label>Télefono:</label>
			              					<input type="text" class="form-control" placeholder="Télefono" name="orden_telefono" id="orden_telefono">
			              				</div>
			              				<div class="form-group col-6">
			              					<label>Dirección:</label>
			              					<input type="text" class="form-control" placeholder="Dirección" name="orden_direccion" id="orden_direccion">
			              				</div>
			              			</div>
			              		</div>
			              		<div class="form-group col-12">
			                		<label>Agregar Platillo:</label>
			                		<div class="form-row">
				                  		<SELECT name="agregar_platillo" id="agregar_platillo" class="selectpicker form-control col-12" data-live-search="true" data-live-search-normalize="true" title="Agregar Platillo">
				                  			<option value="1">Maki Clásico</option>
				                  			<option value="2">Maki Especial</option>
				                  			<option value="3">Kushiages</option>
				                  			<option value="4">Bebidas</option>
				                  			<option value="5">2 Makis Clásicos</option>
				                  			<option value="6">2 Makis Especiales</option>
				                  			<option value="7">Combo Orenyi</option>
				                  		</SELECT>
				                	</div>
			              		</div>
							    <div class="form-group col-12">
			                		<label>Tipo de servicio:</label>
			                		<div class="form-row">
				                  		<SELECT name="agregar_tipo_orden" id="agregar_tipo_orden" class="selectpicker form-control col-12" data-live-search="true" data-live-search-normalize="true" title="Agregar tipo de servicio" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Seleccione tipo de servicio</p>">
				                  			<option value="1">Servicio para llevar</option>
				                  			<option value="2">Servicio a Domicilio</option>
				                  		</SELECT>
				                	</div>
			              		</div>
			              		<div  class="table-responsive" style="padding-bottom: 15px;">
				                	<table id="tabla_ordenes" class="table table-bordered" cellspacing="0" width="100%">  
				                    	<thead>
				                      		<tr>
						                        <th class="noExport"></th>
						                        <th>Cant.</th>
						                        <th>Plantillo</th>
						                        <th>Subtotal</th>
				                      		</tr>
				                    	</thead>
				                    	<tbody id="tbody_ordenes">
				                      
				                    	</tbody>
					                    <tfoot>
					                    	<tr>
					                        	<th></th>
					                        	<th></th>
					                        	<th>TOTAL</th>
					                        	<th id="campo_total" name="campo_total">
					                        	</th>
					                      	</tr>
					                    </tfoot>  
				                 	</table>   
				                </div>
				                <div class="form-group col-12">
			                		<label>Notas:</label>
			                		<textarea type="text" class="form-control" name="orden_notas" id="orden_notas"></textarea>
			                	</div>
			              	</div>
			            </div>
			        </div>
			    </div>
			    <div class="modal-footer">
			        <button class="btn btn-orenyi-1"  id="registrar_datos_orden"><i class="fa fa-play-circle"></i>Registrar</button>
			        <button  type="button" class="btn btn-danger" id="cancelar_registro_orden">
			        	<i class="fa fa-times"></i>Cancelar
			        </button>
			    </div>
		    </form> 
      	</div>
    </div>  			
</div>

<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-ordenes',
    errorMessageClass: "error",
    onSuccess: function(){
      add_orden("#form-ordenes");
      $successMsg.show();
      return false; 
    }
  });
</script>