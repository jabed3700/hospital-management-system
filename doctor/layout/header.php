<?php
$doctor_id=$_SESSION["doctor"]["id"];
$sql="SELECT max(send_at) as send_at,message,sender FROM messages WHERE reciever='".$doctor_id."' group BY sender order by send_at desc";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doctor | Dashboard</title>
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
  <link rel="stylesheet" href="../chat/style2.css">
  <link rel="stylesheet" href="layout/style15.css">
  <style>
  .cbox-hidden{
    display: none;
  }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-size: 1.8rem;">
<div class="wrapper">
  
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding-bottom: 26px;
    margin-bottom:0;" id="menu1">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
       <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments"></i>
          <span class="badge badge-danger navbar-badge" style="font-size:1rem"><?=mysqli_num_rows($result)?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php
          while($res=mysqli_fetch_array($result)){
            ?>
            <a href="#" class="dropdown-item" onclick="startChat('<?=$res['sender']?>')">
            <!-- Message Start -->
            <div class="media">
              <img src="../dist/img/avater.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title" style="font-size:1.8rem">
                  <?=$res["sender"]?>
                  <span class="float-right text-sm text-danger" ><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm" style="font-size:1.6rem !important;"><?=$res["message"]?></p>
                <p class="text-sm text-muted" style="font-size:1.6rem !important;"><i class="fa fa-clock-o mr-1"></i> <?=$res["send_at"]?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
            <?php
          }
          
          ?>

          <a href="#" class="dropdown-item dropdown-footer" style="font-size:1.8rem">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
       <!--start-->
       <li class="dropdown user user-menu" style="margin-top: 9px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img style="margin-top:4px" src="../admin/avater/<?=$_SESSION["doctor"]["doctor_image"]?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?=$_SESSION["doctor"]["username"]?></span>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-right" id="drop">
          <!-- User image -->
          <li class="user-header">
            <img src="../admin/avater/<?=$_SESSION["doctor"]["doctor_image"]?>" style="margin-left: 83px;" class="img-circle" alt="User Image">

            <p>
              
            <?=$_SESSION["doctor"]["name"]?>
            <small><?=$_SESSION["doctor"]["designation"]?></small>
              
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
  
