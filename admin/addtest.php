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
            <h1 class="m-0 text-dark">Test Information</h1>
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
              <div class="card-header">
                <h3 class="card-title">Add Test Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="addtest_core.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Test name</label>
                    <input type="text" name="tname" class="form-control" id="exampleInputname" placeholder="Test name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Price</label>
                    <input name="tprice" type="text" class="form-control" id="exampleInputusrname" placeholder="Price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Details</label>
                    <textarea class="form-control" name="details" id="" cols="30" rows="10" placeholder="Write something"></textarea>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                </div>
              </form>
            </div>
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

  <!-- Control Sidebar -->
  