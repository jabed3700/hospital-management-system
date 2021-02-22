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
 $designation= $_POST['designation'];
 $department= $_POST['department'];
 $fees= $_POST['fees'];
 $contact= $_POST['contact'];
 $hiddenid=$_POST['hiddeninfo'];
 $upda = mysqli_query($con,"UPDATE doctors SET name='$name',username='$username',designation='$designation',dept_id='$department',fees='$fees',contact='$contact' WHERE id=$hiddenid");

 header('location: doctorlist.php');
 
 }
 
?>

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_GET["id"];
 $sql="select * from doctors where id=".$id;
 $doctors=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($doctors)){
  $name=$res["name"];
  $id=$res["id"];
  $username=$res["username"];
  $designation=$res["designation"];
  $department=$res["dept_id"];
  $fees=$res["fees"];
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
            <h1 class="m-0 text-dark">Doctor Edit Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">editdoctor</li>
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
                <h3 class="card-title">Edit Doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="editdoctor.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname" value="<?=$name?>" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Username</label>
                    <input name="usrname" type="text" class="form-control" id="exampleInputusrname"value="<?=$username?>" placeholder="Enter username">
                  </div>
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                  
                 
                  <div class="form-group">
                    <label for="exampleInputdesign">Designation</label>
                    <select class="form-control" name="designation" id="exampleInputdesign">
                        <option 
                          <?php
                            if($designation=='Professor'){
                            echo "selected='true'";
                          }
                          ?>
                         value="Professor">Professor</option>
                        <option
                         <?php
                            if($designation=='Asst. Professor'){
                            echo "selected='true'";
                          }
                          ?>
                         value="Asst. Professor">Asst. Professor</option>
                        <option
                        <?php
                            if($designation=='MBBS'){
                            echo "selected='true'";
                          }
                          ?>
                         value="MBBS">MBBS</option>
                    </select>
                </div>
                
                  <div class="form-group">
                    <label for="exampleInputdetname">Department</label>
                    <select name="department" id="exampleInputdetname" class="form-control">
                    <?php
                    printOptionsUpdate('department','id','dept_name',$department);
                    ?>
                  </select>
                </div>
               
                  <div class="form-group">
                    <label for="exampleInputfees">Fees</label>
                    <input type="text" name="fees" class="form-control" id="exampleInputfees" value="<?=$fees?>" placeholder="Doctor fees">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact</label>
                    <input name="contact" type="text" class="form-control" id="exampleInputcontact" value="<?=$contact?>" placeholder="Contact">
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

  