<?php
	require '../db_config.php';
	$id  = $_GET["departament_id"];
	//echo $id;
	$sql = "SELECT birouri.id as birId,birouri.title, 'TRUE' as selected FROM departamente_birouri
	JOIN departamente ON departamente.id=departament_id
	JOIN birouri ON birouri.id=birou_id
	where departament_id=$id
	UNION 
	SELECT id,title, 'FALSE' as selected  from birouri 
	WHERE id not in (select birouri.id as birId from departamente_birouri
	JOIN departamente on departamente.id=departament_id
	JOIN birouri on birouri.id=birou_id
	WHERE departament_id=$id)";
	$result = $mysqli->query($sql);
	
	//$result = $mysqli->query($sql);

	while($row = $result->fetch_assoc()){
		$json[] = $row;
	}
	$data['data'] = $json;
	$result =  mysqli_query($mysqli,$sql);
	echo json_encode($data);	
?>