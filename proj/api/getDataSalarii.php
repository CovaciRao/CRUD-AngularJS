<?php
require '../db_config.php';

$sql = "SELECT salarii.id,brut,net,salariat_id,datacalendar,salariati.nume as salariati_nume FROM salarii
join salariati on salariati.id=salariat_id"; 

$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()){
     $json[] = $row;
}

$data['data'] = $json;
$result =  mysqli_query($mysqli,$sql);
echo json_encode($data);
?>