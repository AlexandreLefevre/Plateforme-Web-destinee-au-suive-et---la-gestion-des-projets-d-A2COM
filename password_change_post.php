<?php 
    require_once 'config.php';
        if(!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token'])){
            $password = htmlspecialchars($_POST['password']);
            $password_repeat = htmlspecialchars($_POST['password_repeat']);
            $token = htmlspecialchars($_POST['token']);

            $check = $bdd->prepare('SELECT * FROM utilisateur WHERE token = ?');
            $check->execute(array($token));
            $row = $check->rowCount();

            if($row){
                if($password === $password_repeat){
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $update = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = ? WHERE token = ?');
                    $update->execute(array($password, $token));
                    
                    $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                    $delete->execute(array($token));

                    echo "<script>alert('Le mot de passe a bien été modifié !')</script>";
                    echo "<script>window.open('login.php','_seft')</script>";
                }else{
                    echo "<script>alert('Les mots de passe ne sont pas identiques !')</script>";
                    echo "<script>window.open('password_change.php','_seft')</script>";
                }
            }else{
                echo "<script>alert('Ce compte n'existe pas !')</script>";
                    echo "<script>window.open('password_change.php','_seft')</script>";
            }
        }
        else{
            echo "<script>alert('Merci de bien renseigner un mot de passe !')</script>";
                    echo "<script>window.open('password_change.php','_seft')</script>";
        }