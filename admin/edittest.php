<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}
?>
<?php
 include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){

 $name= $_POST['mname'];
 $price= $_POST['mprice'];
 $details= $_POST['details'];
 $hiddenid=$_POST['hiddeninfo'];
 $upda = mysqli_query($con,"UPDATE tests SET test_name='$name',test_price='$price',details='$details' WHERE id=$hiddenid");

 header('location: testlist.php');
 
 }
 
?>

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_GET["id"];
 $sql="select * from tests where id=".$id;
 $test=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($test)){
  $name=$res["test_name"];
  $price=$res["test_price"];
  $details=$res["details"];
}


 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Test Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="edittest.php">
                <div class="card-body">
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Name</label>
                    <input type="text" name="mname" class="form-control" id="exampleInputfees" value="<?=$name?>" placeholder="Number Of bags">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Price</label>
                    <input type="text" name="mprice" class="form-control" id="exampleInputfees" value="<?=$price?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Details</label>
                    <textarea class="form-control" name="details" id="" cols="30" rows="10"><?=$details?></textarea>
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
 <?php
 include_once('layout/footer.php');
 ?>

 