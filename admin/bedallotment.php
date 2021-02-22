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
    <div class="card card-primary">
      <!-- form start -->
      <form role="form" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputdetname">Patient</label>
            <select name="patient" id="dept" class="form-control">
              <?php
                    printOptionsBySql('SELECT p.id,p.patient_name FROM patient p where p.id not in(SELECT patient_id FROM bed_allotment where release_date is null)','id','patient_name');
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputdetname">Bed</label>
            <select name="bed" id="dept" class="form-control">
              <?php
                    printOptions('bed','id','bed_no');
                ?>
            </select>
          </div>
          <div class="form-group">
            <button name="btn_sub" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
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