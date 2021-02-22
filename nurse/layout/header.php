
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nurse | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="layout/style15.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-size: 1.8rem;">
<div class="wrapper">
  
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding-bottom: 26px;
    margin-bottom:0;" id="menu1">
    <!-- Left navbar links -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
       <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
       <!--start-->
       <li class="dropdown user user-menu" style="margin-top: 9px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img style="margin-top:4px" src="../admin/avater/<?=$_SESSION["nurse"]["image"]?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?=$_SESSION["nurse"]["username"]?></span>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-right" id="drop">
          <!-- User image -->
          <li class="user-header">
            <img src="../admin/avater/<?=$_SESSION["nurse"]["image"]?>" class="img-circle" alt="User Image">

            <p> 
            <?=$_SESSION["nurse"]["name"]?>
            </p>
          </li>
          <!-- Menu Body -->
         
          <!-- Menu Footer-->
          <li class="user-footer" >
            <div class="pull-left"style="float:left"id="profile" >
              <a href="editprofile.php" class="btn btn-default btn-flat"  style="font-size:1.6rem">Profile</a>
            </div>
            <div class="pull-right" style="float:right" id="signout">
              <a href="../logout.php" class="btn btn-default btn-flat"  style="font-size:1.6rem">Sign out</a>
            </div>
          </li>
        </ul>
        
      </li>
<!--end end-->
     
    </ul>
  </nav>
  
