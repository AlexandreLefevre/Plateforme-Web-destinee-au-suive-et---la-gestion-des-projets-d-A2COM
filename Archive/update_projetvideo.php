<?php
require_once '../config.php';

if(isset($_POST['column_name']) && isset($_POST['value']) && isset($_POST['id'])){
$column_name = mysqli_real_escape_string($db, $_POST['column_name']);
$column_value = mysqli_real_escape_string($db, $_POST['value']);
$record_id = intval($_POST['id']);

$query = "UPDATE projetvideo SET ".$column_name."='".$column_value."' WHERE id = '".$record_id."'";
if(mysqli_query($db, $query)){
 if(in_array($column_name, ['delai'])){
        $message = "Deadline : $column_value";
        add_status($record_id, $message);
        echo 'Data Updated';
        }
       elseif(in_array($column_name, ['tache'])){
            $message = " Tache à faire : $column_value";
            add_status($record_id, $message);
            echo 'Data Updated';
        }
        elseif(in_array($column_name, ['client'])){
            $message = " Nom du projet vidéo : $column_value";
            add_status($record_id, $message);
            echo 'Data Updated';
        }
        elseif(in_array($column_name, ['user_id'])){
            $query3 = "SELECT * FROM user";
            $result3 = mysqli_query($db, $query3);
            $users = array();
            while($row = mysqli_fetch_array($result3))
            {
                $users[$row['IdUser']] = $row['nom_utilisateur'];
            }

            $user = $users[$column_value];

            $message = "Utilisateur : $user";
              add_status($record_id, $message);
              echo 'Data Updated';

        }
        elseif(in_array($column_name, ['typesite'])){
            $query6 = "SELECT * FROM type_site";
            $result6 = mysqli_query($db, $query6);
            $type_sites = array();
            while($row = mysqli_fetch_array($result6))
            {
                $type_sites[$row['idTypeSite']] = $row['libelle'];
            }

            $type_site= $type_sites[$column_value];

            $message = "Type de Site : $type_site";
              add_status($record_id, $message);
              echo 'Data Updated';

        }
    }
}


function add_status($videoproject_id, $message){

    global $db;

    /* Addidional escape  */
    $videoproject_id = intval($videoproject_id);
    $message = mysqli_real_escape_string($db, $message);

    $date = date('Y-m-d H:i:s');
    $query = 'INSERT INTO videoproject_status SET `videoproject_id` = '.$videoproject_id.', `date` = "'.$date.'", `message` = "'.$message.'"';
    mysqli_query($db, $query) or die(mysqli_error($db));
    
}
?>