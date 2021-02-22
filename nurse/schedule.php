<?php
session_start();
if(!isset($_SESSION["nurse"])){
  header("location:../");
}
?>
<!DOCTYPE html>
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
  dataInsert("nurse_duty",[$id,$day[$i],$start,$end]);
}

header('location:nurseschedule.php?id='.$id);
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nurse | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="./assets/style.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 $id=$_SESSION["nurse"]["id"];
$sql="SELECT case when day_id=0 then 'Monday' when day_id=1 then 'Tuesday' when day_id=2 then 'Wednesday' when day_id=3 then 'Thursday' when day_id=4 then 'Friday' when day_id=5 then 'Saturday' when day_id=6 then 'Sunday' end AS day,start,end,id FROM nurse_duty where nurse_id=".$id."  order by day_id";
$result=mysqli_query($con,$sql);
 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header a -->
    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="font-size:1.8rem">
              <div class="card-header bg-primary">
                <h3 class="card-title " style="font-size:2rem">Nurse Duty</h3>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
  <script src="./assets/index.js" type="text/javascript"></script>

</body>
</html>




