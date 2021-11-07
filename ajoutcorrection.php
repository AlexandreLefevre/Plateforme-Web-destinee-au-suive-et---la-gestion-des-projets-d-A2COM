<?php
// 
require_once "config.php";

if(isset($_POST['submit'])) {

    $correction = $_POST['correction'];
    
    $requete_1 = $db->prepare("SELECT * FROM correction_projetencours where libelle = '".$correction."'");

    while ($donnees = $requete_1->fetch()) {
      $corrections[] = array('Correction' => $donnees['libelle']);
    }

    if(!isset($corrections)){
      $insert_inscription  =  "insert into correction_projetencours
      (libelle) values
      ('$correction')"
      ;
  
      $run_inscription = mysqli_query($db, $insert_inscription);
      if($run_inscription){
      echo "<script>alert('L'état de correction à bien été ajouté !')</script>";
      echo "<script>window.open('etapegraphisme.php','_seft')</script>";
      }
    }
    else{
      if(isset($correction)){
      echo "<script>alert('Cet etat de correction existe déja !')</script>";
      echo "<script>window.open('etapegraphisme.php','_seft')</script>";
      }
    }
}
 // deleted user
if(isset($_POST['delete'])){
  $id = $_POST['delete'];

  $requete_1 = ("UPDATE projetencours SET projetencours.etape_correction=1 WHERE projetencours.etape_correction = '".$id."'");
  $stmt = $db->prepare($requete_1);
  $stmt->execute();

  $requete_2 = ("DELETE FROM correction_projetencours WHERE correction_projetencours.idCorrection = '".$id."'");
  $stmt = $db->prepare($requete_2);
  $stmt->execute();
  
    header("location: etapegraphisme.php");
}

  
?>