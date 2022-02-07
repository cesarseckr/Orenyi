
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="index.php">
      <img src="../../images/logo_orenyi_blanco.svg" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="index.php">
      <img src="../../images/isotipo_orenyi_blanco.svg" alt="logo" />
    </a>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
      <li class="nav-item">
        <a href="#" class="nav-link">
           <i class="mdi mdi-account-multiple"></i>Clientes
          <span class="badge badge-orenyi-2 ml-1">2</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="menu-icon fas fa-tasks"></i>Proyectos
          <span class="badge badge-orenyi-2 ml-1">2</span>
        </a>    
      </li>
    </ul>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell"></i>
          <span class="count">4</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <a class="dropdown-item" href="#">
            <p class="mb-0 font-weight-normal float-left">Tienes 4  notificaciones
            <span class="badge badge-pill badge-info float-right">Ver todas</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item" href="#">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="mdi mdi-check mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-medium text-dark">Calificaciones acentadas<br> Ernesto Reyes</h6>
              <p class="font-weight-light small-text">
                30/11/2018 4:30 PM
              </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-commenting"></i>
          <span class="count">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <div class="dropdown-item">
            <p class="mb-0 font-weight-normal float-left">Tienes 12 tickets pendientes
            </p>
            <span class="badge badge-info badge-pill float-right">Ver todos</span>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content flex-grow">
              <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Rodrigo Gutierrez
                <span class="float-right font-weight-light small-text">29/11/2018 3:17 PM</span>
              </h6>
              <p class="font-weight-light small-text">
                Información importante
              </p>
            </div>
          </a>
        </div>
      </li>
      
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text">
            <? 
              $rest = substr($nbre." ".$ap." ".$am, 0, 50);
              echo $rest;
              $contar=strlen($rest);
              if($contar>=50){
                echo "...";
              } 
            ?>
          </span>
          <img class="img-sm rounded-circle" src="<? echo "../../archivos/".$url_img.""; ?>" alt="Perfil">
        </a>

        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          
          <a class="dropdown-item" href="#">
           <b><i class="mdi mdi-account"></i> <? echo $usuario; ?> </b>
          </a>
          <a class="dropdown-item" href="perfil.php">
            <i class="fa fa-caret-right"></i> <i class="mdi mdi-account-circle"></i> Mi perfil
          </a>
          <a class="dropdown-item" href="ayuda.php">
            <i class="fa fa-caret-right"></i>   <i class="mdi mdi-help-circle"></i> Ayuda
          </a>
          <a class="dropdown-item" href="../includes/salir.php">
            <i class="fa fa-caret-right"></i>   <i class="mdi mdi-logout"></i> Salir
          </a>
        </div>
      </li>
    </ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>