<?php
require '../db_config.php';
$id  = $_GET["id"];

 $post = file_get_contents('php://input');
 $tet = json_decode($post);
 
$title = $tet->title;

if($title != '') { 
$sql = "UPDATE departamente SET title = '".$title."' WHERE id = '".$id."'";
$result = $mysqli->query($sql);

$sql = "SELECT * FROM departamente WHERE id = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

}
?>