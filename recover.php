<?php 
    require_once 'config.php';

    if(!empty($_GET['u']) && !empty($_GET['token']) ){
        $u = htmlspecialchars(base64_decode($_GET['u']));
        $token = htmlspecialchars(base64_decode($_GET['token']));

        $check = $db->prepare('SELECT * FROM password_recover WHERE token_user = ? AND token = ?');
        $check->execute(array($u, $token));
        $row = $check->rowCount();
        $data = $check->fetch();

        if($row){
            
            $get = $db->prepare('SELECT token FROM user WHERE token = ?');
            $get->execute(array($u));
            $data_u = $get->fetch();

            if(hash_equals($data_u['token'], $u)){

                header('Location: password_change.php?u='.base64_encode($u));
                die();
            }else{
                echo "Erreur : compte non valide";
            }
        }else{
            echo "Lien non valide";
        }
    }