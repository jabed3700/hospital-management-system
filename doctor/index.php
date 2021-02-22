<?php
session_start();
include_once("../db/config.php");
if(!isset($_SESSION["doctor"])){
  header("location:../");
}
?> 
 
 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" style="font-size:1.8rem">
     Welcome to doctor panel!!!
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <div>
 <div style=" position: relative;">
      <?php

      include_once("chat/chat.php");
  
   ?>
  </div>
 </div>
 <?php
 
 include_once('layout/footer.php');

 ?>

  