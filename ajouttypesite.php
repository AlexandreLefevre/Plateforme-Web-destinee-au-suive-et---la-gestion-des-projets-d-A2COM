<?php
header("Strict-Transport-Security:max-age=63072000");
// 
require_once "config.php";

if(isset($_POST['submit'])) {

    $typesite =  mysqli_real_escape_string($db, $_POST['typesite']);
    
    $requete_1 = $db->prepare("SELECT * FROM type_site where libelle = '".$typesite."'");

    while ($donnees = $requete_1->fetch()) {
      $typesites[] = array('Typedesite' => $donnees['libelle']);
    }

    if(!isset($typesites)){
      $insert_inscription  =  "insert into type_site
      (libelle) values
      ('$typesite')"
      ;
  
      $run_inscription = mysqli_query($db, $insert_inscription);
      if($run_inscription){
      echo "<script>alert('Le type de site à bien été ajouté !')</script>";
      echo "<script>window.open('typesite.php','_seft')</script>";
      }
    }
    else{
      if(isset($typesite)){
      echo "<script>alert('Ce type de site existe déja !')</script>";
      echo "<script>window.open('typesite.php','_seft')</script>";
      }
    }
}
 // deleted user
if(isset($_POST['delete'])){
  $id = intval($_POST['delete']);

  $requete_1 = ("UPDATE projetencours SET projetencours.typesite=1 WHERE projetencours.typesite = '".$id."'");
  $stmt = $db->prepare($requete_1);
  $stmt->execute();

  $requete_2 = ("UPDATE projetvideo SET projetvideo.typesite=1 WHERE projetvideo.typesite = '".$id."'");
  $stmt = $db->prepare($requete_2);
  $stmt->execute();

  $requete_3 = ("DELETE FROM type_site WHERE type_site.idTypeSite = '".$id."'");
  $stmt = $db->prepare($requete_3);
  $stmt->execute();
  
    header("location: typesite.php");
}

  
?>


