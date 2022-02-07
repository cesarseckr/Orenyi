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
      if (data=="1") {
        alerta_correcto("Correcto",
          "Consulta asignada correctamente");
        $("#tabla").load(" #tabla", function(){
          tabla("Listado de "+nombre_form);
        });
        $('#'+modal).modal('toggle');
        limpiar_formulario(form);
        llenar_select_clientes();
      }else {
        alerta_error("Error",
          "A ocurrido un error al tratar de registrar");
        console.log("Error: "+data);
      }
    }
  });
}

function limpiar_formulario(form){
  $(form).trigger("reset");
}

function limpiar_formulario_pedido(){
  $('#id_pedido').val('');
  $('#pedido_telefono').val('');
  $('#pedido_direccion').val('');
  $('#plat_cant').val('');
  $('#detalles_pedido').val('');
  llenar_select_clientes();
}

function limpiar_fomulario_platillos(){
  $('#add_cant_platillo').val('');
  $('#add_precio_platillo').val('');
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

/*--- FUNCIONES PARA SECCION PEDIDOS ---*/

  //Crear id de nuevo pedido
    $(document).on('click','#mdl_add_pedido', function(){
      $.ajax({
        url:"php/add_idpedidoE.php",
        method:"POST",
        success: function(data){
          $("#id_pedido").val(data);
        }
      });
      limpiar_formulario_pedido();
    })
  //Change Select Cliente
    $(document).on('change','#select_cliente', function(){
      var id_cliente=$("#select_cliente option:selected").val();
      $.ajax({
        url:"php/cargar_datos_clienteE.php",
        method:"POST",
        data:{id_cliente:id_cliente},
        dataType: 'json',
        success: function(data){
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#pedido_telefono").val(data[i].telefono);
              $("#pedido_direccion").val(data[i].direccion); 
            }
          }
        }
      });
    });
  //Cancelar registro pedido
    $(document).on('click', '#cancelar_registro_pedido',function(){
      var id_pedido= $('#id_pedido').val();
      Swal.fire({
        title: '¿Seguro que desea cancelar esta acción?',
        text: 'Todos los datos registrados para este pedido seran eliminados.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#424964',
        cancelButtonColor: '#d33',
        confirmButtonText: "Confirmar",
        cancelButtonText: "Anular"
      }).then((result) => {
        if (result.value) {
          $ .ajax({
            url: 'php/del_pedidos.php',
            method:"POST",
            data:{id_pedido: id_pedido},
            success: function(data){
              if(data==1){
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: 'Correcto.',
                  html: 'Pedido cancelado correctamente',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_pedido').modal('toggle');
                limpiar_formulario_pedido();
                //limpiar_tabla_pedido();
              }else{
                Swal.fire({
                  position: 'center',
                  type: 'error',
                  title: 'Error.',
                  html: 'A ocurrido un error, contacte al administrador del sistema',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_pedido').modal('toggle');
              }
            }
          })
        }
      })
    })
    $(document).on('click', '#close_registro_pedido',function(){
      var id_pedido= $('#id_pedido').val();
      Swal.fire({
        title: '¿Seguro que desea cancelar esta acción?',
        text: 'Todos los datos registrados para este pedido seran eliminados.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#424964',
        cancelButtonColor: '#d33',
        confirmButtonText: "Confirmar",
        cancelButtonText: "Anular"
      }).then((result) => {
        if (result.value) {
          $ .ajax({
            url: 'php/del_pedidos.php',
            method:"POST",
            data:{id_pedido: id_pedido},
            success: function(data){
              if(data==1){
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: 'Correcto.',
                  html: 'Pedido cancelado correctamente',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_pedido').modal('toggle');
                limpiar_formulario_pedido();
                //limpiar_tabla_pedido();
              }else{
                Swal.fire({
                  position: 'center',
                  type: 'error',
                  title: 'Error.',
                  html: 'A ocurrido un error, contacte al administrador del sistema',
                  showConfirmButton: false,
                  timer: 2000
                })
                $('#add_pedido').modal('toggle'); 
              }
            }
          })
        }
      })
    })
  //Agregar platillo
    $(document).on('change','#agregar_platillo', function(){
      var tipo_platillo=$("#agregar_platillo option:selected").val();
      if (tipo_platillo=='1') {
        var titulo="Agregar Maki Clásico";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
      }else if (tipo_platillo=='2') {
        var titulo="Agregar Maki Especial";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
      }else if (tipo_platillo=='3') {
        var titulo="Agregar Kushiage";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
      }else if (tipo_platillo=='4') {
        var titulo="Agregar Bebida";
        $('#titulo_platillo').html('<i class="fas fa-utensils"></i>&nbsp;'+titulo);
        $('#tipo_platillo').val(tipo_platillo);
        $('#add_platillo').modal('toggle');
        llenar_select_platillo(tipo_platillo);
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
  //LLenar campo precio platillo
    $(document).on('change','#add_select_platillo', function(){
      $("#add_precio_platillo").val($("#add_select_platillo option:selected").attr('precio'));
    })
  //Cancelar platillo
    $(document).on('click', '#close_add_platillo',function(){
      $('#add_platillo').modal('toggle');
      limpiar_fomulario_platillos();
    })
    $(document).on('click', '#cancelar_add_platillo',function(){
      $('#add_platillo').modal('toggle');      
      limpiar_fomulario_platillos();
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
  //Registrar Datos Platillo
    $(document).on('click', '#registrar_add_platillo',function(){
      var tipo_platillo = $('#tipo_platillo').val();
      var id_pedido = $('#id_pedido').val();
      var id_platillo= $('#add_select_platillo').val();
      var cant_platillo= $('#add_cant_platillo').val();
      var platillo_comentarios= $('#platillo_comentarios').val();
      alert("Tipo platillo: "+tipo_platillo+" Id pedido: "+ id_pedido);
      $.ajax({
        url:"php/add_platilloE.php",
        type:"POST",
        data:{tipo_platillo:tipo_platillo,
              id_pedido:id_pedido,
              id_platillo:id_platillo,
              cant_platillo:cant_platillo,
              platillo_comentarios:platillo_comentarios},
        success:function(data){
          alert(data);
          /*if (data==1) {
            alerta_correcto("Correcto",
              "Platillo asignado correctamente");
            $.ajax({
              url:"php/cargar_diagnosticos.php",
              method:"POST",
              dataType: 'json',
              success: function(data){
                $('#ins_diagnostico').empty();
                var array=Array.isArray(data);
                if(array==true){
                  for(var i=0; i < data.length; i++){
                    $("#ins_diagnostico").append('<option value="'+data[i].id_lista_diagnosticos+'">'+data[i].nombre+'</option>');
                  }
                  $('#ins_diagnostico').selectpicker('refresh');
                }
              },error: function (jqXHR, textStatus, errorThrown) {
                console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
              }
            })
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar este diagnostico");
            console.log("Error: "+data);
          }*/
        },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
      })  
    })
/*--- FUNCIONES PARA SECCION PEDIDOS ---*/
