<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tesoreria</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/bootstrap/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/bootstrap/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/skins/_all-skins.min.css">
  <title>. : : Validacion : : .</title>
</head>
<body>
  
<div class="container">
        <div class="card card-container">
            <img class="profile-img-card" src="<?php echo base_url(); ?>public/iestp/img/logo_menu.png" alt="IESTP-ILAVE">
            <p id="profile-name" class="profile-name-card">TESORERIA</p>
            <form class="form-group form-signin" method="POST" action="<?php echo base_url();?>login/validar_post">
              <hr>
                <input type="text" name="usuario" id="user" class="form-control" placeholder="Nombre de Usuario" required autofocus>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                <hr>
              <?php if (!empty($msj_error)) {
              ?>
                <p style="color:red; font-size: 14px; text-align: center;"><?php echo $msj_error->mensaje; ?></p>
              <?php } ?>
                <button type ="submit" class="btn btn-lg btn-primary btn-block btn-signin" id="login">Ingresar</button>
            </form><!-- /form -->
            <div class="text-center">
                <h6 class="pie">&copy; 2018 Todos los derechos Reservados</h6>
                <h6 class="pie">Instituto de Educaci&oacute;n Superior Tecnol&oacute;gico P&uacute;blico Ilave</h6>
                </div>
            </div><!-- /card-container -->
    </div><!-- /container -->
  
  <script src="<?php echo base_url('public/bootstrap/js/all.js'); ?>" ></script>
  <script src="<?php echo base_url();?>public/jquery/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url();?>public/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>public/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>public/bootstrap/js/alertify.js"></script>


</body>
