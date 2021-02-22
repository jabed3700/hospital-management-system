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
            <h1 class="m-0 text-dark">Patient payment confirmation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">payment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Method</th>
                    <th>Bill</th>
                    <th>Trx_id</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
                <?php
     
      $sql="SELECT * from payment";
      $query=mysqli_query($con,$sql);
   
                if($query== true){
                    $i=1;
                while($info=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $i;$i++?></td>
                    <td><?php echo $info['name']?></td>
                    <td><?php echo $info['phone']?></td>
                    <td><?php echo $info['method']?></td>
                    <td><?php echo $info['amount']?></td>
                    <td><?php echo $info['trx_id']?></td>
                    <td><?php if($info['paid']==0){ ?>
                      <a href="paymentapp.php?id=<?=$info['phone']?>" class='btn btn-primary'>approve</a>
                    <?php }else{
                      echo 'approved';
                    }?></td>
                </tr>
                <?php }
      }
      
    
      ?>
            </tbody>
        </table>
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

  