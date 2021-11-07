<?php
// 
require_once "config.php";

if(isset($_POST['submit'])) {

    $contenu = $_POST['contenu'];
    
    $requete_1 = $db->prepare("SELECT * FROM contenu_projetencours where libelle = '".$contenu."'");

    while ($donnees = $requete_1->fetch()) {
      $contenus[] = array('Contenu' => $donnees['libelle']);
    }

    if(!isset($contenus)){
      $insert_inscription  =  "insert into contenu_projetencours
      (libelle) values
      ('$contenu')"
      ;
  
      $run_inscription = mysqli_query($db, $insert_inscription);
      if($run_inscription){
      echo "<script>alert('L'état de contenu à bien été ajouté !')</script>";
      echo "<script>window.open('etapegraphisme.php','_seft')</script>";
      }
    }
    else{
      if(isset($contenu)){
      echo "<script>alert('Cet etat de contenu existe déja !')</script>";
      echo "<script>window.open('etapegraphisme.php','_seft')</script>";
      }
    }
}
 // deleted user
if(isset($_POST['delete'])){
  $id = $_POST['delete'];

  $requete_1 = ("UPDATE projetencours SET projetencours.etape_contenu=1 WHERE projetencours.etape_contenu = '".$id."'");
  $stmt = $db->prepare($requete_1);
  $stmt->execute();

  $requete_2 = ("DELETE FROM contenu_projetencours WHERE contenu_projetencours.idContenu = '".$id."'");
  $stmt = $db->prepare($requete_2);
  $stmt->execute();
  
  
    header("location: etapegraphisme.php");
}

  
?>