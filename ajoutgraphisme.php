<?php
// 
header("Strict-Transport-Security:max-age=63072000");
require_once "config.php";

if(isset($_POST['submit'])) {

    $graphisme = $_POST['graphisme'];
    
    $requete_1 = $db->prepare("SELECT * FROM graphisme_projetencours where libelle = '".$graphisme."'");

    while ($donnees = $requete_1->fetch()) {
      $graphismes[] = array('Graphisme' => $donnees['libelle']);
    }

    if(!isset($graphismes)){
      $insert_inscription  =  "insert into graphisme_projetencours
      (libelle) values
      ('$graphisme')"
      ;
  
      $run_inscription = mysqli_query($db, $insert_inscription);
      if($run_inscription){
      echo "<script>alert('L'état de graphisme à bien été ajouté !')</script>";
      echo "<script>window.open('etapegraphisme.php','_seft')</script>";
      }
    }
    else{
      if(isset($graphisme)){
      echo "<script>alert('Cet etat de graphisme existe déja !')</script>";
      echo "<script>window.open('etapegraphisme.php','_seft')</script>";
      }
    }
}
 // deleted user
if(isset($_POST['delete'])){
  $id = $_POST['delete'];

  $requete_1 = ("UPDATE projetencours SET projetencours.etape_graphisme=1 WHERE projetencours.etape_graphisme = '".$id."'");
  $stmt = $db->prepare($requete_1);
  $stmt->execute();

  $requete_2 = ("DELETE FROM graphisme_projetencours WHERE graphisme_projetencours.idGraphisme = '".$id."'");
  $stmt = $db->prepare($requete_2);
  $stmt->execute();
  
    header("location: etapegraphisme.php");
}

  
?>
  