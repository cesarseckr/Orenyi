function tabla(nombre){ 
  var nom_arch=nombre;
  $('#tabla-1').DataTable({
    dom: 'Blfrtip',
    'bDestroy': true,
    buttons:[               
      {
        extend: 'colvis',
        text: 'Ocultar filas <i class="fa fa-chevron-down"></i>',
        title:  nom_arch
      }, 
      {
        extend: 'excelHtml5',
        text: '<i class="far fa-file-excel"></i>',
        title:  nom_arch,
        titleAttr: 'Exportar en EXCEL',
        exportOptions: {
          columns: "thead th:not(.noExport)"
        }, 
      },
      {
        extend: 'pdfHtml5',
        text: '<i class="far fa-file-pdf"></i>',
        titleAttr: 'Exportar en PDF',
        title:  nom_arch,
        //download: 'open',
        pageSize: 'A3',
        title:  nom_arch,
        exportOptions: {
          columns: "thead th:not(.noExport)"
        },    
      },
      {
        extend: 'print',
        text: '<i class="fa fa-print"></i>',
        title:  nom_arch,
        titleAttr: 'Imprimir'
      }
    ]
  });  
}