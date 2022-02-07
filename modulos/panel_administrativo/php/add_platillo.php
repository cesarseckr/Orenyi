<div class="modal fade"  style="overflow-y: scroll;" id="add_platillo" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      		<div class="modal-header">
        		<h5 id="titulo_platillo" class="modal-title"></h5>
         		<button type="button" class="close" id="close_add_platillo" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<form id="form-platillo" action="php/add_platilloE.php" modal="add_platillo" nombre_form="" method="post" enctype="multipart/form-data">
	      		<div class="modal-body">
			        <div class="form-row">
			          	<div class="form-group col-md-12">
			            	<div class="row">
			            		<div class="form-group col-12" style="display:none">
			                		<label>ID orden:</label>
			                		<input type="text" class="form-control" placeholder="ID orden" name="id_orden_platillo" id="id_orden_platillo">
			              		</div>
			              		<div class="form-group col-12" style="display:none">
			                		<label>Tipo platillo:</label>
			                		<input type="text" class="form-control" placeholder="Tipo platillo" name="tipo_platillo" id="tipo_platillo">
			              		</div>
			              		<div class="form-group col-2" style="display:inline">
			                		<label>Cant:</label>
			                		<SELECT name="add_cant_platillo" id="add_cant_platillo" class="selectpicker form-control col-12" data-validation="required" data-validation-error-msg="<p 
			                		style='color:#B40431;'>Ingrese una cantidad valida por favor</p>">
			                			<option value="1" selected>1</option>
			                			<option value="2">2</option>
			                			<option value="3">3</option>
			                			<option value="4">4</option>
			                			<option value="5">5</option>
			                			<option value="6">6</option>
			                			<option value="7">7</option>
			                			<option value="8">8</option>
			                			<option value="9">9</option>
			                			<option value="10">10</option>
			                		</SELECT>
			              		</div>
			              		<div class="form-group col-8" style="display:inline">
			                		<label>Seleccionar Platillo:</label>
			                		<div class="form-row">
				                  		<SELECT name="add_select_platillo" id="add_select_platillo" class="selectpicker form-control col-12" data-live-search="true" data-live-search-normalize="true" title="Seleccione platillo" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese platillo</p>"></SELECT>
				                  		<div class="col-1"></div>
				                	</div>
			              		</div>
			              		<div class="form-group col-2" style="display:inline">
			              			<label>Total:</label>
			                		<input type="text" class="form-control" placeholder="Total" name="add_total_platillo" id="add_total_platillo">
			              		</div>
			              		<div class="form-group col-12" style="display:inline">
			                		<label>Detalles:</label>
			                		<textarea type="text" class="form-control" name="platillo_detalles" id="platillo_detalles"></textarea>
			                	</div>
			              	</div>
			            </div>
			        </div>
			    </div>
			    <div class="modal-footer">
			        <button class="btn btn-orenyi-1 btn-sm" id="registrar_add_platillo">
			        	<i class="fa fa-play-circle"></i>Registrar
			        </button>
			        <button  type="button" class="btn btn-danger" id="cancelar_add_platillo">
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
    form : '#form-platillo',
    errorMessageClass: "error",
    onSuccess: function(){
      add_orden_platillo("#form-platillo");
      $successMsg.show();
      return false; 
    }
  });
</script>