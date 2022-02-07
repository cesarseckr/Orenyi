<div class="modal fade"  style="overflow-y: scroll;" id="add_cliente" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="mdi mdi-account-plus"></i>&nbsp; Registro de nuevo cliente
        </h5>
        <button type="button" class="close" id="close_registro_cliente" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form id="form-cliente" action="php/add_clientesE.php" modal="add_cliente" nombre_form="Clientes" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
                <div class="row">
                  <div class="form-group col-sm-4">
                    <label>Apellido Paterno:</label>
                    <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaterno" id="apaterno" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Paterno</p>">
                  </div>
                  
                  <div class="form-group col-sm-4">
                    <label>Apellido Materno:</label>
                    <input type="text" class="form-control" placeholder="Apellido Materno" name="amaterno" id="amaterno">
                  </div>
                  
                  <div class="form-group col-sm-4">
                    <label>Nombre(s):</label>
                    <input type="text" class="form-control" placeholder="Nombre(s)" name="nombre" id="nombre" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Nombre</p>">
                  </div>
                  
                  <div class="form-group col-sm-4">
                    <label>Telefono:</label>
                    <input type="text" class="form-control" placeholder="telefono" name="telefono" id="telefono" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese un Telefono</p>">
                  </div>
                  
                  <div class="form-group col-sm-4">
                    <label>Direccion:</label>
                    <input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion">
                  </div>
                  <div class="form-group col-4">
                    <label>Genero:</label>
                    <SELECT class="form-control col-12" name="sexo" id="sexo">
                      <option value="1">Mujer</option>
                      <option value="2">Hombre</option>
                      <option value="3">Indefinido</option>                  
                    </SELECT>
                </div>
              </div>
            </div>   
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-orenyi-1 btn-sm">
            <i class="fa fa-play-circle"></i>Registrar
          </button>
          <button type="reset" class="btn btn-secondary btn-sm">
            <i class="fa fa-eraser"></i>
          </button>
          <button  type="button" class="btn btn-danger" id="cancelar_registro_cliente">
            <i class="fa fa-times"></i>Cerrar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#cancelar_registro_cliente',function(){
    $('#add_cliente').modal('toggle'); 
  })
  $(document).on('click', '#close_registro_cliente',function(){
    $('#add_cliente').modal('toggle'); 
  })
</script>

<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-cliente',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-cliente");
      $successMsg.show();
      return false; 
    }
  });
</script>