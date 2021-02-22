<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}
?>
<?php
 include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){

 $group= $_POST['group'];
 $bag= $_POST['bag'];
 $date= $_POST['date'];
 $hiddenid=$_POST['hiddeninfo'];
 $upda = mysqli_query($con,"UPDATE blood_bank SET blood_group_id='$group',num_of_bags='$bag',received_date='$date'WHERE id=$hiddenid");

 header('location: bloodlist.php');
 
 }
 
?>

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_GET["id"];
 $sql="select * from blood_bank where id=".$id;
 $blood=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($blood)){
  $bag=$res["num_of_bags"];
  $date=$res["received_date"];
  $department=$res["blood_group_id"];
  
  
}


 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
                <h3 class="card-title">Edit blood</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="editblood.php">
                <div class="card-body">
                  
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputdetname">Blood Group</label>
                    <select

                     name="group" id="exampleInputdetname" class="form-control">
                    <?php
                    printOptionsUpdate('blood_group','id','name',$department);
                    ?>
                  </select>
                </div>
               
                  <div class="form-group">
                    <label for="exampleInputfees">Number Of Bags</label>
                    <input type="text" name="bag" class="form-control" id="exampleInputfees" value="<?=$bag?>" placeholder="Number Of bags">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Received Date</label>
                    <input name="date" type="date" class="form-control" id="exampleInputcontact" value="<?=$date?>" placeholder="Received date">
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
 <?php
 include_once('layout/footer.php');
 ?>

 