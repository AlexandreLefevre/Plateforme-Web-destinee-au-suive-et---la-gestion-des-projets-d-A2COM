<?php
require_once '../config.php';
if(isset($_POST["nom_utilisateur"], $_POST["type_de_site"]))
{
 $nom_utilisateur = $_POST["nom_utilisateur"];
 $type_de_site = $_POST["type_de_site"];
 $vente = $_POST["vente"];
 $projet = mysqli_real_escape_string($db, $_POST["projet"]);
 $facturation = mysqli_real_escape_string($db, $_POST["facturation"]);
 $graphisme = $_POST["graphisme"];
 $contenu = $_POST["contenu"];
 $correction = $_POST["correction"];
 $facturation2 = mysqli_real_escape_string($db, $_POST["facturation2"]);
 $facturation3 = mysqli_real_escape_string($db, $_POST["facturation3"]);
 $facturation4 = mysqli_real_escape_string($db, $_POST["facturation4"]);
 $valide25 = $_POST["valide25"];
 $valide50 = $_POST["valide50"];
 $valide75 = $_POST["valide75"];
 $valide100 = $_POST["valide100"];


 $query = "INSERT INTO projetencours (projetencours.user_id, projetencours.typesite, vente, projetencours.etape_graphisme, projet, projetencours.etape_contenu, projetencours.etape_correction, order_id) 
 VALUES('$nom_utilisateur', '$type_de_site', '$vente', '$graphisme', '$projet', '$contenu', '$correction',0)";
 echo($query);
 if(mysqli_query($db, $query))
 {
  echo 'Data Inserted';
 }

 $lastid= mysqli_insert_id($db);

 $query2 = "INSERT INTO fiche_detailees (id,projetencours_id) VALUES('','".$lastid."')";
 if(mysqli_query($db, $query2))
 {
  echo 'Data Inserted';
 }
}

$query3 = "INSERT INTO facturation (idprojet, facturation1, facturation2, facturation3, facturation4, validation1, validation2, validation3, validation4) 
VALUES('$lastid','$facturation', '$facturation2', '$facturation3', '$facturation4', $valide25, $valide50, $valide75, $valide100)";
echo($query);
if(mysqli_query($db, $query3))
{
 echo 'Data Inserted';
}
?>