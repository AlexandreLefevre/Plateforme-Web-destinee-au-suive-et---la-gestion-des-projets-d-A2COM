<?php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
if(isset($_POST["nom_utilisateur"], $_POST["type_de_site"]))
{
 $nom_utilisateur = mysqli_real_escape_string($connect, $_POST["nom_utilisateur"]);
 $type_de_site = mysqli_real_escape_string($connect, $_POST["type_de_site"]);
 $vente = mysqli_real_escape_string($connect, $_POST["vente"]);
 $projet = mysqli_real_escape_string($connect, $_POST["projet"]);
 $facturation = mysqli_real_escape_string($connect, $_POST["facturation"]);
 $graphisme = mysqli_real_escape_string($connect, $_POST["graphisme"]);
 $contenu = mysqli_real_escape_string($connect, $_POST["contenu"]);
 $correction = mysqli_real_escape_string($connect, $_POST["correction"]);
 


 $query = "INSERT INTO projetencours (nom_utilisateur, type_de_site, vente, facturation, graphisme, projet, contenu, correction) 
 VALUES('$nom_utilisateur', '$type_de_site', '$vente', '$facturation', '$graphisme', '$projet', '$contenu', '$correction')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>