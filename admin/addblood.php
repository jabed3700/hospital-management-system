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
            <h1 class="m-0 text-dark">Blood</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">blood</li>
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
                <h3 class="card-title">Add Blood</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="addblood_core.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputdetname">Blood Group</label>
                    <select name="group" id="exampleInputdetname" class="form-control">
                    <?php
                    printOptions('blood_group','id','name');
                    ?>
                  </select>
                </div>
               
                  <div class="form-group">
                    <label for="exampleInputfees">Number Of Bags</label>
                    <input type="text" name="bag" class="form-control" id="exampleInputfees" placeholder="Number of bags">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Received Date</label>
                    <input name="date" type="date" class="form-control" id="exampleInputcontact" placeholder="Received date">
                  </div>
                  
                 <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>-->
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                </div>
              </form>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  <div style=" position: relative;">
      <?php

      include_once("chat/chat.php");
  
   ?>
  </div>
 <?php
 include_once('layout/footer.php');
 ?>

  