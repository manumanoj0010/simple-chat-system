<?php include('server.php');

if(empty($_SESSION['username']))
{
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<div class="header">
		<h2>Home page</h2>
	</div>

	<div class="content">
		<?php if (isset($_SESSION['success'])):?>
			<div class="error success">
				<h1>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h1>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION["username"])): ?>
			<p>Welcome<strong><?php echo $_SESSION['username']; ?></strong></p>
			<p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
		<?php endif ?>

	</div>

	
</body>
</html>