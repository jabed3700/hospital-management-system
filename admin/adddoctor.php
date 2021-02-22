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
            <h1 class="m-0 text-dark">Doctor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">doctor</li>
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
                <h3 class="card-title">Add Doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="adddoctor_core.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Username</label>
                    <input name="usrname" type="text" class="form-control" id="exampleInputusrname" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword2">Confirm Password</label>
                      <input name="conpass" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                    </div>
                 
                  <div class="form-group">
                    <label for="exampleInputdesign">Designation</label>
                    <select class="form-control" name="designation" id="exampleInputdesign">
                        <option value="Professor">Professor</option>
                        <option value="Asst. Professor">Asst. Professor</option>
                        <option value="MBBS">MBBS</option>
                    </select>
                </div>
                
                  <div class="form-group">
                    <label for="exampleInputdetname">Department</label>
                    <select name="department" id="exampleInputdetname" class="form-control">
                    <?php
                    printOptions('department','id','dept_name');
                    ?>
                  </select>
                </div>
               
                  <div class="form-group">
                    <label for="exampleInputfees">Fees</label>
                    <input type="text" name="fees" class="form-control" id="exampleInputfees" placeholder="Doctor fees">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact</label>
                    <input name="contact" type="text" class="form-control" id="exampleInputcontact" placeholder="Contact">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputFile">Doctor Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="ppp" class="form-control" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
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

 