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

$dbcon = mysqli_connect("localhost","root","","adeuxcom");

if(isset($_POST['submit'])) {

    $nomutilisateur = $_POST['nomutilisateur'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $mot_de_passe_confirm = $_POST['mot_de_passe_confirm'];
    $email = $_POST['email'];
  
    
    if($_POST['mot_de_passe'] != $_POST['mot_de_passe_confirm']){
        echo "<script>alert('Les mots de passes ne sont pas identiques !')</script>";
        echo "<script>window.open('Inscription.php','_seft')</script>";
      }
      else{
    
      $insert_inscription  =  "insert into utilisateur
      (nom_utilisateur, mot_de_passe, Email) values
      ('$nomutilisateur', '$mot_de_passe', '$email')"
      ;
  
      $run_inscription = mysqli_query($dbcon, $insert_inscription);
      echo "<script>alert('L'utilisateur à bien été enregistré !')</script>";
      echo "<script>window.open('Inscription.php','_seft')</script>";
      }
    }
// return true;
// return json_encode(array('error'=>true))
?>


