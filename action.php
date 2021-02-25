<?php
session_start();
require_once 'conn.php';
if (isset($_POST['upload'])) {

      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){




      	$imgpath="images/pimage/".$file_name;// image rename ka query likhna hai.....
      	 $sql="UPDATE users SET pimage='$imgpath' WHERE email='$_SESSION[em]'";
      	 $x=mysqli_query($conn,$sql);
      	 if ($x==true) {
      	 	move_uploaded_file($file_tmp,$imgpath);
      	 	header("Location:home.php");
			exit();
      	 }
         
         
      }else{
         print_r($errors);
      }
   
}

?>