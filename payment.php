<?php 

require_once('db/query.php');


if(isset($_POST['step-3']))
{
$name=$_POST['name'];
$phone=$_POST['phone'];
$method=$_POST['method']; 
$amount=$_POST['bill'];
$trx_id=$_POST['trx_id'];

$sql="INSERT INTO  payment (method,name,phone,amount,trx_id) VALUES('$method','$name','$phone','$amount','$trx_id')";
mysqli_query($con, $sql);

?>
<script>
alert('Your payment has been successfully submitted!')
window.location.href="index.php?step3=1&phone=<?=$phone?>";
</script>

<?php
}

?>