<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sergeomin WEB | </title>

    <!-- Bootstrap -->
    <link href="/sergeominweb/public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/sergeominweb/public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/sergeominweb/public/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="/sergeominweb/public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="/sergeominweb/public/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/sergeominweb/public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/sergeominweb/public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/sergeominweb/public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/sergeominweb/public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="/sergeominweb/public/vendors/bootstrap-datetimepicker/build/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/sergeominweb/public/vendors/choosen/chosen.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/sergeominweb/public/build/css/custom.min.css" rel="stylesheet">

    <link href="/sergeominweb/public/vendors/fuelux/css/fuelux.min.css" rel="stylesheet">
    

    <!-- jQuery -->
    <script src="/sergeominweb/public/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/sergeominweb/public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/sergeominweb/public/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/sergeominweb/public/vendors/nprogress/nprogress.js"></script>

    <!-- iCheck -->
    <script src="/sergeominweb/public/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="/sergeominweb/public/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/sergeominweb/public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/sergeominweb/public/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/sergeominweb/public/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/sergeominweb/public/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="/sergeominweb/public/vendors/bootstrap-validator/validator.min.js"></script>
    <script src="/sergeominweb/public/vendors/moment/min/moment.min.js"></script>
    <script src="/sergeominweb/public/vendors/bootstrap-datetimepicker/build/js/bootstrap-datepicker.min.js"></script>
    <script src="/sergeominweb/public/vendors/bootstrap-datetimepicker/build/js/bootstrap-datepicker.es.min.js"></script>
    <script src="/sergeominweb/public/vendors/choosen/chosen.jquery.min.js"></script>
    <script src="/sergeominweb/public/vendors/jquery.bootstrap.wizard.js"></script>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Sergeomin WEB</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $this->session->usuario;?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <?php if($this->session->id_rol == 1):?>
                  <li><a><i class="fa fa-home"></i> Administrador <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('administracion/empleado/index') ?>">Registro de personal</a></li>
                      <li><a href="<?php echo site_url('administracion/usuario/empleados') ?>">Registro de usuarios del sistema</a></li>
                      <li><a href="<?php echo site_url('null') ?>">Cotizaciones</a></li>
                      <li><a href="<?php echo site_url('null') ?>">Bloques de equipos</a></li>
                    </ul>
                  </li>                  
                  <?php endif;?>
                  <?php if($this->session->id_rol == 3):?>
                  <li><a><i class="fa fa-home"></i> Recepcionista <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('recepcionista/cliente/index') ?>">Registro de Clientes</a></li>
                      <li><a href="<?php echo site_url('recepcionista/solicitud_analisis_lq/solicitudes') ?>">Lab. Químico</a></li>
                      <li><a href="<?php echo site_url('recepcionista/solicitud_analisis_lm/solicitudes') ?>">Lab. Metalúrgico</a></li>
                    </ul>
                  </li>                  
                  <?php endif;?>
                  <?php if($this->session->id_rol == 5):?>
                  <li><a><i class="fa fa-home"></i> Encargado Lab. Químico <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('recepcionista/cliente/index') ?>">Solicitudes</a></li>
                      <li><a href="<?php echo site_url('recepcionista/solicitud_analisis_lq/solicitudes') ?>">Informe Final</a></li>
                    </ul>
                  </li>                  
                  <?php endif;?>
                  <?php if($this->session->id_rol == 4):?>
                  <li><a><i class="fa fa-home"></i> Técnico Lab. Químico <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('recepcionista/cliente/index') ?>">Asignaciones</a></li>
                    </ul>
                  </li>                  
                  <?php endif;?>
                </ul>
              </div>  
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!--
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $this->session->usuario;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">                    
                    <li><a href="<?php echo site_url('login/logout');?>"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a></li>
                  </ul>
                </li>                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->