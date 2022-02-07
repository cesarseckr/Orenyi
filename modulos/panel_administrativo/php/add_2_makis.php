<div class="modal fade"  style="overflow-y: scroll;" id="add_2_makis" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      		<div class="modal-header">
        		<h5 id="titulo_2_makis" class="modal-title"></h5>
         		<button type="button" class="close" id="close_add_2_makis" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<form id="form-2makis" action="php/add_2_makisE.php" modal="add_2_makis" nombre_form="" method="post" enctype="multipart/form-data">
	      		<div class="modal-body">
			        <div class="form-row">
			          	<div class="form-group col-md-12">
			            	<div class="row">
			            		<div class="form-group col-12" style="display:none">
				                	<label>ID orden:</label>
				                	<input type="text" class="form-control" placeholder="ID orden" name="id_orden_2_makis" id="id_orden_2_makis">
				              	</div>
			            		<div class="form-group col-12" style="display:none">
			                		<label>Tipo platillo:</label>
			                		<input type="text" class="form-control" placeholder="Tipo producto" name="tipo_2_makis" id="tipo_2_makis">
			              		</div>
			              		<div class="form-group col-6" style="display:inline">
			                		<label>Seleccionar Platillo 1:</label>
			                		<div class="form-row">
				                  		<SELECT name="add_select_maki_1" id="add_select_maki_1" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione platillo" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese platillo</p>"></SELECT>
				                  		<div class="col-1"></div>
				                	</div>
			              		</div>
			              		<div class="form-group col-6" style="display:inline">
			                		<label>Seleccionar Platillo 2:</label>
			                		<div class="form-row">
				                  		<SELECT name="add_select_maki_2" id="add_select_maki_2" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione platillo" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese platillo</p>"></SELECT>
				                  		<div class="col-1"></div>
				                	</div>
			              		</div>
			              		<div class="form-group col-12" style="display:inline">
			                		<label>Detalles:</label>
			                		<textarea type="text" class="form-control" name="detalles_2_makis" id="detalles_2_makis"></textarea>
			                	</div>
			              	</div>
			            </div>
			        </div>
			    </div>
			    <div class="modal-footer">
			        <button class="btn btn-orenyi-1"  id="registrar_add_2_makis"><i class="fa fa-play-circle"></i>Registrar</button>
			        <button  type="button" class="btn btn-danger" id="cancelar_add_2_makis">
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
    form : '#form-2makis',
    errorMessageClass: "error",
    onSuccess: function(){
      add_orden_platillo("#form-2makis");
      $successMsg.show();
      return false; 
    }
  });
</script>