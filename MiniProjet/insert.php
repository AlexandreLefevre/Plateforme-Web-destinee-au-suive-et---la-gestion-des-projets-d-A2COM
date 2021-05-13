<?php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
if(isset($_POST["client"], $_POST["tache"]))
{
 $client = mysqli_real_escape_string($connect, $_POST["client"]);
 $tache = mysqli_real_escape_string($connect, $_POST["tache"]);
 $statut = mysqli_real_escape_string($connect, $_POST["statut"]);
 $employe = mysqli_real_escape_string($connect, $_POST["employe"]);
 $date_de_fin = $_POST["date_de_fin"];
 $notes = mysqli_real_escape_string($connect, $_POST["notes"]);

 $query = "INSERT INTO miniprojet (client, tache, statut, employe, date_de_fin, notes) 
 VALUES('$client', '$tache', '$statut', '$employe', '$date_de_fin', '$notes')";
 echo($query);
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }

}
?>