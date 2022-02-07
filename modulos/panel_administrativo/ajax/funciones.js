$(document).ready(function(){
  llenar_select_clientes();
})

function add(id){
  var form=id;
  var datos = new FormData($(form)[0]);
  var action= $(form).attr("action");
  var enctype= $(form).attr("enctype");
  var method= $(form).attr("method");
  var nombre_form= $(form).attr("nombre_form");
  var modal= $(form).attr("modal");
  $.ajax({
    url: action,
    enctype: enctype,
    type: method,
    processData: false,
    contentType: false,
    data: datos,
    success: function (data) {
      if (data==1) {
        alerta_correcto("Correcto",
          "Consulta asignada correctamente");
        $("#tabla").load(" #tabla", function(){
          tabla("Listado de "+nombre_form);
        });
        $('#'+modal).modal('toggle');
        limpiar_formulario(form);
        llenar_select_clientes();
      }else {
        //alert(data);
        alerta_error("Error",
          "A ocurrido un error al tratar de registrar");
        console.log("Errors: "+data);
      }
    }
  });
}

function add_orden(id){
  var form=id;
  var datos = new FormData($(form)[0]);
  var action= $(form).attr("action");
  var enctype= $(form).attr("enctype");
  var method= $(form).attr("method");
  var nombre_form= $(form).attr("nombre_form");
  var modal= $(form).attr("modal");
  var id_orden= $('#id_orden').val();
  var campo_total= $('#campo_total').html();
  alert($("#select_cliente option:selected").val());
  id_cliente=$("#select_cliente option:selected").val();
  if (id_cliente>=1) {
    $.ajax({
      url: action,
      enctype: enctype,
      type: method,
      processData: false,
      contentType: false,
      data: datos,
      success: function (data) {
        if (data==1) {
          $ .ajax({
            url: 'php/add_totalE.php',
            method:"POST",
            data:{id_orden: id_orden,
                  campo_total: campo_total},
            success: function(data){
              if (data==1) {
                alerta_correcto("Correcto",
                  "Consulta asignada correctamente");
                $("#tabla").load(" #tabla", function(){
                  tabla("Listado de "+nombre_form);
                });
                $('#'+modal).modal('toggle');
                limpiar_formulario(form);
                llenar_select_clientes();
              }else {
                //alert(data);
                alerta_error("Error",
                  "A ocurrido un error al tratar de registrar");
                console.log("Errors: "+data);
              }
            }
          })
        }else {
          //alert(data);
          alerta_error("Error",
            "A ocurrido un error al tratar de registrar");
          console.log("Errors: "+data);
        }
      }
    });  
  }else{
    alert('este pedo no jala')
  }
  
}

function add_orden_platillo(id){
  var form=id;
  var datos = new FormData($(form)[0]);
  var action= $(form).attr("action");
  var enctype= $(form).attr("enctype");
  var method= $(form).attr("method");
  var nombre_form= $(form).attr("nombre_form");
  var modal= $(form).attr("modal");
  var id_orden= $('#id_orden').val();
  $.ajax({
    url: action,
    enctype: enctype,
    type: method,
    processData: false,
    contentType: false,
    data: datos,
    /*data:{campo_total:campo_total},*/
    success: function (data) {
      if (data==1) {
        alerta_correcto("Correcto",
          "Consulta asignada correctamente");
        actualizar_tabla_orden(id_orden);
        $('#'+modal).modal('toggle');
        limpiar_fomulario_platillos();     
      }else {
        //alert(data);
        alerta_error("Error",
          "A ocurrido un error al tratar de registrar");
        console.log("Errors: "+data);
      }
    }
  });
}

function limpiar_formulario(form){
  $(form).trigger("reset");
}

function limpiar_formulario_orden(){
  $("#agregar_platillo").val('0');
  $("#agregar_platillo").selectpicker("refresh");
  $("#agregar_tipo_orden").val('0');
  $("#agregar_tipo_orden").selectpicker("refresh");
  $('#id_orden').val('');
  $('#orden_telefono').val('');
  $('#orden_direccion').val('');
  $('#plat_cant').val('');
  $('#detalles_orden').val('');
  llenar_select_clientes();
}

function limpiar_fomulario_platillos(){
  $('#add_cant_platillo').val('');
  $('#add_total_platillo').val('');
  $('#add_select_domicilio').val('1');
  $("#add_select_domicilio").selectpicker("refresh")
  $("#agregar_platillo").val('0');
  $("#agregar_platillo").selectpicker("refresh");
  $('#platillo_detalles').val('');
  $('#detalles_2_makis').val('');
  $('#combo_detalles').val('');
}

