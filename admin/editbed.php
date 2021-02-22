<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}
?>
<?php
 include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){

 $bed= $_POST['bed'];
 $room= $_POST['room'];
 $nurse= $_POST['nurse'];
 $ac= $_POST['ac'];
 $rent= $_POST['rent'];
 $hiddenid=$_POST['hiddeninfo'];
 $upda = mysqli_query($con,"UPDATE bed SET bed_no='$bed',room_no='$room',nurse_id='$nurse',ac='$ac',rent='$rent' WHERE id=$hiddenid");

 header('location: bedlist.php');
 
 }
 
?>
<!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_GET["id"];
 $sql="select * from bed where id=".$id;

 $beds=mysqli_query($con,$sql);


  while($res = mysqli_fetch_array($beds)){
  $bed=$res["bed_no"];
  $room=$res["room_no"];
  $nurse=$res["nurse_id"];
  $ac=$res["ac"];
  $rent=$res["rent"];
  
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
                <h3 class="card-title">Update information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="editbed.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname">Bed No</label>
                    <input type="text" name="bed" class="form-control" id="exampleInputname" value="<?=$bed?>" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputusrname">Room No</label>
                    <input name="room" type="text" class="form-control" id="exampleInputusrname" value="<?=$room?>" placeholder="Enter username">
                  </div>
                  
                  <div class="form-group"> 
                    <input type="hidden" value="<?php echo $id;?>" name="hiddeninfo" />
                  </div>
                  
                 
                  <div class="form-group">
                    <label for="exampleInputdetname">Nurse</label>
                    <select name="nurse" id="exampleInputdetname" class="form-control">
                    <?php
                    printOptionsUpdate('nurse','id','name',$nurse);
                    ?>
                  </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputdesign">Ac/Non-ac</label>
                    <select class="form-control" name="ac" id="exampleInputdesign">
                      
                        <option 
                          <?php
                            if($ac=='Ac'){
                            echo "selected='true'";
                          }
                          ?>
                         value="Ac">Ac</option>
                        <option
                         <?php
                            if($ac=='Non-ac'){
                            echo "selected='true'";
                          }
                          ?>
                         value="Non-ac">Non-ac</option>
                    </select>
                </div>

                  <div class="form-group">
                    <label for="exampleInputfees">Rent</label>
                    <input type="text" name="rent" class="form-control" id="exampleInputfees" value="<?=$rent?>" placeholder="Rent">
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

  