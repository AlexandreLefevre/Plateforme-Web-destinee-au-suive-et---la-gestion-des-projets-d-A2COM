<?php
require_once '../config.php';

if(isset($_POST["client"], $_POST["tache"]))
{
 $client = mysqli_real_escape_string($db, $_POST["client"]);
 $tache = mysqli_real_escape_string($db, $_POST["tache"]);
 $statut = mysqli_real_escape_string($db, $_POST["statut"]);
 $employe = $_POST["employe"];
 $date_de_fin = $_POST["date_de_fin"];
 $notes = mysqli_real_escape_string($db, $_POST["notes"]);

 $query = "INSERT INTO miniprojet (client, tache, statut, miniprojet.user_id, date_de_fin, notes) 
 VALUES('$client', '$tache', '$statut', '$employe', '$date_de_fin', '$notes')";
 echo($query);
 if(mysqli_query($db, $query))
 {
  echo 'Data Inserted';
 }

}
?>