<?php
require_once '../config.php';
require_once 'update.php';

if(isset($_POST["client"], $_POST["tache"]))
{
 $delai = date($_POST["delai"]);
 $client = mysqli_real_escape_string($db, $_POST["client"]);
 $tache = mysqli_real_escape_string($db, $_POST["tache"]);
 $chef_de_projet = mysqli_real_escape_string($db, $_POST["chef_de_projet"]);
 $type_de_projet = mysqli_real_escape_string($db,$_POST["type_de_projet"]);
 

 $query = "INSERT INTO projetvideo (delai, client, tache, projetvideo.user_id, projetvideo.typesite, order_id) 
 VALUES('$delai', '$client', '$tache', '$chef_de_projet', '$type_de_projet',0)";
 echo($query);
 if(mysqli_query($db, $query))
 {
  echo 'Data Inserted';
 }

 $lastid= mysqli_insert_id($db);

 $query2 = "INSERT INTO fiche_contact (id,projetvideo_id) VALUES('','".$lastid."')";
 if(mysqli_query($db, $query2))
 {
    $message = "Nouveau Projet vidéo Créé";
    add_status($lastid, $message);
   echo 'Data Inserted';
   if($delai != ""){
    $message = "Deadline : $delai";
    add_status($lastid, $message);
   }
   if($client != ""){
    $message = "Nom du projet vidéo : $client";
    add_status($lastid, $message);
   }
 }

}
?>