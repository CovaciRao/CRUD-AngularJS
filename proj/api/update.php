<?php
require '../db_config.php';

$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);
$sql = "UPDATE birouri SET title = '".$post->title."' WHERE id = '".$id."'";
$result = $mysqli->query($sql);

$sql = "SELECT * FROM birouri WHERE id = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);
?>