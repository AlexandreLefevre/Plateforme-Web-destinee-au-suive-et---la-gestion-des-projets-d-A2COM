<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
    $record_id = intval($_POST['id']);  
    $query = "UPDATE projetencours SET etatprojet = 'suspendu' WHERE id = '".$record_id."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data suspendu';
 }
}
?>