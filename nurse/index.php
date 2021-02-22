
 <?php
session_start();
if(!isset($_SESSION["nurse"])){
  header("location:../");
}

?>
 <!-- Navbar -->
 <?php
 include_once("layout/header.php");
 include_once("layout/sidebar.php");
 ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
     <h1>Welcome to Nurse panel!!!</h1>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 
 include_once('layout/footer.php');

 ?>

  