
<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}

 
  include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){
$patient=$_POST["patient"];
$test=$_POST["test"];
$order_id=rawSql("insert into test_reports (patient_id,tests_id) values($patient,$test)");
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
          <h1 class="m-0 text-dark">Patient test report</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">test</li>
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
            <select name="patient"  class="form-control">
              <?php
                    printOptions('patient','id','patient_name');
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputdetname">Test</label>
            <select name="test" class="form-control">
              <?php
                    printOptions('tests','id','test_name');
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