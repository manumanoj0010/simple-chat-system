<?php include('server.php'); ?>

<?php
	include 'db.php';
	$query = "SELECT * FROM chat ORDER BY id ASC";
	$run = $con->query($query);

	while($row = $run->fetch_array()) :
?>
	<div id="chat_data">
		<span style="color: green"><?php echo $row['name']; ?> :</span>
		<span style="color: brown"><?php echo $row['msg']; ?></span>
		<span style="float: right"><?php echo formatDate($row['date']); ?></span>
	</div>
<?php endwhile; ?>