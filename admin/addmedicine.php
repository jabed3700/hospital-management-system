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
            <h1 class="m-0 text-dark">Medicine</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">medicine</li>
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
                <h3 class="card-title">Add Medicine</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="addmedicine_core.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Medicine name</label>
                    <input type="text" name="mname" class="form-control" id="exampleInputname" placeholder="Medicine name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Price</label>
                    <input name="mprice" type="text" class="form-control" id="exampleInputusrname" placeholder="Price">
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
  