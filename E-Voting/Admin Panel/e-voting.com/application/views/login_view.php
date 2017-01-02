<!DOCTYPE html>
<!--[if lt IE 7]>

<html class="lt-ie9 lt-ie8 lt-ie7" lang="en">

<![endif]-->
<!--[if IE 7]>

<html class="lt-ie9 lt-ie8" lang="en">

<![endif]-->
<!--[if IE 8]>

<html class="lt-ie9" lang="en">

<![endif]-->
<!--[if gt IE 8]>
<!-->

<html lang="en">
  
  <!--
<![endif]-->
  
<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Oct 2014 05:12:14 GMT -->
<head>
    <meta charset="utf-8">
    <title>
      E-voting
    </title>
    <link rel="shortcut icon" href="<?php echo site_url(); ?>assets/img/logo.jpg" type="image/jpg">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <!-- bootstrap css -->
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/html5.js">
    </script>
    <link href="<?php echo site_url(); ?>assets/icomoon/style.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>assets/css/main.css" rel="stylesheet"> <!-- Important. For Theming change primary-color variable in main.css  -->
    <!--[if lte IE 7]>
    <script src="css/icomoon-font/lte-ie7.js">
    </script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
            
            <div class="row-fluid">
              
              <div class="span12">
                <div class="widget">
                  <div class="widget-body">
                    <div class="span3">&nbsp;</div>
                    <div class="span5">
                      <div class="sign-in-container">
                      <?php if($this->session->flashdata('login_error')){ ?>
                      <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close" type="button">
                          ×
                        </button>
                        <h4 class="alert-heading">
                          Error!
                        </h4>
                        <p>
                          <?php echo $this->session->flashdata('login_error'); ?>
                        </p>
                      </div>
                      <?php } ?>
                        <form action="<?php echo site_url('login'); ?>" class="login-wrapper" method="post">
                          <div class="header">
                            <div class="row-fluid">
                              <div class="span12">
                                <h3>Login<!--<img src="<?php echo site_url(); ?>assets/img/logo.jpg" alt="Logo" class="pull-right">--></h3>
                                <p>Fill out the form below to login.</p>
                              </div>
                            </div>
                           
                          </div>
                          <div class="content">
                            <div class="row-fluid">
                              <div class="span12">
                                <input class="input span12 email" name="username" placeholder="Username" required="required" type="text" value="">
                              </div>
                            </div>
                            <div class="row-fluid">
                              <div class="span12">
                                <input class="input span12 password" name="password" placeholder="Password" required="required" type="password">
                              </div>
                            </div>
                          </div>
                          <div class="actions">
                            <input class="btn btn-info" name="login" type="submit" value="Login" >
                            <a class="link" href="#">Forgot Password?</a>
                            <div class="clearfix"></div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="span3">&nbsp;</div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              
            </div>
            
      <!--/.fluid-container-->
    </div>
    </br></br></br></br>
    <footer>
      <center>
        <p>
          &copy; <a href="http://hashtrix.in/">E-voting</a> <?php echo date("Y"); ?>
        </p>
      </center>
    </footer>
    <script src="<?php echo site_url(); ?>assets/js/jquery.min.js">
    </script>
    <script src="<?php echo site_url(); ?>assets/js/bootstrap.js">
    </script>
    
    <!-- Custom JS -->
    <script src="<?php echo site_url(); ?>assets/js/custom.js">
    </script>
  </body>

</html>