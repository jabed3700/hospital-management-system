<?php
session_start();
if(!isset($_SESSION["doctor"])){
  header("location:../");
}
?>

<?php
 include_once("../db/query.php");
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 $range=$_POST["range"];
 $day=$_POST["day"];
 $id=$_POST["id"];
 $start=explode("-",$range)[0];
 $end=explode("-",$range)[1];
  if(explode(" ",$start)[1]=="PM"){
  $start=explode(" ",$start)[0]; //22:14
  $hour=explode(":",$start)[0];
  $min=explode(":",$start)[1];
  $hour+=12;
  $start=$hour.":".$min;
}
 else{
$start=explode(" ",$start)[0];
}
if(explode(" ",$end)[1]=="PM"){
  $end=explode(" ",$end)[0]; //22:14
  $hour=explode(":",$end)[0];
  $min=explode(":",$end)[1];
  $hour+=12;
  $end=$hour.":".$min;
}
 else{
$end=explode(" ",$end)[0];
}
for($i=0;$i<count($day);$i++){
  dataInsert("doctors_schedule",[$id,$day[$i],$start,$end]);
}

header('location:doctorschedule.php?id='.$id);
}
?>


  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_SESSION["doctor"]["id"];
$sql="SELECT case when day_id=0 then 'Monday' when day_id=1 then 'Tuesday' when day_id=2 then 'Wednesday' when day_id=3 then 'Thursday' when day_id=4 then 'Friday' when day_id=5 then 'Saturday' when day_id=6 then 'Sunday' end AS day,start,end,id FROM doctors_schedule where doctor_id=".$id."  order by day_id";
$result=mysqli_query($con,$sql);
 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="font-size:1.8rem">
              <div class="card-header bg-primary">
                <h3 class="card-title" style="font-size:2rem">Schedule List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                     
                      <th>Day</th>
                      <th>Start</th>
                      <th>End</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    while($res=mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td><?=$res["day"]?></td>
                        <td><?=$res["start"]?></td>
                        <td><?=$res["end"]?></td>
                      </tr>
                      <?php
                    }
                    ?>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              

            </div>
      </div>
      
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
  <!-- Control Sidebar -->
  <?php
 include_once('layout/footer.php');
 ?>




