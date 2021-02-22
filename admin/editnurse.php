<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}
?>
<?php
 include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){

 $name= $_POST['name'];
 $username= $_POST['usrname'];
 $contact= $_POST['contact'];
 $hiddenid=$_POST['hiddeninfo'];
 $upda = mysqli_query($con,"UPDATE nurse SET name='$name',username='$username',contact='$contact' WHERE id=$hiddenid");

 header('location: nurselist.php');
 
 }
 
?>

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_GET["id"];
 $sql="select * from nurse where id=".$id;
 $nurse=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($nurse)){
  $name=$res["name"];
  $id=$res["id"];
  $username=$res["username"];
  $contact=$res["contact"];
  
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
                <h3 class="card-title">Information Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="editnurse.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname" value="<?=$name?>" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Username</label>
                    <input name="usrname" type="text" class="form-control" id="exampleInputusrname" value="<?=$username?>" placeholder="Enter username">
                  </div>
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact</label>
                    <input name="contact" value="<?=$contact?>" type="text" class="form-control" id="exampleInputcontact" placeholder="Contact">
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
