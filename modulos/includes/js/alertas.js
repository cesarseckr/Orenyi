function alerta_error(titulo,mensaje){ 
Swal.fire({
  position: 'center',
  type: 'error',
  title: titulo,
   html: mensaje,
  showConfirmButton: false,
  timer: 500
})
}

function alerta_correcto(titulo,mensaje){ 
Swal.fire({
  position: 'center',
  type: 'success',
  title: titulo,
  html: mensaje,
  showConfirmButton: false,
  timer: 500
})
}

function alerta_info(titulo,mensaje){ 
Swal.fire({
  position: 'center',
  type: 'info',
  title: titulo,
   html: mensaje,
  showConfirmButton: false,
  timer: 500
})
}

  function alerta_confirmacion(titulo,mensaje, mensaje_ok,mensaje_no,listado, id, ruta){ 
    Swal.fire({
      title: titulo,
      text: mensaje,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#424964',
      cancelButtonColor: '#d33',
      confirmButtonText: "Confirmar",
      cancelButtonText: "Anular"
    }).then((result) => {
      if (result.value) {
        $ .ajax({
          url: ruta,
          method:"POST",
          data:{id_m: id},
          success: function(data){
            if(data=="OK"){
              alerta_correcto("Correcto",mensaje_ok); 
              $("#menu-sidebar").load(" #menu-sidebar");
              $("#menu-navbar").load(" #menu-navbar");
              $("#tabla").load(" #tabla", function() {
                tabla(listado);
              });
            }else{
              alerta_error("Error",mensaje_no); 
            }
          }
        })
      }
    })
  }