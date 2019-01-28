<!--By manoj-->

<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">
		<!--errors display-->
		<?php include('errors.php');?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username;?>">
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="Password" name="password2">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p>
			Already a member?<a href="login.php">Login</a>
		</p>
	</form>
</body>
</html>