<?php
require '../db_config.php';


$output = [];  
$data = json_decode(file_get_contents("php://input")); 

$sql = "SELECT birouri.*
from birouri 
join departamente_birouri on departamente_birouri.birou_id=birouri.id
where 1=1
and departamente_birouri.departament_id='".$data->departament_id."'"; 
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
     $json[] = $row;
}

$data= $json;
$result =  mysqli_query($mysqli,$sql);
echo json_encode($data);

?>
