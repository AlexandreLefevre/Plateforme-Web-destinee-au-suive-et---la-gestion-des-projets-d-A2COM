<?php
require_once '../config.php';

if(isset($_POST["id"]))
{
    $query = "INSERT INTO changement_etatprojet (dateChangement, idEtatProjet, idProjetencours) values (NOW(), 4, $_POST["id"]";
 if(mysqli_query($db, $query))
 {
  echo 'Data archiver';
 }
}
?>