<?php
	require '../db_config.php';
	 
	$post = file_get_contents('php://input');
	$post = json_decode($post, true);
	$sql = '';

	for ($i=0; $i< count($post['birouri']); $i++){

		$sql .= "INSERT INTO departamente_birouri (birou_id, departament_id) VALUES ('".$post['birouri'][$i]['id']."','".$post['idDepartament']."'); ";
	}
	
	echo $sql;

	$result = $mysqli->multi_query($sql);
	if ($result) {
		// inserted successfully
		echo "New records created successfully";
	}
	else {
		// failed miserably
		echo "could not insert into departamente_birouri";
	}
	// $data = $result->fetch_assoc();	
	

	//  $sql = "SELECT * FROM departamente_birouri Order by id desc LIMIT 1"; 
	//  $result = $mysqli->query($sql);
	//  $data = $result->fetch_assoc();
	
	//  echo json_encode($data);
?>