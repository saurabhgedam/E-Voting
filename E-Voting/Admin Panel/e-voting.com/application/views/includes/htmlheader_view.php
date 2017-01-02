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
  
<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Oct 2014 05:11:23 GMT -->
<head>
    <meta charset="utf-8">
    <title>E-VOTING - <?php echo $selected_top_nav;?></title>
     <!--<link rel="shortcut icon" href="<?php echo site_url(); ?>assets/img/logo.jpg" type="image/jpg">-->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <!-- bootstrap css -->
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/html5.js">
    </script>
     <!--[if IE 7]>
      <link rel="stylesheet" href="<?php echo site_url(); ?>assets/icons/css/font-awesome-ie7.min.css">
    <![endif]-->
  <link href="<?php echo site_url(); ?>assets/css/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/css/wysiwyg/wysiwyg-color.css" rel="stylesheet">
  <link href="<?php echo site_url(); ?>assets/css/main.css" rel="stylesheet"> <!-- Important. For Theming change primary-color variable in main.css  -->  
  <link href="<?php echo site_url(); ?>assets/css/alertify.core.css" rel="stylesheet" id="toggleCSS">
  <link href="<?php echo site_url(); ?>assets/css/chosen.css" rel="stylesheet">
 


  </head>
  <body>
    <header>
      <a href="<?php echo site_url('dashboard'); ?>" class="logo">
        
      </a>
      <div class="user-profile">
        <?php
        /*  $image=$this->session->userdata('pro_pic');
          if(!empty($image)){
            $profile_picture=site_url('assets/profile_pictures/thumbs/'.$image);
          }
          elseif($this->session->userdata('gender') == "male"){
            $profile_picture=site_url('assets/profile_pictures/thumbs/male_icon.png'); 
          }
          else{                        
            $profile_picture=site_url('assets/profile_pictures/thumbs/male_icon.png');
          }*/
        ?>
        <a data-toggle="dropdown" class="dropdown-toggle">
          <img src="<?php echo ($this->session->userdata('image') ? site_url('assets/profile_pictures/thumbs/'.$this->session->userdata('image')) : ($this->session->userdata('gender') == "Male" ? site_url('assets/profile_pictures/thumbs/male_icon.png') : site_url('assets/profile_pictures/thumbs/female_icon.png'))); ?>" alt="Profile-Image">
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu pull-right">
          <li>
            <a href="<?php echo site_url('profile/edit_profile'); ?>">
              Edit Profile
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('login/logout'); ?>">
              Logout
            </a>
          </li>
        </ul>
      </div>
      <!--<ul class="mini-nav">
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe040;"></div>
            <span class="info-label" id="quickMessages">
              3
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe04c;"></div>
            <span class="info-label-green" id="quickAlerts">
              5
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe037;"></div>
            <span class="info-label-orange" id="quickShop">
              9
            </span>
          </a>
        </li>
      </ul>-->
    </header>
    <div class="container-fluid">
      <div class="dashboard-container">
        <?php if(!empty($top_nav)){ ?>
        <div class="top-nav">
          <ul>
          <?php foreach ($top_nav as $key => $value) { ?>
              <li>
                <a href="<?php echo site_url($value['url']); ?>" <?php echo ($selected_top_nav == $key ? 'class="selected"' : ''); ?> >
                  <?php echo $value['icon']; ?>
                  <?php echo $key; ?>
                </a>
              </li>
            <?php } ?> 
          </ul>
          <div class="clearfix">
          </div>
        </div>
        <?php } ?>
        <?php if(!empty($selected_top_nav)){ ?>
        <div class="sub-nav">
          <ul>
            <li><a href="#" class="heading"><?php echo $selected_top_nav; ?></a></li>
            <?php foreach ($top_nav[$selected_top_nav]['sub_nav'] as $key => $value) { ?>
            <li>
              <a href="<?php echo site_url($value); ?>">
                <?php echo $key; ?>
              </a>
            </li>
            <?php } ?>  
          </ul>
          <div class="btn-group pull-right">
            <button class="btn btn-warning2">
              Main Navigation
            </button>
            <button data-toggle="dropdown" class="btn btn-warning2 dropdown-toggle">
              <span class="caret">
              </span>
            </button>
            <ul class="dropdown-menu pull-right">
              <?php foreach ($top_nav as $key => $value) { ?>
                <li>
                  <a href="<?php echo site_url($value['url']); ?>" data-original-title="">
                    <?php echo $key; ?>
                  </a>
                </li>
              <?php } ?>
              <?php foreach ($top_nav[$selected_top_nav]['sub_nav'] as $key => $value) { ?>
                <li>
                  <a href="<?php echo site_url($value); ?>" data-original-title="">
                    <?php echo $key; ?>
                  </a>
                </li>
              <?php } ?>
              <li>
                <a href="<?php echo site_url('profile/edit_profile'); ?>" data-original-title="">
                  Edit Profile
                </a>
              </li>
              <li>
                <a href="<?php echo site_url('login/logout'); ?>" data-original-title="">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>
        <div class="dashboard-wrapper">
          