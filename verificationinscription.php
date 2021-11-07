<?php
// 
require_once "config.php";

if(isset($_POST['submit'])) {

    $nomutilisateur = $_POST['nomutilisateur'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $token = md5(uniqid($nomutilisateur, true));
    $requete_1 = $db->prepare("SELECT * FROM user where nom_utilisateur = '".$nomutilisateur."'");

    while ($donnees = $requete_1->fetch()) {
      $user[] = array('username' => $donnees['nom_utilisateur'], 'admin' => $donnees['Admin'], 'mot_de_passe' => $donnees['mot_de_passe']);
    }
    $requete_1 = $db->prepare("SELECT * FROM user where Email = '".$email."'");

    while ($donnees = $requete_1->fetch()) {
      $userEmail[] = array('username' => $donnees['nom_utilisateur'], 'admin' => $donnees['Admin'], 'mot_de_passe' => $donnees['mot_de_passe'], 'Email' => $donnees['Email']);
    }
    if(!isset($user) && !isset($userEmail)){
      $insert_inscription  =  "insert into user
      (nom_utilisateur, mot_de_passe, Email, token) values
      ('$nomutilisateur', '$mot_de_passe', '$email','$token')"
      ;
  
      $run_inscription = mysqli_query($db, $insert_inscription);
      if($run_inscription){
      echo "<script>alert('L utilisateur à bien été enregistré !')</script>";
      echo "<script>window.open('Inscription.php','_seft')</script>";
      }
    }
    else{
      if(isset($user)){
      echo "<script>alert('Ce nom d utilisateur existe déja !')</script>";
      echo "<script>window.open('Inscription.php','_seft')</script>";
      }
      if(isset($userEmail)){
        echo "<script>alert('Cet émail existe déja !')</script>";
        echo "<script>window.open('Inscription.php','_seft')</script>";
        }
    }
}
 // deleted user
if(isset($_POST['delete'])){
  $id = $_POST['delete'];

  $requete_1 = ("UPDATE projetencours SET projetencours.user_id=70 WHERE projetencours.user_id = '".$id."'");
  $stmt = $db->prepare($requete_1);
  $stmt->execute();

  $requete_2 = ("UPDATE miniprojet SET miniprojet.user_id=70 WHERE miniprojet.user_id = '".$id."'");
  $stmt = $db->prepare($requete_2);
  $stmt->execute();

  $requete_3 = ("UPDATE projetvideo SET projetvideo.user_id=70 WHERE projetvideo.user_id = '".$id."'");
  $stmt = $db->prepare($requete_3);
  $stmt->execute();

  $requete_4 = ("DELETE FROM user WHERE user.IdUser = '".$id."'");
  $stmt = $db->prepare($requete_4);
  $stmt->execute();


    header("location: GestionUser.php");
}

  
?>


