<style>
  @media print {
    tr.vendorListHeading {
      background-color: #1a4567 !important;
      -webkit-print-color-adjust: exact;
    }
  }

  @media print {
    .vendorListHeading th {
      color: white !important;
    }
  }
</style>
<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("location:../");
}
?>
<!-- Navbar -->
<?php
include_once("layout/header.php");
include_once("layout/sidebar.php");
include_once("../db/query.php");
$id = $_GET["id"];
$medicines = $con->query("select * from medicine_sell_info ms ,medicine_sell_line ml,patient p,medicine m where ms.patient_id=p.id and ms.id=ml.sell_id and ml.medicine_id=m.id and p.id=" . $id);
$tests = $con->query("SELECT * FROM test_reports tr,tests t where tr.tests_id=t.id and tr.patient_id=" . $id);
$beds = $con->query("SELECT release_date,admit_date,bed_no,datediff(release_date,admit_date)+1 as day,rent from bed_allotment ba,bed b where b.id=ba.bed_id and ba.patient_id=" . $id);
$doctors = $con->query("select * from patient p,doctors d,department de where p.refer_doctor=d.id and de.id=d.dept_id AND p.id=".$id);
?>

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Patient Bill</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Patient Bill</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header a -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header with-border">
              <h3 class="card-title">Medicine Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Medicine</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                  <?php
                  $i = 1;
                  $medicinetotal = 0;
                  while ($medicine = mysqli_fetch_array($medicines)) {
                    ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $medicine["name"] ?></td>
                      <td><?= $medicine["price"] ?></td>
                      <td><?= $medicine["quantity"] ?></td>
                      <td><?= $medicine["price"] * $medicine["quantity"] ?></td>
                    </tr>
                  <?php
                    $i++;
                    $medicinetotal += $medicine["price"] * $medicine["quantity"];
                  }

                  ?>
                  <tr>

                    <td colspan="4">Grand Total</td>
                    <td><?= $medicinetotal ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header with-border">
              <h3 class="card-title">Test Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Test Name</th>
                    <th>Examine Time</th>
                    <th>Price</th>
                  </tr>
                  <?php
                  $i = 1;
                  $testtotal = 0;
                  while ($test = mysqli_fetch_array($tests)) {
                    ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $test["test_name"] ?></td>
                      <td><?= $test["examined_at"] ?></td>
                      <td><?= $test["test_price"] ?></td>
                    </tr>
                  <?php
                    $i++;
                    $testtotal += $test["test_price"];
                  }

                  ?>
                  <tr>

                    <td colspan="3">Grand Total</td>
                    <td><?= $testtotal ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header with-border">
              <h3 class="card-title">Bed Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Bed</th>
                    <th>Price</th>
                    <th>Admit Date</th>
                    <th>Release Date</th>
                    <th>No Of Day</th>
                    <th>Total</th>
                  </tr>
                  <?php
                  $i = 1;
                  $bedtotal = 0;
                  while ($bed = mysqli_fetch_array($beds)) {
                    ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $bed["bed_no"] ?></td>
                      <td><?= $bed["rent"] ?></td>
                      <td><?= $bed["admit_date"] ?></td>
                      <td><?= $bed["release_date"] ?></td>
                      <td><?= $bed["day"] ?></td>
                      <td><?= $bed["day"] * $bed["rent"] ?></td>
                    </tr>
                  <?php
                    $i++;
                    $bedtotal += $bed["day"] * $bed["rent"];
                  }

                  ?>
                  <tr>

                    <td colspan="6">Grand Total</td>
                    <td><?= $bedtotal ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header with-border">
              <h3 class="card-title">Bill Summary</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Department</th>
                    <th>Doctor Fee</th>
                    <th>Medicine Bill</th>
                    <th>Test Bill</th>
                    <th>Seat Bill</th>

                    <th>Total</th>
                  </tr>
                  <?php
                  
                  while ($doctor = mysqli_fetch_array($doctors)) {
                    ?>
                    <tr>
                      
                      <td><?= $doctor["patient_name"] ?></td>
                      <td><?= $doctor["name"] ?></td>
                      <td><?= $doctor["dept_name"] ?></td>
                      <td><?= $doctor["fees"] ?></td>
                      <td><?= $medicinetotal ?></td>
                      <td><?= $testtotal ?></td>
                      <td><?= $bedtotal ?></td>
                      <td><?= $bedtotal+$testtotal+$medicinetotal+$doctor["fees"] ?></td>

                    </tr>
                  <?php
                 
                  }

                  ?>
                  
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once('layout/footer.php');
?>