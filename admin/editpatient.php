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
 $sql="select * from patient where id=".$id;
 $patient=mysqli_query($con,$sql);
  while($res=mysqli_fetch_array($patient)){
  $pname=$res["patient_name"];
  $id=$res["id"];
  $department=$res["department_id"];
  $contact=$res["contact"];
  $gname=$res["guardian_name"];
  $gcontact=$res["guardian_contact"];
  $details=$res["details"];
  
}
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Patient Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">editpatient</li>
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
                <h3 class="card-title">Edit Patient</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="editdoctor.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname" value="<?=$pname?>" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputdetname">Department</label>
                    <select

                     name="department" id="exampleInputdetname" class="form-control">
                    <?php
                    printOptionsUpdate('department','id','dept_name',$department);
                    ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputcontact">Contact</label>
                    <input name="contact" type="text" class="form-control" id="exampleInputcontact" value="<?=$contact?>" placeholder="Contact">
                </div>
                <div class="form-group">
                    <label for="exampleInputcontact">Gurdian Name</label>
                    <input name="gname" type="text" class="form-control" id="exampleInputcontact" value="<?=$gname?>" placeholder="Gurdian Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Gurdian Contact</label>
                    <input type="text" name="gcontact" class="form-control" id="exampleInputfees" value="<?=$gcontact?>" placeholder="Gurdian Contact">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputfees">Details</label>
                    <textarea class="form-control" name="details" value="<?=$details?>" id="" cols="30" rows="10">Write details your Problems.</textarea>
                  </div>
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                  
                 
                 <!-- <div class="form-group">
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
                </div>-->
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

  