<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>Romlex - Clientes</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
</head>

<body>
  <? include ("../includes/conexion.php"); ?>
  <div class="container-scroller">
    <!-- PANEL DE NAVEGACIÓN -->

    <? include('menus/navBar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- BARRA LATERAL -->
      <? include('menus/sideBar.php'); ?>
      <!-- partial --> 
      <div class="main-panel">
         <!-- CONTENIDO PRINCIPAL --> 
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="menu-icon fas fa-file-invoice-dollar"></i> 
                Presupuestos</h4><hr>
                  <div class="fluid-container">
                    <style type="text/css">
                      #iframe-tablas{
                        width: 100%;
                        height: 750px;
                        border: 0px none #ffffff;
                      }
                    </style>
                    <? include("php/add_presupuestos.php"); ?>
                    <? include("php/mod_presupuestos.php"); ?>
                    <? include("php/add_proyectos.php"); ?>
                    <button type="button" class="btn btn-romlex1" data-toggle="modal" data-target="#add_presupuesto" id="mdl_add_presupuesto" data-whatever="@mdo"><i class="fas fa-plus-circle"></i>&nbsp; Nuevo presupuesto</button>
                    <? include("php/tabla_presupuestos.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


  <? include("../includes/footer.php");?>