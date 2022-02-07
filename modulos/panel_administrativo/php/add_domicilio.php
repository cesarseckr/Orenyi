<div class="modal fade"  style="overflow-y: scroll;" id="add_domicilio" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      		<div class="modal-header">
        		<h5 id="titulo_domicilio" class="modal-title"></h5>
         		<button type="button" class="close" id="close_add_domicilio" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<form id="form-domicilio" action="php/add_domicilioE.php" modal="add_domicilio" nombre_form="" method="post" enctype="multipart/form-data">
	      		<div class="modal-body">
			        <div class="form-row">
			          	<div class="form-group col-md-12">
			            	<div class="row">
			            		<div class="form-group col-12" style="display:none">
				                	<label>ID orden:</label>
				                	<input type="text" class="form-control" placeholder="ID orden" name="id_orden_domicilio" id="id_orden_domicilio">
				              	</div>
			            		<div class="form-group col-12" style="display:none">
			                		<label>Tipo platillo:</label>
			                		<input type="text" class="form-control" placeholder="Tipo producto" name="tipo_domicilio" id="tipo_domicilio">
			              		</div>
			              		<div class="form-group col-12" style="display:inline">
			                		<label>Tipo de servicio a domicilio:</label>
			                		<div class="form-row">
				                  		<SELECT name="add_select_domicilio" id="add_select_domicilio" class="selectpicker form-control col-12" data-live-search="true" data-live-search-normalize="true" title="Seleccione tipo domicilio" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese platillo</p>">
					                  		<option value="1" selected>5</option>
				                			<option value="2">10</option>
				                			<option value="3">15</option>
				                			<option value="4">20</option>
				                  		</SELECT>
				                	</div>
			              		</div>			              		
			              	</div>
			            </div>
			        </div>
			    </div>
			    <div class="modal-footer">
			        <button class="btn btn-orenyi-1"  id="registrar_add_domicilio"><i class="fa fa-play-circle"></i>Registrar</button>
			        <button  type="button" class="btn btn-danger" id="cancelar_add_domicilio">
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
    form : '#form-domicilio',
    errorMessageClass: "error",
    onSuccess: function(){
      add_orden_platillo("#form-domicilio");
      $successMsg.show();
      return false; 
    }
  });
</script>