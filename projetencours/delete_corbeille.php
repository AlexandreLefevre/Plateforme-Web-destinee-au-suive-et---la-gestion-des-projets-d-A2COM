<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
    $record_id = intval($_POST['id']);  
    $query = "UPDATE projetencours SET etatprojet = 'corbeille' WHERE id = '".$record_id."'";
    //$query = "INSERT INTO changement_etatprojet values (NOW(), 3, ".$_POST['id'].")";
 if(mysqli_query($db, $query))
 {
  echo 'Data Deleted';
 }
}
?>