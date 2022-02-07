<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>Orenyi - Clientes</title>
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
                <div class="card-body"><h4 class="card-title"><i class="menu-icon mdi mdi-account-multiple"></i> Clientes</h4><hr>
                  <div class="fluid-container">
                    <style type="text/css">
                      #iframe-tablas{
                        width: 100%;
                        height: 750px;
                        border: 0px none #ffffff;
                      }
                    </style>
                    <? include("php/add_clientes.php"); ?>
                    <? include("php/mod_clientes.php"); ?>
                    <button type="button" class="btn btn-orenyi-1" data-toggle="modal" data-target="#add_cliente" id="mdl_add_cliente" data-whatever="@mdo"><i class="mdi mdi-account-plus"></i>&nbsp; Agregar Cliente</button>
                    <? include("php/tabla_clientes.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
  <? include("../includes/footer.php");?>