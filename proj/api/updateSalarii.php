<?php
require '../db_config.php';

$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);
$sql = "UPDATE salarii SET brut = '".$post->brut."', salariat_id = '".$post->salariat."',datacalendar = '".$post->datacalendar."'  WHERE id = '".$id."'";
$result = $mysqli->query($sql);

$sql = "SELECT * FROM salarii WHERE id = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);
?>