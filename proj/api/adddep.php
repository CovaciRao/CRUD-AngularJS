<?php
	require '../db_config.php';
	$departament = file_get_contents('php://input');
	$departament = json_decode($departament);
	// echo json_decode($departament);
	$value = $departament->title;
	if($value != '') { 
		$sql = "INSERT INTO departamente (title) VALUES ('".$departament->title."')";
		$result = $mysqli->query($sql);

		// $data = $result->fetch_assoc();
		$sql2 = "SELECT id FROM departamente WHERE title ='.$departament->title.'"; 
		echo $mysqli->insert_id;
	}

?>