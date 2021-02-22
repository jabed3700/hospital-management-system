<?php
session_start();
if(!isset($_SESSION["nurse"])){
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
 $upda = mysqli_query($con,"UPDATE nurse SET name='$name',username='$username',contact='$contact',password='$password' WHERE id=$hiddenid");

 header('location: schedule.php');
 
 }
 
?>

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_SESSION["nurse"]["id"];
 $sql="select * from nurse where id=".$id;
 $nurse=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($nurse)){
  $name=$res["name"];
  $id=$res["id"];
  $username=$res["username"];
  $pass=$res["password"];
  $contact=$res["contact"];
  
}
 ?>
  <!-- Main Sidebar Container -->
  <div class="content-wrapper">
    <section class="content">
    <div class="card card-primary"style="font-size:1.8rem">
              <div class="card-header">
                <h1 class="card-title" style="font-size:2rem">Information Update</h1>
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
                    <input style="font-size:1.8rem;padding:1.5rem 1.5rem 1.5rem 1rem"  name="usrname" type="text" class="form-control" id="exampleInputusrname" value="<?=$username?>" placeholder="Enter username">
                  </div>
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Password</label>
                    <input style="font-size:1.8rem;padding:1.5rem 1.5rem 1.5rem 1rem"  name="password" value="<?=$pass?>" type="text" class="form-control" id="exampleInputcontact" placeholder="password">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact</label>
                    <input style="font-size:1.8rem;padding:1.5rem 1.5rem 1.5rem 1rem"  name="contact" value="<?=$contact?>" type="text" class="form-control" id="exampleInputcontact" placeholder="Contact">
                  </div>
                <div class="card-footer">
                  <button  style="font-size:1.8rem;" type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
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
