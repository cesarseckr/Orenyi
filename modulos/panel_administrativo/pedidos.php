<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>Orenyi - Pedidos</title>
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
                <div class="card-body"><h4 class="card-title"><i class="menu-icon fas fa-utensils"></i> 
                Pedidos</h4><hr>
                  <div class="fluid-container">
                    <div class="form-row">
                      <div class="form-group col-8">
                        <button type="button" class="btn btn-orenyi-1" data-toggle="modal" data-target="#add_pedido" id="mdl_add_pedido" data-whatever="@mdo"><i class="fas fa-plus-circle"></i>&nbsp; Nuevo pedido</button>
                      </div>
                      <div class="form-group col-4">
                        <form id="formE" method="GET">
                          <? 
                            $fecha=date('Y-m-d');
                            if(isset($_GET['fecha'])){
                              $fecha=$_GET['fecha'];
                            } 
                          ?>
                          <input type="date" value="<? echo $fecha; ?>" class="form-control" name="fecha" id="filtroFech" onchange="this.form.submit()">
                        </form>
                      </div>
                    </div>
                    <style type="text/css">
                      #iframe-tablas{
                        width: 100%;
                        height: 750px;
                        border: 0px none #ffffff;
                      }
                    </style>
                    <? include("php/add_pedidos.php");?>
                    <? /*include("php/mod_pedidos.php");*/ ?>
                    <? include("php/tabla_pedidos.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


  <? include("../includes/footer.php");?>