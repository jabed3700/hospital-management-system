<?php
session_start();
if(!isset($_SESSION["doctor"])){
  header("location:../");
}

?>
<?php
 include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){

 $name= $_POST['name'];
 $username= $_POST['usrname'];
 $password= $_POST['password'];
 $contact= $_POST['contact'];
 $hiddenid=$_POST['hiddeninfo'];
 $upda = mysqli_query($con,"UPDATE doctors SET name='$name',username='$username',password='$password',contact='$contact' WHERE id=$hiddenid");

 header('location: editprofile.php');
 
 }
 
?>

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_SESSION["doctor"]["id"];
 $sql="select * from doctors where id=".$id;
 $doctors=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($doctors)){
  $name=$res["name"];
  $id=$res["id"];
  $username=$res["username"];
  $pass=$res["password"];
  $contact=$res["contact"];
  
}


 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" style="font-size:2.5rem">
    <div class="card card-primary">
              <div class="card-header bg-primary">
                <h3 style="font-size:2rem" class="card-title">Update Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="" enctype="multipart/form-data" style="font-size:1.8rem">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname" value="<?=$name?>" placeholder="Enter Name" style="font-size:1.8rem">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Username</label>
                    <input name="usrname" type="text" class="form-control" id="exampleInputusrname"value="<?=$username?>" style="font-size:1.8rem" placeholder="Enter username">
                  </div>
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Password</label>
                    <input style="font-size:1.8rem" name="password" type="text" class="form-control" id="exampleInputcontact" value="<?=$pass?>" placeholder="Contact">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact</label>
                    <input style="font-size:1.8rem" name="contact" type="text" class="form-control" id="exampleInputcontact" value="<?=$contact?>" placeholder="Contact">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btn_sub" style="font-size:1.8rem">Submit</button>
                </div>
              </form>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div>
 <div style=" position: relative;">
      <?php

      include_once("chat/chat.php");
  
   ?>
  </div>
 </div>
 <?php
 include_once('layout/footer.php');
 ?>

  