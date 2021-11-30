<?php
require_once '../config.php';
require_once 'update.php';

if(isset($_POST["id"]))
{
 $record_id = intval($_POST['id']);
 $query = "UPDATE projetvideo SET etatprojetvideo = 'En cours' WHERE id = '".$record_id."'";
 if(mysqli_query($db, $query))
 {
    $message = "Etat du Projet vidéo : En cours";
    add_status($record_id, $message);
  echo 'Data unsuspendu';
 }
}
?>