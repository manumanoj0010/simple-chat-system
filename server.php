<!--By manoj-->

<?php
session_start();
$host="localhost";
$dbusername="root";
$dbpassword="";
$db="chat";

$username="";
$password1="";
$email="";
$errors=array();

$con=mysqli_connect($host,$dbusername,$dbpassword,$db);

//signupform

if(isset($_POST["register"]))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password1=mysqli_real_escape_string($con,$_POST['password1']);
	$password2=mysqli_real_escape_string($con,$_POST['password2']);

	if(empty($username))
	{
		array_push($errors, "username is required");
	}


	if(empty($password1))
	{
		array_push($errors, "password is required");
	}

	if($password1!=$password2)
	{
		array_push($errors, "The two passwords do not match");
	}

	if(count($errors)==0)
	{
		//$password=mds($password1); //encrypt password
		$sql="INSERT INTO login (username,password) VALUES ('$username','$password1')";
		mysqli_query($con,$sql);
		$_SESSION['username']=$username;
		$_SESSION['success']="You are logged in";
		header("location: home.php");
	}
}

// log user in from login page
if(isset($_POST['login']))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password1=mysqli_real_escape_string($con,$_POST['password1']);

	if(empty($username))
	{
		array_push($errors, "username is required");
	}

	if(empty($password1))
	{
		array_push($errors, "password is required");
	}

	if(count($errors)==0)
	{
		$query="SELECT * FROM login WHERE username='$username' AND password='$password1'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['username']=$username;
			$_SESSION['success']="You are logged in";
			header("location: home.php");
		}
		else
		{
			array_push($errors, "wrong username/password combination");
		}
	}

}
//logout

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}
?>