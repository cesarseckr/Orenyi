<div class="modal fade"  style="overflow-y: scroll;" id="add_combo" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
      		<div class="modal-header">
        		<h5 id="titulo_combo" class="modal-title"></h5>
         		<button type="button" class="close" id="close_add_combo" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<form id="form-combo" action="php/add_comboE.php" modal="add_combo" nombre_form="" method="post" enctype="multipart/form-data">
	      		<div class="modal-body">
			        <div class="form-row">
			          	<div class="form-group col-md-12">
			            	<div class="row">
			            		<div class="form-group col-12" style="display:none">
			                		<label>ID orden:</label>
			                		<input type="text" class="form-control" placeholder="ID orden" name="id_orden_combo" id="id_orden_combo">
			              		</div>
			            		<div class="form-group col-12" style="display:none">
			                		<label>Tipo platillo:</label>
			                		<input type="text" class="form-control" placeholder="Tipo platillo" id="tipo_combo">
			              		</div>
			              		<div class="form-group col-4" style="display:inline">
			                		<label>Seleccionar Platillo:</label>
			                		<div class="form-row">
				                  		<SELECT name="combo_select_platillo" id="combo_select_platillo" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione platillo" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese platillo</p>"></SELECT>
				                	</div>
			              		</div>
			              		<div class="form-group col-4" style="display:inline">
			                		<label>Seleccionar Kushiage:</label>
			                		<div class="form-row">
				                  		<SELECT name="combo_select_kushiage" id="combo_select_kushiage" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione kushiage" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese kushiage</p>"></SELECT>
				                	</div>
			              		</div>
			              		<div class="form-group col-4" style="display:inline">
			                		<label>Seleccionar Bebida:</label>
			                		<div class="form-row">
				                  		<SELECT name="combo_select_bebida" id="combo_select_bebida" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione bebida" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese bebida</p>"></SELECT>
				                	</div>
			              		</div>
			              		<div class="form-group col-12" style="display:inline">
			                		<label>Detalles:</label>
			                		<textarea type="text" class="form-control" name="combo_detalles" id="combo_detalles"></textarea>
			                	</div>
			              	</div>
			            </div>
			        </div>
			    </div>
			    <div class="modal-footer">
			        <button class="btn btn-orenyi-1"  id="registrar_add_combo"><i class="fa fa-play-circle"></i>Registrar</button>
			        <button  type="button" class="btn btn-danger" id="cancelar_add_combo">
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
    form : '#form-combo',
    errorMessageClass: "error",
    onSuccess: function(){
      add_orden_platillo("#form-combo");
      $successMsg.show();
      return false; 
    }
  });
</script>