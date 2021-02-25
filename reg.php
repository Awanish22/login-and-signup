<?php
include_once 'conn.php';
session_start();
if (isset($_POST['submit'])) {

	$user1=$_POST['user'];
	$username1=str_replace(" ","",$user1);
	$user=strtolower($username1);
	if (empty($_POST['email'])) {
		  $_SESSION['error']="Please fill email ";
			header("Location: signup.php");
	}
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$image='images/pimage/avatar.png';
	$newpass=md5($pass);
	if ($pass===$cpass) {
		$sqlu="SELECT * FROM users WHERE username='$user'";
		$sqlue="SELECT * FROM users WHERE email='$email'";
		$ur=mysqli_query($conn,$sqlu);
		$ur1=mysqli_query($conn,$sqlue);
		if(mysqli_num_rows($ur)>0)
		{
			$_SESSION['error']="username allredy exist";
			header("Location: signup.php");
			exit();
		}elseif(mysqli_num_rows($ur1)>0)
		{
				$_SESSION['error']="Email allredy exist";
				header("Location: signup.php");
				exit();
		}else
		{
			
		$sql="INSERT INTO users(email,phone,address,password,username,pimage) VALUES('$email','$phone','$address','$newpass','$user','$image')"; 
		$x=$conn->query($sql);
		if ($x==true) {
			header("Location: index.php");
			exit();
		}
	}
}







		
			
	else
	{
		
		$_SESSION['error']="Pass not matched";
		header("Location: signup.php");
		exit();
	}
}
	

?>
<!--------------------------------------login---------------------------------------------------->

<?php
if(isset($_POST['log'])){
	$Email=$_POST['email'];
	$pass=$_POST['pass'];
	$newpass=md5($pass);
	echo $sqlr="SELECT * FROM users WHERE email='$Email'";
	$x=mysqli_query($conn,$sqlr);
	if(mysqli_num_rows($x)>0){
		$row=mysqli_fetch_array($x);
		if($newpass==$row['password']){
			$_SESSION['em']=$Email;
			header("Location:home.php");
			exit();
		}
	}
	else{
		$_SESSION['error']="Email not found";
		header("Location: index.php");
		exit();
	}

}



?>
