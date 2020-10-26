<?php
	require '../db_config.php';
	$birou = file_get_contents('php://input');
	$birou = json_decode($birou);

	$sql = "INSERT INTO birouri (title) VALUES ('".$birou->title."')";
	$result = $mysqli->query($sql);

	$sql = "SELECT * FROM birouri Order by id desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>