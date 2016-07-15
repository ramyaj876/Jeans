<?php
	$conn = mysqli_connect('localhost', 'root', '');
	#mysqli_connect(hostname, username, password)
	mysqli_select_db($conn, 'test');
?>