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
 $etatprojet = mysqli_real_escape_string($connect, $_POST["etat_projet"]);
 $facturation2 = mysqli_real_escape_string($connect, $_POST["facturation2"]);
 $facturation3 = mysqli_real_escape_string($connect, $_POST["facturation3"]);
 $facturation4 = mysqli_real_escape_string($connect, $_POST["facturation4"]);

 

 $query = "INSERT INTO projetencours (nom_utilisateur, type_de_site, vente, facturation, graphisme, projet, contenu, correction, facturation2, facturation3, facturation4) 
 VALUES('$nom_utilisateur', '$type_de_site', '$vente', '$facturation', '$graphisme', '$projet', '$contenu', '$correction', '$facturation2', '$facturation3', '$facturation4')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }

 $query2 = "INSERT INTO fiche_detailees (id,projetencours_id) VALUES('','".mysqli_insert_id($connect)."')";
 if(mysqli_query($connect, $query2))
 {
  echo 'Data Inserted';
 }
}
?>