function reiniciar_select_cant(){
  $("#add_cant_platillo").val('1');
  $("#add_cant_platillo").selectpicker("refresh");
}

function llenar_select_clientes(){
  $.ajax({
    url:"php/cargar_clientes.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#select_cliente').empty();
      $('#mod_select_cliente').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          $("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
        }
        $('#select_cliente').selectpicker('refresh');
        $('#mod_select_cliente').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
}

function llenar_select_platillo(tipo_platillo){
  if(tipo_platillo=='1'){
    $.ajax({
      url:"php/cargar_makis_clasico.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#add_select_platillo').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#add_select_platillo").append('<option value="'+data[i].id_maki_clasico+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#add_select_platillo').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  }else if (tipo_platillo=='2'){
    $.ajax({
      url:"php/cargar_makis_especial.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#add_select_platillo').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#add_select_platillo").append('<option value="'+data[i].id_maki_especial+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#add_select_platillo').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  }else if (tipo_platillo=='3'){
    $.ajax({
      url:"php/cargar_kushiages.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#add_select_platillo').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#add_select_platillo").append('<option value="'+data[i].id_kushiage+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#add_select_platillo').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  }else if (tipo_platillo=='4'){
    $.ajax({
      url:"php/cargar_bebida.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#add_select_platillo').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#add_select_platillo").append('<option value="'+data[i].id_bebida+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#add_select_platillo').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  }else if (tipo_platillo=='5'){
    $.ajax({
      url:"php/cargar_makis_clasico.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#add_select_maki_1').empty();
        $('#add_select_maki_2').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#add_select_maki_1").append('<option value="'+data[i].id_maki_clasico+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            $("#add_select_maki_2").append('<option value="'+data[i].id_maki_clasico+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#add_select_maki_1').selectpicker('refresh');
          $('#add_select_maki_2').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  }else if (tipo_platillo=='6'){
    $.ajax({
      url:"php/cargar_makis_especial.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#add_select_maki_1').empty();
        $('#add_select_maki_2').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#add_select_maki_1").append('<option value="'+data[i].id_maki_especial+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            $("#add_select_maki_2").append('<option value="'+data[i].id_maki_especial+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#add_select_maki_1').selectpicker('refresh');
          $('#add_select_maki_2').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  }else if (tipo_platillo=='7'){
    $.ajax({
      url:"php/cargar_makis_clasico.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#combo_select_platillo').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#combo_select_platillo").append('<option value="'+data[i].id_maki_clasico+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#combo_select_platillo').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
    $.ajax({
      url:"php/cargar_kushiages.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#combo_select_kushiage').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#combo_select_kushiage").append('<option value="'+data[i].id_kushiage+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#combo_select_kushiage').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
    $.ajax({
      url:"php/cargar_bebida.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        $('#combo_select_bebida').empty();
        //$('#mod_select_cliente').empty();
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#combo_select_bebida").append('<option value="'+data[i].id_bebida+'" precio="'+data[i].precio+'">'+data[i].nombre+'</option>');
            //$("#mod_select_cliente").append('<option value="'+data[i].id_cliente+'">'+data[i].nombre+'</option>');
          }
          $('#combo_select_bebida').selectpicker('refresh');
          //$('#mod_select_cliente').selectpicker('refresh');
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  }
}

function calcular_precio_platillo(){
  var total=$("#add_cant_platillo").val()*$("#add_select_platillo option:selected").attr('precio');
  $("#add_total_platillo").val(total);
}

function calcular_total_ordenes(id_orden){
  $.ajax({
    url:"php/calcular_total_ordenes.php",
    type:"POST",
    data:{id_orden:id_orden},
    success: function(data){
      $('#campo_total').html(data);
    }
  })
}

/*--- FUNCIONES PARA SECCION CLIENTE ---*/
  //MODIFICAR CLIENTE
    $(document).on('click', '#modificar_cliente',function(){
      $("#id_cliente").val($(this).attr('btn-id_cliente'));
      $("#apaterno_mod").val($(this).attr('btn-apaterno'));
      $("#amaterno_mod").val($(this).attr('btn-amaterno'));
      $("#nombre_mod").val($(this).attr('btn-nombre'));
      $("#telefono_mod").val($(this).attr('btn-telefono'));
      $("#direccion_mod").val($(this).attr('btn-direccion'));
      $("#email_mod").val($(this).attr('btn-email'));
      //$("#sexo_mod").val($(this).attr('btn-genero'));
      document.getElementById("sexo_mod").value = $(this).attr('btn-genero');
    });

  //ELIMINAR CLIENTE
    $(document).on('click', '#del_cliente',function(){
      var id_cliente=$(this).attr('btn-id_cliente');
      Swal.fire({
        title: '¿Seguro que desea eliminar este presupuesto?',
        text: 'Todos los datos registrados para este presupuesto seran eliminados.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#424964',
        cancelButtonColor: '#d33',
        confirmButtonText: "Confirmar",
        cancelButtonText: "Anular"
      }).then((result) => {
        if (result.value){
          $.ajax({
            url:"php/del_cliente.php",
            method:"POST",
            data:{id_cliente:id_cliente},
            success: function(data){
              if(data=="1"){
                alerta_correcto("Correcto","Datos del cliente eliminados correctamente"); 
                $("#menu-sidebar").load(" #menu-sidebar");
                $("#menu-navbar").load(" #menu-navbar");
                $("#tabla").load(" #tabla", function() {
                  tabla("Listado de Clientes");
                });
              }else{
                alerta_error("Error",mensaje_no); 
              }
            }
          })
        }
      }) 
    });
/*--- FUNCIONES PARA SECCION CLIENTE ---*/

/*--- FUNCIONES PARA SECCION ORDENES ---*/
  //Actualizar tabla Orden
  function actualizar_tabla_orden(id_orden){
    $.ajax({
      url:"php/cargar_tabla_ordenes.php",
      type:"POST",
      data:{id_orden:id_orden},
      success: function(data){
        $('#tbody_ordenes').html(data);
        calcular_total_ordenes(id_orden);
      }
    })
  }
  
  //Crear id de nuevo Orden
    $(document).on('click','#mdl_add_orden', function(){
      $.ajax({
        url:"php/add_idordenE.php",
        method:"POST",
        success: function(data){
          $("#id_orden").val(data);
        }
      });
      limpiar_formulario_orden();
    })
  //Change Select Cliente
    $(document).on('change','#select_cliente', function(){
      var id_cliente=$("#select_cliente option:selected").val();
      alert($("#select_cliente option:selected").val());
      $.ajax({
        url:"php/cargar_datos_clienteE.php",
        method:"POST",
        data:{id_cliente:id_cliente},
        dataType: 'json',
        success: function(data){
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#orden_telefono").val(data[i].telefono);
              $("#orden_direccion").val(data[i].direccion); 
            }
          }
        }
      });
    });
  //Cancelar registro orden
    $(document).on('click', '#cancelar_registro_orden',function(){
      var id_orden= $('#id_orden').val();
      Swal.fire({
        title: '¿Seguro que desea cancelar esta acción?',
        text: 'Todos los datos registrados para este orden seran eliminados.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#424964',
        cancelButtonColor: '#d33',
        confirmButtonText: "Confirmar",
        cancelButtonText: "Anular"
      }).then((result) => {
        if (result.value) {
          $ .ajax({
            url: 'php/del_ordenes.php',
            method:"POST",
            data:{id_orden: id_orden},
            success: function(data){
              if(data==1){
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: 'Correcto.',
                  html: 'orden cancelado correctamente',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_orden').modal('toggle');
                limpiar_formulario_orden();
                //limpiar_tabla_orden();
              }else{
                Swal.fire({
                  position: 'center',
                  type: 'error',
                  title: 'Error.',
                  html: 'A ocurrido un error, contacte al administrador del sistema',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_orden').modal('toggle');
              }
            }
          })
        }
      })
    })
    $(document).on('click', '#close_registro_orden',function(){
      var id_orden= $('#id_orden').val();
      Swal.fire({
        title: '¿Seguro que desea cancelar esta acción?',
        text: 'Todos los datos registrados para este orden seran eliminados.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#424964',
        cancelButtonColor: '#d33',
        confirmButtonText: "Confirmar",
        cancelButtonText: "Anular"
      }).then((result) => {
        if (result.value) {
          $ .ajax({
            url: 'php/del_ordenes.php',
            method:"POST",
            data:{id_orden: id_orden},
            success: function(data){
              if(data==1){
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: 'Correcto.',
                  html: 'orden cancelado correctamente',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_orden').modal('toggle');
                limpiar_formulario_orden();
                //limpiar_tabla_orden();
              }else{
                Swal.fire({
                  position: 'center',
                  type: 'error',
                  title: 'Error.',
                  html: 'A ocurrido un error, contacte al administrador del sistema',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_orden').modal('toggle'); 
              }
            }
          })
        }
      })
    })
  //Agregar platillo
    $(document).on('change','#agregar_platillo', function(){
      var tipo_platillo=$("#agregar_platillo option:selected").val();
      $("#id_orden_platillo").val($("#id_orden").val());
      $("#id_orden_2_makis").val($("#id_orden").val());
      $("#id_orden_combo").val($("#id_orden").val());
      $("#id_orden_domicilio").val($("#id_orden").val());
      if (tipo_platillo=='1') {
        var titulo="Agregar Maki Clásico";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
        reiniciar_select_cant();
      }else if (tipo_platillo=='2') {
        var titulo="Agregar Maki Especial";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
        reiniciar_select_cant();
      }else if (tipo_platillo=='3') {
        var titulo="Agregar Kushiage";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
        reiniciar_select_cant();
      }else if (tipo_platillo=='4') {
        var titulo="Agregar Bebida";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
        reiniciar_select_cant();
      }else if (tipo_platillo=='5') {
        var titulo="Agregar 2 makis clásicos";
        $('#titulo_2_makis').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_2_makis').val(tipo_platillo);
        $('#add_2_makis').modal('toggle');
        llenar_select_platillo(tipo_platillo);
      }else if (tipo_platillo=='6') {
        var titulo="Agregar 2 makis especiales";
        $('#titulo_2_makis').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_2_makis').val(tipo_platillo);
        $('#add_2_makis').modal('toggle');
        llenar_select_platillo(tipo_platillo);
      }else if (tipo_platillo=='7') {
        var titulo="Agregar Combo Orenyi";
        $('#titulo_combo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_combo').val(tipo_platillo);
        $('#add_combo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
      }
    })
  //Agregar tipo Servicio
    $(document).on('change','#agregar_tipo_orden', function(){
      $("#id_orden_platillo").val($("#id_orden").val());
      var tipo_orden=$("#agregar_tipo_orden option:selected").val();
      var id_orden=$("#id_orden").val();
      $("#id_orden_domicilio").val($("#id_orden").val());
      if (tipo_orden=='1') {
        $ .ajax({
          url: 'php/del_servicio_domicilio.php',
          method:"POST",
          data:{id_orden: id_orden},
          success: function(data){
            actualizar_tabla_orden(id_orden);
          }
        })
      }else if (tipo_orden=='2') {
        var titulo="Agregar Servicio a domicilio";
        $('#titulo_domicilio').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_domicilio').val(tipo_orden);
        $('#add_domicilio').modal('toggle');
      }
    })
  //LLenar campo precio platillo
    $(document).on('change','#add_cant_platillo', function(){
      calcular_precio_platillo();
    })
    $(document).on('change','#add_select_platillo', function(){
      calcular_precio_platillo();
    })
  //Cancelar platillo
    $(document).on('click', '#close_add_platillo',function(){
      $('#add_platillo').modal('toggle');
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#cancelar_add_platillo',function(){
      $('#add_platillo').modal('toggle');      
      limpiar_fomulario_platillos();
      reiniciar_select_cant();
    })
    $(document).on('click', '#close_add_2_makis',function(){
      $('#add_2_makis').modal('toggle');
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#cancelar_add_2_makis',function(){
      $('#add_2_makis').modal('toggle');      
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#close_add_combo',function(){
      $('#add_combo').modal('toggle');
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#cancelar_add_combo',function(){
      $('#add_combo').modal('toggle');      
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#close_add_domicilio',function(){
      $('#add_domicilio').modal('toggle');      
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#cancelar_add_domicilio',function(){
      $('#add_domicilio').modal('toggle');      
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#del_contenido_orden',function(){
      var id_orden= $(this).attr('id_orden'); 
      var id_contenido_orden= $(this).attr('id_contenido_orden'); 
      /*$.ajax({
        url:"php/del_contenido_ordenes.php",
        type:"POST",
        data:{id_contenido_orden:id_contenido_orden},
        success: function(data){
          actualizar_tabla_orden(id_orden); 
        }
      })*/
      Swal.fire({
        title: '¿Seguro que desea eliminar este platillo de la orden?',
        text: 'Todos los datos registrados seran eliminados.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#424964',
        cancelButtonColor: '#d33',
        confirmButtonText: "Confirmar",
        cancelButtonText: "Anular"
      }).then((result) => {
        if (result.value){
          $.ajax({
            url:"php/del_contenido_ordenes.php",
            type:"POST",
            data:{id_contenido_orden:id_contenido_orden},
            success: function(data){
              if(data==1){
                alerta_correcto("Correcto","Datos del cliente eliminados correctamente"); 
                actualizar_tabla_orden(id_orden);
              }else{
                alerta_error("Error",mensaje_no); 
              }
            }
          })
        }
      })
    })
  //Registrar Datos Platillo

/*--- FUNCIONES PARA SECCION ordeneS ---*/