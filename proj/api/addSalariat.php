<?php
	require '../db_config.php';
	$departament = file_get_contents('php://input');
    $departament = json_decode($departament);
    $birou = file_get_contents('php://input');
    $birou = json_decode($birou);
    $post = file_get_contents('php://input');
    $post = json_decode($post);

	$sql = "INSERT INTO salariati (nume,prenume,email,data_nastere,departament_id,birou_id,manager) VALUES ('".$post->nume."','".$post->prenume."','".$post->email."','".$post->data_nastere."','".$post->departament."','".$post->birou."','".$post->manager."')";
	$result = $mysqli->query($sql);
	$sql = "SELECT * FROM salariati Order by id desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>