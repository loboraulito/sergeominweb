<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SergeominWeb</title>

    <!-- Bootstrap -->
    <link href="/sergeominweb/public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/sergeominweb/public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/sergeominweb/public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/sergeominweb/public/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/sergeominweb/public/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo site_url('login/login');?>" method="post">
              <h1>Inicio de Sesión</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required="" name="usuario" id="usuario" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Clave" required="" name="clave" id="clave"/>
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Ingresar">
                </input>                
              </div>

              <div class="clearfix"></div>

              <div class="separator">                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1></i> SergeominWeb</h1>
                  <p>©2017 Derechos Reservados Sergeomin</p>
                </div>
              </div>
              </div>
    <?php if($error==1):?>
        <div class="error alert alert-danger">
          <strong>¡Error de Ingreso!</strong> Usuario o clave incorrectos.
        </div>
    <?php endif;?>
            </form>
          </section>
        </div>        
      </div>

       

  </body>
</html>