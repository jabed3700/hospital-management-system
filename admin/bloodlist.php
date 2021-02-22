<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}
?>
 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 include_once("../db/query.php");
 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blood Reserve</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">bloodreserve</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header a -->
    <!-- Main content -->
    <section class="content">
    <?php
      include_once('../db/query.php');
      printTableBySql('select bb.id,name,num_of_bags,received_date from blood_bank as bb,blood_group as bg where bb.blood_group_id=bg.id',["Blood Group","Number of bags","Recieved date"],["name","num_of_bags","received_date"],"editblood.php","blood_bank","bloodlist.php");
     /* printTableQ('doctors',["Name","Department","Designation","Contact"],["name","dept_id","designation","contact"]);*/
      ?>
    </section>
    <!-- /.content -->
  </div>
 <!-- /.content-wrapper -->
 <div style=" position: relative;">
      <?php

      include_once("chat/chat.php");
  
   ?>
  </div>
 <?php
 include_once('layout/footer.php');
 ?>

  