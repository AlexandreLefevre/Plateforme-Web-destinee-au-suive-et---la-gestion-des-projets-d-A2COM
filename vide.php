<?php
$servername = "root";
$username = "root";
$password = "";
$bdd = new PDO('mysql:host=localhost;dbname=adeuxcom;charset=utf8', $username, $password);

$requete_1 = $bdd->query("SELECT * FROM employee ");
$listeFormateurs = array();
while ($donnees = $requete_1->fetch()) {
    $listeFormateurs[] = array('id' => $donnees['IdEmployee'], 'nom' => $donnees['pseudo']);
}

echo print_r($listeFormateurs);
?>