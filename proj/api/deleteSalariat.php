<?php
require '../db_config.php';
$id  = $_GET["id"];
$sql = "DELETE FROM salariati WHERE id = '".$id."'";
$result = $mysqli->query($sql);

echo json_encode([$id]);
?>