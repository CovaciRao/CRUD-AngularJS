<?php
	require '../db_config.php';
	$id  = $_GET["id"];

	$sql = "SELECT * FROM salarii WHERE id = '".$id."'"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>