<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="<?= domain ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="<?= $assets ?>myhq/dist/img/ico/favicon.png" type="image/x-icon">
    <!-- Start Global Mandatory Style
   	=====================================================================-->
    <!-- jquery-ui css -->
    <link href="<?= $assets ?>myhq/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="<?= $assets ?>myhq/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Lobipanel css -->
    <link href="<?= $assets ?>myhq/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css">
    <!-- Pace css -->
    <link href="<?= $assets ?>myhq/plugins/pace/flash.css" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link href="<?= $assets ?>myhq/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Pe-icon -->
    <link href="<?= $assets ?>myhq/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css">
    <!-- Themify icons -->
    <link href="<?= $assets ?>myhq/themify-icons/themify-icons.css" rel="stylesheet" type="text/css">
    <!-- End Global Mandatory Style
        =====================================================================-->
    <!-- Start page Label Plugins 
        =====================================================================-->
    <!-- Toastr css -->
    <link href="<?= $assets ?>myhq/plugins/toastr/toastr.css" rel="stylesheet" type="text/css">
    <!-- Emojionearea -->
    <link href="<?= $assets ?>myhq/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css">
    <!-- Monthly css -->
    <link href="<?= $assets ?>myhq/plugins/monthly/monthly.css" rel="stylesheet" type="text/css">
    <!-- End page Label Plugins 
        =====================================================================-->
    <!-- Start Theme Layout Style
        =====================================================================-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>myhq/editors/tinymce/tinymce.min.css">
    <link href="<?= $assets ?>myhq/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <a href="/myhq" class="logo">
                <!-- Logo -->
                <span class="logo-mini">
                    <!--<b>A</b>H-admin-->
                    <img src="<?= $assets ?>myhq/dist/img/mini-logo.png" alt="">
                </span>
                <span class="logo-lg">
                    <!--<b>Admin</b>H-admin-->
                    <img src="<?= $assets ?>myhq/dist/img/logo.png" alt="">
                </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top ">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <!-- Sidebar toggle button-->
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
                                    <img src="<?= $assets ?>myhq/dist/img/avatar4.png" class="img-circle" height="40" width="40" alt="User Image">
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
                        <img src="<?= $assets ?>myhq/dist/img/avatar5.png" class="img-circle" alt="User Image">
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
                    <?php if (in_array("admin", $Template->data['roles'])) : ?>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sitemap"></i><span>Department</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq/add-department">Add Department</a></li>
                                <li><a href="/myhq/departments">Department list</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-globe"></i><span>CMS & Pages</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq/add-page">Add Page</a></li>
                                <li><a href="/myhq/pages">Manage Pages</a></li>
                                <li><a href="/myhq/add-layout">New Layout</a></li>
                                <li><a href="/myhq/layouts">Manage Layouts</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user-md"></i><span>Doctors</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq/add-doctor">Add Doctor</a></li>
                                <li><a href="/myhq/doctors">Manage Doctors</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i><span>Patients</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq/add-patient">Add Patient</a></li>
                                <li><a href="/myhq/patients">Manage Patients</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-check-square-o"></i><span>Appointment</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq/appointments">Manage Appointments</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bed"></i><span>Beds & Wards</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq/add-bed">Add Bed</a></li>
                                <li><a href="/myhq/beds">Manage Beds</a></li>
                                <li><a href="/myhq/add-ward">Add Ward</a></li>
                                <li><a href="/myhq/wards">Manage Wards</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-text-o"></i><span>Notice & Mails</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq/add-notice">Add Notice</a></li>
                                <li><a href="/myhq/notices">Manage Notice</a></li>
                            </ul>
                        </li>

                    <?php elseif (in_array("doctor", $Template->data['roles'])) : ?>


                    <?php elseif (in_array("nurse", $Template->data['roles'])) : ?>


                    <?php elseif (in_array("user", $Template->data['roles'])) : ?>


                    <?php else : ?>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-credit-card-alt"></i><span>payment</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq">Add payment</a></li>
                                <li><a href="/myhq">payment list</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-text"></i><span>Report</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq">Patient wise Report</a></li>
                                <li><a href="/myhq">Doctor wise Report</a></li>
                                <li><a href="/myhq">Total Report</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="widgets.html">
                                <i class="fa fa-user-circle-o"></i><span>Human Resources</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/myhq">Add Employee</a></li>
                                <li><a href="/myhq">employee list</a></li>
                                <li><a href="/myhq">Add Nurse</a></li>
                                <li><a href="/myhq">Nurse list</a></li>
                                <li><a href="/myhq">Add pharmacist</a></li>
                                <li><a href="/myhq">pharmacist list</a></li>
                                <li><a href="/myhq">Add Representative</a></li>
                                <li><a href="/myhq">Representative list</a></li>

                            </ul>
                        </li>

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