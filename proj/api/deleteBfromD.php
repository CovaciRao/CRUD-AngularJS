<?php
require '../db_config.php';
$id  = $_GET["id"];
$sql = "DELETE FROM departamente_birouri WHERE departament_id = '$id'";
$mysqli->query($sql);
$sql = "DELETE FROM salariati WHERE departament_id = '$id'";
$mysqli->query($sql);
$sql="DELETE FROM departamente WHERE id='$id'";
$mysqli->query($sql);
echo json_encode($sql);
?>