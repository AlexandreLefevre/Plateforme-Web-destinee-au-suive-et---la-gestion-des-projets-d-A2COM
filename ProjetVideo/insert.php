<?php
require_once '../config.php';
if(isset($_POST["client"], $_POST["tache"]))
{
 $delai = $_POST["delai"];
 $client = mysqli_real_escape_string($db, $_POST["client"]);
 $tache = mysqli_real_escape_string($db, $_POST["tache"]);
 $chef_de_projet = mysqli_real_escape_string($db, $_POST["chef_de_projet"]);
 $type_de_projet = mysqli_real_escape_string($db, $_POST["type_de_projet"]);
 

 $query = "INSERT INTO projetvideo (delai, client, tache, chef_de_projet, type_de_projet) 
 VALUES('$delai', '$client', '$tache', '$chef_de_projet', '$type_de_projet')";
 echo($query);
 if(mysqli_query($db, $query))
 {
  echo 'Data Inserted';
 }

 $query2 = "INSERT INTO fiche_contact (id,projetvideo_id) VALUES('','".mysqli_insert_id($db)."')";
 if(mysqli_query($db, $query2))
 {
  echo 'Data Inserted';
 }

}
?>