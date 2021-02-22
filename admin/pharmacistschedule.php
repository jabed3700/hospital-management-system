<?php
session_start();
if(!isset($_SESSION["admin"])){
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
  dataInsert("pharmacist_duty",[$id,$day[$i],$start,$end]);
}

header('location:pharmacistschedule.php?id='.$id);
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
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
 $id=$_GET["id"];
$sql="SELECT case when day_id=0 then 'Monday' when day_id=1 then 'Tuesday' when day_id=2 then 'Wednesday' when day_id=3 then 'Thursday' when day_id=4 then 'Friday' when day_id=5 then 'Saturday' when day_id=6 then 'Sunday' end AS day,start,end,id FROM pharmacist_duty where pharmacist_id=".$id." order by day_id";
$result=mysqli_query($con,$sql);
 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Schedule</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pharmacist Schedule</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header a -->
    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Schedule List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                     
                      <th>Day</th>
                      <th>Start</th>
                      <th>End</th>
                      <th style="width: 40px">Delete</th>
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
                        <td><a class="btn btn-danger btn-sm" href="deletepharmacistschedule.php?id=<?=$res["id"]?>&pharmacist=<?=$id?>">Delete</a></td>
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
      <div class="col-md-6">
        <form role="form" method="POST" action="">
            <div class="card">
              <div class="card-body">
                      <div class="row">
                <div class="form-group">
                    <div class="dowPicker">
                        <div class="dowPickerOption">
                            <input type="checkbox" id="dow1" name="day[]" value="6">
                            <label for="dow1">S</label>
                        </div>
                        <div class="dowPickerOption">
                            <input type="checkbox" id="dow2" name="day[]" value="0">
                            <label for="dow2">M</label>
                        </div>
                        <div class="dowPickerOption">
                            <input type="checkbox" id="dow3" name="day[]" value="1">
                            <label for="dow3">T</label>
                        </div>
                        <div class="dowPickerOption">
                            <input type="checkbox" id="dow4" name="day[]" value="2">
                            <label for="dow4">W</label>
                        </div>
                        <div class="dowPickerOption">
                            <input type="checkbox" id="dow5" name="day[]" value="3">
                            <label for="dow5">T</label>
                        </div>
                        <div class="dowPickerOption">
                            <input type="checkbox" id="dow6" name="day[]" value="4">
                            <label for="dow6">F</label>
                        </div>
                        <div class="dowPickerOption">
                            <input type="checkbox" id="dow7" name="day[]" value="5">
                            <label for="dow7">S</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div id="datetimepickerDate" class="input-group timerange">
                        <span class="input-group-addon" style="">
                            <i style="font-size:28px;margin-top:4px;" aria-hidden="true" class="fa fa-4 fa-calendar"></i>
                        </span>

                        <input style="margin-left:5px"  class="form-control" type="text" name="range">
                        
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div class="row" style="width:100%">
                  <div class="form-group">
                    <input type="submit" class="btn btn-block btn-outline-success btn-xs" value="Update">
                  </div>
                  
                </div>
            </div>
    
                </div>
            </div>
                
         </form>       
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




