<?php
require '../db_config.php';

$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);
$sql = "UPDATE salariati SET nume = '".$post->nume."', prenume = '".$post->prenume."',email = '".$post->email."',data_nastere = '".$post->data_nastere."',departament_id = '".$post->departament."',birou_id = '".$post->birou."',manager = '".$post->manager."'  WHERE id = '".$id."'";
$result = $mysqli->query($sql);

$sql = "SELECT * FROM salariati WHERE id = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);
?>