<?php
	require '../db_config.php';
	$salariat = file_get_contents('php://input');
    $salariat = json_decode($salariat);
    $post = file_get_contents('php://input');
    $post = json_decode($post);

	$sql = "INSERT INTO salarii (brut,salariat_id,datacalendar) VALUES ('".$post->brut."','".$post->salariat."','".$post->datacalendar."')";
	$result = $mysqli->query($sql);
	$sql = "SELECT * FROM salarii Order by id desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>