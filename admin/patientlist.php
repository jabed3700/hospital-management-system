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
            <h1 class="m-0 text-dark">Patient List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">patientlist</li>
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
      printTableBySql('select p.patient_name,de.dept_name,d.name,p.contact,p.guardian_name,p.guardian_contact,p.id from patient AS p INNER JOIN department AS de ON p.department_id= de.id
      INNER JOIN doctors AS d
      ON p.refer_doctor=d.id',["Patient Name","Department","Refer Doctor","Contact","Gurdian Name","Gurdian Contact","Bill"],["patient_name","dept_name","name","contact","guardian_name","guardian_contact"],"editpatient.php","patient","patientlist.php","patientbill.php");
    
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

  