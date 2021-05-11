<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<base href="<?= domain ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $title ?></title>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="<?= $assets ?>dist/img/ico/favicon.png" type="image/x-icon">
   	<!-- Start Global Mandatory Style
   	=====================================================================-->
   <!-- jquery-ui css -->
   <link href="<?= $assets ?>plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
   <!-- Bootstrap -->
   <link href="<?= $assets ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <!-- Bootstrap rtl -->
   <!--<link href="<?= $assets ?>bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
   <!-- Lobipanel css -->
   <link href="<?= $assets ?>plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css">
   <!-- Pace css -->
   <link href="<?= $assets ?>plugins/pace/flash.css" rel="stylesheet" type="text/css">
   <!-- Font Awesome -->
   <link href="<?= $assets ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <!-- Pe-icon -->
   <link href="<?= $assets ?>pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css">
   <!-- Themify icons -->
   <link href="<?= $assets ?>themify-icons/themify-icons.css" rel="stylesheet" type="text/css">
   <!-- End Global Mandatory Style
        =====================================================================-->
        <!-- Start page Label Plugins 
        =====================================================================-->
        <!-- Toastr css -->
        <link href="<?= $assets ?>plugins/toastr/toastr.css" rel="stylesheet" type="text/css">
        <!-- Emojionearea -->
        <link href="<?= $assets ?>plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css">
        <!-- Monthly css -->
        <link href="<?= $assets ?>plugins/monthly/monthly.css" rel="stylesheet" type="text/css">
        <!-- End page Label Plugins 
        =====================================================================-->
        <!-- Start Theme Layout Style
        =====================================================================-->
        <!-- Theme style -->
        
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>editors/tinymce/tinymce.min.css">
        
        <link href="<?= $assets ?>dist/css/stylehealth.min.css" rel="stylesheet" type="text/css">
        <!--<link href=<?= $assets ?>dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
        <!-- End Theme Layout Style
        =====================================================================-->
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">
                <a href="/myhq" class="logo"> <!-- Logo -->
                    <span class="logo-mini">
                        <!--<b>A</b>H-admin-->
                        <img src="<?= $assets ?>dist/img/mini-logo.png" alt="">
                    </span>
                    <span class="logo-lg">
                        <!--<b>Admin</b>H-admin-->
                        <img src="<?= $assets ?>dist/img/logo.png" alt="">
                    </span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top ">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-tasks"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            
                            <!-- Messages -->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="pe-7s-mail"></i>
                                    <span class="label label-success">0</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header"><i class="fa fa-envelope-o"></i> 0 Messages</li>
                                    <li class="footer"><a href="#">See all messages <i class=" fa fa-arrow-right"></i></a></li>
                                </ul>
                            </li>
                            
                            <!-- Notifications -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="pe-7s-bell"></i>
                                    <span class="label label-warning">0</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header"><i class="fa fa-bell"></i> 0 Notifications</li>
                                   <li class="footer"><a href="#"> See all Notifications <i class=" fa fa-arrow-right"></i></a></li>
                                </ul>
                            </li>
                            
                            <!-- user -->
                            <li class="dropdown dropdown-user admin-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                <div class="user-image">
                                <img src="<?= $assets ?>dist/img/avatar4.png" class="img-circle" height="40" width="40" alt="User Image">
                                </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-users"></i> User Profile</a></li>
                                    <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                    <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                            
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- =============================================== -->
            <!-- Left side column. contains the sidebar -->
          	<aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image pull-left">
                            <img src="<?= $assets ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <h4>Welcome</h4>
                            <p><strong>NOHE Admin</strong></p>
                        </div>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="/myhq/"><i class="fa fa-hospital-o"></i><span>Dashboard</span></a>
                        </li>
                        
                        <?php if( $Core->HasRole("admin") ): ?>
              
                            
                        <?php elseif($profile=="doctor"): ?>
                            
             
                        <?php else: ?>

                            
                        <?php endif; ?>
                         <li>
                            <a href="/logout">
                                <i class="fa fa-close"></i><span> Logout</span> 
                            </a>
                        </li>
                    </ul>
                    
				</div> 
       			<!-- /.sidebar -->
    		</aside>
    
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                     <form action="/ajax/searchmedic" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                            <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>   
                    <div class="header-icon">
                        <i class="fa fa-tachometer"></i>
                    </div>
                    <div class="header-title">
                        <h1><?= $title ?></h1>
                        <small> Dashboard features</small>
                        <ol class="breadcrumb hidden-xs">
                            <li><a href="/myhq"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </section>
