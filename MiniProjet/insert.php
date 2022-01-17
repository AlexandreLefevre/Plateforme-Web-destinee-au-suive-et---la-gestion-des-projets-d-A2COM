<?php
require_once '../config.php';
require_once 'update.php';

if(isset($_POST["client"], $_POST["tache"]))
{
 $client = mysqli_real_escape_string($db, $_POST["client"]);
 $tache = mysqli_real_escape_string($db, $_POST["tache"]);
 $statut = mysqli_real_escape_string($db, $_POST["statut"]);
 $employe = mysqli_real_escape_string($db, $_POST["employe"]);
 $date_de_fin = date($_POST["date_de_fin"]);
 $notes = mysqli_real_escape_string($db, $_POST["notes"]);

 

 $query = "INSERT INTO miniprojet (client, tache, miniprojet.etape_statut, miniprojet.user_id, date_de_fin, notes) 
 VALUES('$client', '$tache', '$statut', '$employe', '$date_de_fin', '$notes')";
 echo($query);
 if(mysqli_query($db, $query))
 {
  $lastid= mysqli_insert_id($db);
  $message = "Nouveau Mini-Projet Créé";
  add_status($lastid, $message);
   echo 'Data Inserted';
   if($date_de_fin != ""){
    $message = "Deadline : $date_de_fin";
    add_status($lastid, $message);
   }
   if($client != ""){
    $message = "Nom du Mini-projet : $client";
    add_status($lastid, $message);
   }
 }

}
?>