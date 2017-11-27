<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?> | Aplikasi Pembuatan Akta Notaris</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tinymce/skins/lightgray/skin.min.css') ?>">
  <!-- <link rel="stylesheet" href=""> -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url('dashboard') ?>" class="navbar-brand"><b>Aplikasi</b>AKTA</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo ($page == 'dashboard') ? 'active' : '' ?>"><a href="<?php echo base_url('dashboard') ?>">Dashboard <span class="sr-only">(current)</span></a></li>
            <li class="dropdown <?php echo ($page == 'fidusia') ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akta Fidusia <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('fidusia/akta/debitur') ?>">Data Debitur</a></li><!-- 
                <li><a href="#">Data Persetujuan</a></li>
                <li><a href="#">Data Pemilik</a></li>
                <li><a href="#">Data Pinjaman</a></li> -->
              </ul>
            <li class="dropdown <?php echo($page=='surat') ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Template Surat <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('fidusia/akta/surat_akta') ?>">Surat Akta</a></li>
              </ul>
            </li>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata('full_name') ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?php echo base_url('assets/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('full_name') ?> - <?php echo ($this->session->userdata('level') == 1) ? 'Super Admin' : 'Operator' ?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('dashboard/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>