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
            <h1 class="m-0 text-dark">Patient</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">patient</li>
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
                <h3 class="card-title">Add Patient</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="addpatient_core.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter Name">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputdetname">Department</label>
                    <select name="department" id="dept" class="form-control">
                    <?php
                    printOptions('department','id','dept_name');
                    ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputdetname">Refer Doctor</label>
                    <select name="doctor" id="doct" class="form-control">
                      <option>Choose Department First</option>
                  </select>
                </div>
               
                  <div class="form-group">
                    <label for="exampleInputfees">Contact</label>
                    <input type="text" name="contact" class="form-control" id="exampleInputfees" placeholder="Contact">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Guardian Name</label>
                    <input name="gname" type="text" class="form-control" id="exampleInputcontact" placeholder="Guardian Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Guardian Contact</label>
                    <input type="text" name="gcontact" class="form-control" id="exampleInputfees" placeholder="Guardian Contact">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Details</label>
                    <textarea class="form-control" name="details" id="" cols="30" rows="10">Write details your Problems.</textarea>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                </div>
              </form>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <script>
  document.querySelector("#dept").onchange=function(){
    let dept=document.querySelector("#dept").value;
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("doct").innerHTML = this.responseText;
    }
    
  };
  xhttp.open("GET", "loadDoctorByDepartment.php?id="+dept, true);
  xhttp.send();
  }
  </script>
  <!-- /.content-wrapper -->
  <div style=" position: relative;">
      <?php

      include_once("chat/chat.php");
  
   ?>
  </div>
 <?php
 include_once('layout/footer.php');
 ?>





 