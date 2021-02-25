<?php
include_once 'conn.php';
session_start();
if (isset($_POST['updateprofile'])) {

 	echo $sql_up="UPDATE users SET email='$_POST[email]',phone='$_POST[phone]',address='$_POST[address]' WHERE email='$_POST[email]'";
 	if (mysqli_query($conn,$sql_up)==true) {
 		$_SESSION['msg'] = 'Profile Updated Successfully';
 		header("Location: home.php");
 		exit;
 	}

 }
 else{
 	echo 'GET OUT';
 }



 if (isset($_POST['updatepassword'])) {

	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	if($pass===$cpass){
 	echo $sql_up="UPDATE users SET password='$_POST[password]' WHERE email='$_POST[email]'";
 	if (mysqli_query($conn,$sql_up)==true) {
 		$_SESSION['msg'] = 'Password Updated Successfully';
 		header("Location: home.php");
 		exit;
 	}
}
else{
	$_SESSION['msg'] = 'Password Does Not Matched';
 		header("Location: home.php");
 		exit;
}
 }
 else{
 	echo 'GET OUT';
 }
 ?>