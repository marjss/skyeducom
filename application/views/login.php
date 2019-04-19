<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SkyEducom</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php
      $meta = array(
            array('name' => 'description',
                'content' => 'User login page'  
            ),
            array( 'name' => 'viewport',
                'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=no'
            )

          );
      echo meta($meta);
  $bootstrap = array(
                'href' => 'assets/bower_components/bootstrap/dist/css/bootstrap.min.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $fontawsome = array(
                'href' => 'assets/bower_components/font-awesome/css/font-awesome.min.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $ionicons = array(
                'href' => 'assets/bower_components/Ionicons/css/ionicons.min.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $ltetheme = array(
                'href' => 'assets/dist/css/AdminLTE.min.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $kistler = array(
                'href' => 'assets/dist/css/kistler.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $icheck = array(
                'href' => 'assets/plugins/iCheck/square/blue.css',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );
  $googlefont = array(
                'href' => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
                'type' => 'text/css',
                'rel' => 'stylesheet'

                );


  ?>
  <!-- Bootstrap 3.3.7 -->
  <?=link_tag($bootstrap)?>
  <!-- Font Awesome -->
  <?=link_tag($fontawsome)?>
  <!-- Ionicons -->
  <?=link_tag($ionicons)?>
  <!-- Theme style -->
  <?=link_tag($ltetheme)?>
  <!-- iCheck -->
  <?=link_tag($icheck)?>
  <!-- kistler styles -->
  <?=link_tag($kistler)?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <?=link_tag($googlefont)?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo" align="text-center">
    <a href="#"><img src="<?=base_url('assets/dist/img/logo.png')?>"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?=form_open('login/user',array('name' => 'login','id' => 'login'))?>
      <div class="form-group has-feedback">
        <?=form_input(array('name' => 'username','id' => 'username','type' => 'text','class' => 'form-control','placeholder' => 'Type username'));?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?=form_error('username','<div class="has-error"><span class="help-block">','</span></div>')?>
      </div>
      <div class="form-group has-feedback">
        <?=form_password(array('name' => 'password','id' => 'password','class' => 'form-control','placeholder' => 'Password'));?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?=form_error('password','<div class="has-error"><span class="help-block">','</span></div>')?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <?=form_hidden('formname','login')?>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
   <?=form_close()?>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?=base_url('assets/plugins/iCheck/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
