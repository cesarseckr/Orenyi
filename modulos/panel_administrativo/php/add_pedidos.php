<div class="modal fade"  style="overflow-y: scroll;" id="add_pedido" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title">
          			<i class="fas fa-utensils"></i>&nbsp; Nuevo pedido
        		</h5>
         		<button type="button" class="close" id="close_registro_pedido" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>

      		<? include("php/add_clientes.php"); ?>
      		<? include("php/add_platillo.php"); ?>
      		<? include("php/add_2_makis.php"); ?>
      		<? include("php/add_combo.php"); ?>

      		<div class="modal-body">
		        <div class="form-row">
		          	<div class="form-group col-md-12">
		            	<div class="row">
		              		<div class="form-group col-12" style="display:inline">
		                		<label>Id Pedido:</label>
		                		<input type="text" class="form-control" placeholder="Id Pedido" name="id_pedido" id="id_pedido">
		              		</div>
		              		<div class="form-group col-12" style="display:inline">
		                		<label>Seleccionar Cliente:</label>
		                		<div class="form-row">
			                  		<SELECT name="select_cliente" id="select_cliente" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione Cliente" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese nombre del Cliente</p>"></SELECT>
			                  		<div class="col-1"></div>
			                  		<button class="btn btn-icons btn-orenyi-2" data-toggle="modal" data-target="#add_cliente" id="mdl_add_cliente" data-whatever="@mdo"><i class="mdi mdi-account-plus"></i></button>
			                	</div>
		              		</div>
		              		<div class="form-group col-12" style="display:inline">
		              			<div class="row">
		              				<div class="form-group col-6" style="display:inline">
		              					<label>Télefono:</label>
		              					<input type="text" class="form-control" placeholder="Télefono" name="pedido_telefono" id="pedido_telefono">
		              				</div>
		              				<div class="form-group col-6" style="display:inline">
		              					<label>Dirección:</label>
		              					<input type="text" class="form-control" placeholder="Dirección" name="pedido_direccion" id="pedido_direccion">
		              				</div>
		              			</div>
		              		</div>
		              		<div class="form-group col-12" style="display:inline">
		                		<label>Agregar Platillo:</label>
		                		<div class="form-row">
			                  		<SELECT name="agregar_platillo" id="agregar_platillo" class="selectpicker form-control col-12" data-live-search="true" data-live-search-normalize="true" title="Agregar Platillo" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Seleccione tipo</p>">
			                  			<option value="0">Agregar Platillo</option>
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
		              		<div  class="table-responsive" style="padding-bottom: 15px;">
			                	<table id="tabla_pedidos" class="table table-bordered" cellspacing="0" width="100%">  
			                    	<thead>
			                      		<tr>
			                      			<th class="noExport"></th>
					                        <th class="noExport"></th>
					                        <th>Cant.</th>
					                        <th>Plantillo</th>
					                        <th>Subtotal</th>
			                      		</tr>
			                    	</thead>
			                    	<tbody id="tbody_pedidos">
			                      
			                    	</tbody>
				                    <tfoot>
				                    	<tr>
				                    		<th></th> 
				                        	<th></th>
				                        	<th></th>
				                        	<th>TOTAL</th>
				                        	<th id="campo_total"></th>
				                      	</tr>
				                    </tfoot>  
			                 	</table>   
			                </div>
			                <div class="form-group col-12" style="display:inline">
		                		<label>Detalles:</label>
		                		<textarea type="text" class="form-control"id="detalles_pedido"></textarea>
		              		</div>
		              	</div>
		            </div>
		        </div>
		    </div>
		    <div class="modal-footer">
		        <button class="btn btn-orenyi-1"  id="registrar_datos_pedido">Registrar</button>
		        <button  type="button" class="btn btn-danger" id="cancelar_registro_pedido">
		        	<i class="fa fa-times"></i>Cancelar
		        </button>
		    </div>
      	</div>
    </div>  			
</div>