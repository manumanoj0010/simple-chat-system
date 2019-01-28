<?php include 'db.php'; ?>
<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Box</title>
	<link rel="stylesheet" href="style.css" media="all">
	<script type="text/javascript">
		function ajax() {

			var req = new XMLHttpRequest();

			req.onreadystatechange = function() {
				if(req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();

		}
		setInterval(function() {ajax()}, 1000);
	</script>
</head>
<body onload="ajax();">

<div id="container">
	<div id="chat_box">
		<div id="chat"></div>
	</div>
	<form method="post" action="home.php">
		<textarea name="msg" placeholder="enter message" maxlength="150"></textarea>
		<input type="submit" name="submit" value="Send it">
		<p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
	</form>

	<?php 
	if(isset($_POST['submit'])) {
		$msg = $_POST['msg'];
		$name=$_SESSION['username'];
		$query = "INSERT INTO chat (name,msg) VALUES ('$name','$msg') "; 

		$run = $con->query($query);

		if($run) {
			echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
		}

	}
	?>
</div>


</body>
</html>