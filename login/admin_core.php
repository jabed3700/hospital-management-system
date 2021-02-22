<?php
session_start();
require_once('../db/query.php');

 $username = $_REQUEST['name'];
 $password = $_REQUEST['password'];
 
 echo $hiddeninfo = $_REQUEST['hidden']; 

	if($hiddeninfo == 'admin'){
	
		$userinfo = mysqli_query($con,"SELECT id,username FROM admin WHERE username='$username' AND password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["admin"]=$user;
				}
			header('location: ../admin/adddoctor.php');
				
			}else{
				header('location: login.php?type=admin');
			}
	}elseif($hiddeninfo == 'doctors'){
		
		$userinfo = mysqli_query($con,"SELECT *  FROM doctors WHERE username='$username' AND password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["doctor"]=$user;	
				}
			header('location: ../doctor/schedule.php');
				
			}else{
				header('location: login.php?type=doctor');
			}
	}elseif($hiddeninfo == 'nurse'){
		
		$userinfo = mysqli_query($con,"SELECT * FROM nurse WHERE username='$username' AND password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["nurse"]=$user;
					
				}
			header('location: ../nurse/schedule.php');
				
			}else{
				header('location:login.php?type=nurse');
			}
	}elseif($hiddeninfo == 'pharmacist'){
		
		$userinfo = mysqli_query($con,"SELECT * FROM pharmacist WHERE username='$username' AND password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["pharmacist"]=$user;
					
				}
			header('location: ../pharmacist/schedule.php');
				
			}else{
				header('location: login.php?type=pharmacist');
			}
	}

?>