<?php
require '../db_config.php';

$sql = "SELECT salariati.id,nume,prenume,email,data_nastere,departament_id,birou_id,manager,birouri.title as birouri_title, departamente.title as departamente_title FROM salariati 
join birouri on birouri.id=birou_id
join departamente on departamente.id=departament_id
";  
$result = $mysqli->query($sql);
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()){
     $json[] = $row;
}

$data['data'] = $json;
$result =  mysqli_query($mysqli,$sql);
echo json_encode($data);


?>