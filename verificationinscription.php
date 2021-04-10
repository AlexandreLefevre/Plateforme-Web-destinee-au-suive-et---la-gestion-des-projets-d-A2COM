<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function swalmdp(){
    Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                    })
} -->
<!-- </script> -->
<?php
$bdd = new PDO('mysql:host=localhost;dbname=adeuxcom;charset=utf8', 'root', '');
$dbcon = mysqli_connect("localhost","root","","adeuxcom");

if(isset($_POST['submit'])) {

    $nomutilisateur = $_POST['nomutilisateur'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    // $mot_de_passe_confirm = $_POST['mot_de_passe_confirm'];
    $email = $_POST['email'];
  
    $requete_1 = $bdd->query("SELECT * FROM utilisateur where nom_utilisateur = '".$nomutilisateur."'");

    while ($donnees = $requete_1->fetch()) {
      $user[] = array('username' => $donnees['nom_utilisateur'], 'admin' => $donnees['Admin'], 'mot_de_passe' => $donnees['mot_de_passe']);
    }
    if(!$user){
      $insert_inscription  =  "insert into utilisateur
      (nom_utilisateur, mot_de_passe, Email) values
      ('$nomutilisateur', '$mot_de_passe', '$email')"
      ;
  
      $run_inscription = mysqli_query($dbcon, $insert_inscription);
      if($run_inscription){
      echo "<script>alert('L utilisateur à bien été enregistré !')</script>";
      echo "<script>window.open('Inscription.php','_seft')</script>";
      }
    }
    else{
      echo "<script>alert('Ce nom d utilisateur existe déja !')</script>";
      echo "<script>window.open('Inscription.php','_seft')</script>";
    }
}
 // deleted user
if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  $requete_1 = $bdd->query("DELETE FROM utilisateur where IdUser = '".$id."'");
 
    header("location: GestionUser.php");
}

  
?>


