<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ABB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Assosa Blood Bank</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
			<?php
				$user = $this->session->userdata('user');
				extract($user);
			?>
          <li class="dropdown user user-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></span>
				<span class="pull-right-container">
              <i class="fa fa-angle-down pull-up"></i>
            </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-body bg-secondary">
                <div class="">
                  <a href="<?php echo base_url('lab/user/profile/'.$user_id) ?>" class="form-control btn btn-info btn-flat">Profile</a>
                </div>
                <div class="">
                  <a href="<?php echo base_url('logout') ?>" class="form-control btn btn-danger" style="color:white;margin-top:5px;">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="<?php echo base_url('lab_home') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
		  
        <li class="treeview">
          <a href="<?php echo base_url('admin/donor/get_all') ?>">
            <i  class="iconify fa icon" data-icon="bi:people"></i>
            <span>Donors</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu bg-danger">
            <li><a href="<?php echo base_url('lab/donor') ?>"><i class="fa fa-circle-o"></i> add Donor</a></li>
            <li><a href="<?php echo base_url('lab/donor/get_all') ?>"><i class="fa fa-circle-o"></i> Manage Donors</a></li>
          </ul>
        </li>
		  <li class="treeview">
          <a href="<?php echo base_url('lab/donation') ?>">
            <i class="fa iconify" data-icon="bi:clipboard2-plus"></i>
            <span>Blood Donation</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu bg-danger">
            <li><a href="<?php echo base_url('lab/blood') ?>"><i class="fa fa-circle-o"></i> Manage Blood</a></li>
			<li><a href="<?php echo base_url('lab/donation') ?>"><i class="fa fa-circle-o"></i> Donation History</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="<?php echo base_url('lab/hospital') ?>">
            <i class="iconify fa icon" data-icon="fxemoji:hospital"></i>
            <span>Blood Seekers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('lab/hospital/create') ?>"><i class="fa fa-circle-o"></i> Add Seeker</a></li>
            <li><a href="<?php echo base_url('lab/hospital') ?>"><i class="fa fa-circle-o"></i> Manage Seakers</a></li>
           
          </ul>
        </li>
		  <li class="treeview">
          <a href="<?php echo base_url('lab/bloodrequest/stock') ?>">
            <i class="fa fa-table"></i>
            <span>Blood Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
            <li><a href="<?php echo base_url('lab/bloodrequest/stock') ?>"><i class="fa fa-circle-o"></i> Manage Blood Stock</a></li>
                    </ul>
        </li>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i>
            <span>Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?php echo base_url('lab/event/') ?>"><i class="fa fa-circle-o"></i> view Event</a>
			  </li>
                     </ul>
        </li>
		  <li class="treeview">
          <a href="#">
              <i class="iconify fa" data-icon="uiw:setting-o"></i>		
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('lab/user/change/'.$user_id) ?>"><i class="fa fa-circle-o"></i> Change Password</a>
			  </li>
                     </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  