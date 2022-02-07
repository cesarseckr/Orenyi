<div class="modal fade" id="mod_clientes" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="mdi mdi-account-plus"></i>&nbsp; Modificar datos de cliente
        </h5>
        <button type="button" class="close" id="close_mod_cliente" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="form-cliente-mod" action="php/mod_clientesE.php" modal="mod_clientes" nombre_form="Clientes" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <div class="row">
              
                <div class="form-group col-sm-12" style="display:none;">
                  <label>ID:</label>
                  <input type="text" class="form-control" name="id_cliente" id="id_cliente">
                </div>
                <div class="form-group col-sm-4">
                  <label>Apellido Paterno:</label>
                  <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaterno_mod" id="apaterno_mod" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Paterno</p>">
                </div>
                <div class="form-group col-sm-4">
                  <label>Apellido Materno:</label>
                  <input type="text" class="form-control" placeholder="Apellido Materno" name="amaterno_mod" id="amaterno_mod">
                </div>
                <div class="form-group col-sm-4">
                  <label>Nombre(s):</label>
                  <input type="text" class="form-control" placeholder="Nombre(s)" name="nombre_mod" id="nombre_mod" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Nombre</p>">
                </div>
                <div class="form-group col-sm-4">
                  <label>Telefono:</label>
                  <input type="text" class="form-control" placeholder="telefono" name="telefono_mod" id="telefono_mod" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese un Telefono</p>">
                </div>
                <div class="form-group col-sm-4">
                  <label>Dirección:</label>
                  <input type="text" class="form-control" placeholder="Dirección" name="direccion_mod" id="direccion_mod">
                </div>
                <div class="form-group col-4">
                    <label>Genero:</label>
                    <SELECT class="form-control col-12" name="sexo_mod" id="sexo_mod">
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
          <button class="btn btn-primary btn-sm">
            <i class="fa fa-play-circle"></i>Registrar
          </button>
          <button type="reset" class="btn btn-secondary btn-sm">
            <i class="fa fa-eraser"></i>
          </button>
          <button type="button" class="btn btn-danger" id="cancelar_mod_cliente">
            <i class="fa fa-times"></i>Cerrar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#cancelar_mod_cliente',function(){
    $('#mod_clientes').modal('toggle'); 
  })
  $(document).on('click', '#close_mod_cliente',function(){
    $('#mod_clientes').modal('toggle'); 
  })
</script>

<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-cliente-mod',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-cliente-mod");
      $successMsg.show();
      return false; 
    }
  });
</script>