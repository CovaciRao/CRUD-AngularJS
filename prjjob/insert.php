<?php
include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));

$btnName=$dbhandle->real_escape_string($data->btnName);
if($btnName=='Insert'){

$id=$dbhandle->real_escape_string($data->id);
$name=$dbhandle->real_escape_string($data->name);

$query="INSERT INTO birouri (title) VALUES('".$name."')";

$dbhandle->query($query);
	}

	else {

	   $id=$dbhandle->real_escape_string($data->id);
       $name=$dbhandle->real_escape_string($data->name);
       $query="UPDATE birouri SET title = '".$name."' WHERE id=$id ";
       $dbhandle->query($query);



	}

?>