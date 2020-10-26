<?php
require '../db_config.php';

$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = (array)json_decode($post);
$sql='';
$sql2='';
$sql3='';
echo json_encode($post);


   foreach ($post as $posts) {
      $selected = $posts->selected;
      if ($selected == 1 ) {
         $sql2 = "SELECT COUNT(id) FROM departamente_birouri WHERE birou_id = $posts->birId AND departament_id = $id ";
         $result = $mysqli->query($sql2);
         $count = $result->fetch_assoc();
         echo json_encode($count['COUNT(id)']);
         if($count['COUNT(id)'] == 0){
            $sql = "INSERT INTO departamente_birouri (birou_id, departament_id) VALUES ($posts->birId,$id)";
            echo $sql;
            $result2 = $mysqli->query($sql);

         }
      }
      if ($selected == 0 ) {
            $sql3 ="DELETE FROM departamente_birouri where birou_id = $posts->birId AND departament_id = $id ";
            $result3 = $mysqli->query($sql3);
           // $data = $result3->fetch_assoc();
           echo $sql3;

      }
}
?>