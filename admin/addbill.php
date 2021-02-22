<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("location:../");
}

 
  include_once("../db/query.php");
 if(isset($_REQUEST['btn_sub'])){
$patient=$_POST["patient"];
$medicine=$_POST["medicine"];
$quantity=$_POST["quantity"];

$order_id=rawSql("insert into medicine_sell_info (patient_id) values($patient)");
for($i=0;$i<count($medicine);$i++){
  
  dataInsert('medicine_sell_line',array($order_id,$medicine[$i],$quantity[$i]));
  header('location: addbill.php');
}

 die();
 }
 include_once("layout/header.php");
include_once("layout/sidebar.php");
 ?>

<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Patient</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">patient</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="card card-primary">
      <!-- form start -->
      <form role="form" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputdetname">Patient</label>
            <select name="patient" id="dept" class="form-control">
              <?php
                    printOptions('patient','id','patient_name');
                ?>
            </select>
          </div>
          <div class="row">
            <div class="">
              <a class="btn btn-primary float-right text-white" id="btn1">Add More</a>
            </div>
          </div>
          <div class="root" id="root">
            <div id="row">
              <div class="row">
                <div class="form-group col-md-5">
                  <label for="exampleInputdetname">Medicine</label>
                  <select name="medicine[]" id="dept" class="form-control">
                    <?php
                          printOptions('medicine','id','name');
                          ?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputdetname">Quantity</label>
                  <br>
                  <input style="padding:5px" type="number" name="quantity[]" placeholder="Type quantity">
                </div>
                <div class="col-md-3">
                  <a class="btn btn-danger text-light" style="margin-top:32px" onclick="remove(this)"> remove
                  </a>
                </div>
              </div>

            </div>

          </div>
          <div class="form-group">
            <button name="btn_sub" class="btn btn-success">Submit</button>
          </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>

<script>
  function remove(that) {
    that.parentNode.parentNode.remove()
  }
  window.onload = function () {
    let btn = document.querySelector('#btn1')
    let ul = document.querySelector('#root')


    btn.addEventListener('click', function () {

      document.getElementById("root").innerHTML += document.getElementById('row').innerHTML
      //  ul
      // let li = document.createElement('li')
      // li.className ="list-group-item list-group-item-primary d-flex"
      // li.innerHTML = document.querySelector('#row')
      // ul.appendChild(li)

      // let span = document.createElement('span')
      // span.innerText = 'x'
      // span.className = 'ml-auto'
      // span.style.cursor = 'pointer'
      // span.style.color = 'red'
      // span.addEventListener('click',function(){
      //     ul.removeChild(li)

      // })
      // li.appendChild(span)

    })

  }

</script>
<!-- /.content-wrapper -->
<div style=" position: relative;">
      <?php

      include_once("chat/chat.php");
  
   ?>
  </div>
<?php
 include_once('layout/footer.php');
 ?>