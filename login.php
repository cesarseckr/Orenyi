<? session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
    <title>Orenyi</title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.css">
    <!-- End plugin css for this page -->
    
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    
    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="js/jquery.js"></script>
    <script src="js/validator/validator.js"></script>
    <!-- boostrap -->
    <link rel="stylesheet" href="js/sweetalert/sweetalert2.css">
    <script src="js/sweetalert/sweetalert2.js"></script>
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">  
                <center> <img src="images/logo2.png" width="230"><hr></center>
                <form class="form-auth-small" method="post" enctype="multipart/form-data" action="" role="form">
                  
                  <div class="form-group">
                    <label class="label">Usuario</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="usuario" placeholder="Usuario" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>* Ingrese su usuario</p>">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-user"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="label">Contraseña</label>
                    <div class="input-group">
                      <input type="password" data-validation="required" class="form-control" name="password" placeholder="Contraseña" required="required" data-validation-error-msg="<p style='color:#B40431;'>* Ingrese su contraseña</p>">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-lock"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" name="enviar" class="btn btn-orenyi-1 btn-lg btn-block">ACCEDER</button>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                    <a href="#" class="text-small forgot-password text-black">¿Olvidaste tú contraseña?</a>
                  </div>
                
                </form>

                <script type="text/javascript">
                  $successMsg = $(".alert");
                  $.validate({
                    errorMessageClass: "error",
                    onSuccess: function(){
                      $successMsg.show();
                      return true; 
                    }
                  });
                </script>
                
                <? 
                  include("modulos/includes/conexion.php");
                  if(isset($_POST['enviar'])){ 
                    $usuario= $_POST['usuario'];
                    $password= base64_encode($_POST['password']);
                    $verificar_usuario = false;
                    $verificar_password = false;
                    $sql = 'SELECT * FROM usuarios'; 
                    $sq = $db->query($sql);
                    while ($result = $sq->fetch(PDO::FETCH_OBJ)) {
                      if($result->usuario == $_POST['usuario'] || $result->pass == $_POST['password']) {
                        if ($usuario == $result->usuario and $password == $result->pass){ 
                          $verificar_usuario = true;
                          $verificar_password = true;                          
                        } 
                      }
                    }
                    
                    if($verificar_usuario == true  and $verificar_password == true) {   
                      $usuario= $_POST['usuario'];
                      $password= base64_encode($_POST['password']);
                      $sql ="SELECT * FROM usuarios where usuario='$usuario' and pass='$password'";   
                      $sq = $db->query($sql);
                      $rows= $sq->fetchAll();
                      foreach ($rows as $row) {
                        $_SESSION['id_usuario'] = $row['id_usuario'];
                        $_SESSION['id_tipo'] = $row['id_tipo'];
                        $_SESSION['usuario'] = $row['usuario'];
                        $_SESSION['pass'] = $row['pass'];
                        $_SESSION['estatus'] = $row['estatus'];
                        $_SESSION['ps'] = $row['ps'];
                        $_SESSION['url_img'] = $row['url_img']; 
                        echo '<meta http-equiv="Refresh" content="0; url=modulos/panel_administrativo/ordenes.php">';
                      }    
                    }else{
                      echo "<script>
                              Swal.fire({
                                position: 'center',
                                type: 'error',
                                title: 'Datos incorrectos',
                                html: 'Verifique su usuario o contraseña',
                                showConfirmButton: false,
                                timer: 2000
                              })
                            </script>";
                    }
                  }
                ?>

              </div>
              
              <ul class="auth-footer"> 
                <li>
                  <a href="#">Ayuda</a>
                </li>
                <li>
                  <a href="#">Contacto</a>
                </li>
                <li>
                  <a href="www.orenyi.com.mx">Sitio web</a>
                </li>
              </ul>
              <p class="footer-text text-center">Copyright © 2021 Cesar Rico.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
  </body>

</html>