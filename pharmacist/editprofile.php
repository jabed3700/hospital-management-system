<?php
session_start();
if(!isset($_SESSION["pharmacist"])){
  header("location:../");
}
?>
<?php
 include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){

 $name= $_POST['name'];
 $username= $_POST['usrname'];
 $contact= $_POST['contact'];
 $password= $_POST['password'];
 $hiddenid=$_POST['hiddeninfo'];
 $upda = mysqli_query($con,"UPDATE pharmacist SET name='$name',username='$username',password='$password',contact='$contact' WHERE id=$hiddenid");

 header('location: editprofile.php');
 
 }
 
?>

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_SESSION["pharmacist"]["id"];
 $sql="select * from pharmacist where id=".$id;
 $pharmacist=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($pharmacist)){
  $name=$res["name"];
  $id=$res["id"];
  $username=$res["username"];
  $pass=$res['password'];
  $contact=$res["contact"];
  
}


 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title" style="font-size:2rem">Information Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input style="font-size:1.8rem;padding:1.5rem 1.5rem 1.5rem 1rem" type="text" name="name" class="form-control" id="exampleInputname" value="<?=$name?>" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Username</label>
                    <input style="font-size:1.8rem;padding:1.5rem 1.5rem 1.5rem 1rem" name="usrname" type="text" class="form-control" id="exampleInputusrname" value="<?=$username?>" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Password</label>
                    <input style="font-size:1.8rem;padding:1.5rem 1.5rem 1.5rem 1rem"  name="password" value="<?=$pass?>" type="text" class="form-control" id="exampleInputcontact" placeholder="password">
                  </div>
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact</label>
                    <input style="font-size:1.8rem;padding:1.5rem 1.5rem 1.5rem 1rem" name="contact" value="<?=$contact?>" type="text" class="form-control" id="exampleInputcontact" placeholder="Contact">
                  </div>
                   
                 <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>-->
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="font-size:1.8rem" type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
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

  