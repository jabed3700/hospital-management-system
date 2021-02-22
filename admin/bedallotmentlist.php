<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}

 
  include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){
$patient=$_POST["patient"];
$bed=$_POST["bed"];
$order_id=rawSql("insert into bed_allotment (bed_id,patient_id) values($bed,$patient)");
 }
 include_once("layout/header.php");
include_once("layout/sidebar.php");
 ?>
 <style>
 .action{
   display: none;
 }
 </style>

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Bed allotment</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">bed</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <section class="content">
  <?php
      include_once('../db/query.php');
      printTableRelease('SELECT patient_name,bed_no,admit_date,release_date,ba.id FROM bed_allotment ba,bed b,patient p where ba.bed_id=b.id and ba.patient_id=p.id',["Patient Name","Bed_no","Admit_date","Release_date"],["patient_name","bed_no","admit_date","release_date"],"editdoctor.php","doctors","doctorlist.php");
      ?>
  </section>
  <!-- /.content -->
</div>
<div style=" position: relative;">
      <?php

      include_once("chat/chat.php");
  
   ?>
  </div>
<?php
 include_once('layout/footer.php');
 ?>