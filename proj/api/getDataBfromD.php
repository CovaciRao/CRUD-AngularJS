<?php
require '../db_config.php';


$sql = "SELECT departamente_birouri.id,birou_id,departamente.id as departID,birouri.title as birouri_title, departamente.title as departamente_title FROM departamente_birouri 
join birouri on birouri.id=birou_id
right join departamente on departamente.id=departament_id
order by departamente_title
";  
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()){
     $json[] = $row;
}

$data['data'] = $json;
$result =  mysqli_query($mysqli,$sql);
echo json_encode($data);
?>