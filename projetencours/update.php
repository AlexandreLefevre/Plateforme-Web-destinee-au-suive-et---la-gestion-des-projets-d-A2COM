<?php
require_once '../config.php';

if(isset($_POST['column_name']) && isset($_POST['value']) && isset($_POST['id'])){
$column_name = mysqli_real_escape_string($db, $_POST['column_name']);
$column_value = mysqli_real_escape_string($db, $_POST['value']);
$record_id = intval($_POST['id']);

if(in_array($column_name, ['facturation1', 'facturation2', 'facturation3', 'facturation4', 'validation1', 'validation2', 'validation3', 'validation4'])){
    $queryOldValue = "SELECT ".$column_name." FROM facturation WHERE idprojet = '".$record_id."'";

    $resultOld = mysqli_query($db, $queryOldValue);
    $OldValue = mysqli_fetch_array($resultOld);

     $query1 = "UPDATE facturation SET ".$column_name."='".$column_value."' WHERE idprojet = '".$record_id."'";
     if(mysqli_query($db, $query1))
     {
        if(in_array($column_name, ['validation1'])){
            if($column_value == 1){
                $message = " Validation 25% : Validé";
        add_status($record_id, $message);
        echo 'Data Updated';
            }
            else{
                $message = " Validation 25% : Pas validé";
        add_status($record_id, $message);
        echo 'Data Updated';
            }
        }
        if(in_array($column_name, ['validation2'])){
            if($column_value == 1){
            $message = " Validation 50% : Validé";
            add_status($record_id, $message);
            echo 'Data Updated';
            }
            else{
                $message = " Validation 50% : Pas validé";
        add_status($record_id, $message);
        echo 'Data Updated';
            }
        }
        if(in_array($column_name, ['validation3'])){
            if($column_value == 1){
            $message = " Validation 75% : Validé";
            add_status($record_id, $message);
            echo 'Data Updated';
            }
            else{
                $message = " Validation 75% : Pas validé";
        add_status($record_id, $message);
        echo 'Data Updated';
            }
        }
        if(in_array($column_name, ['validation4'])){
            if($column_value == 1){
            $message = " Validation 100% : Validé";
            add_status($record_id, $message);
            echo 'Data Updated';
            }
            else{
                $message = " Validation 100% : Pas validé";
        add_status($record_id, $message);
        echo 'Data Updated';
            }
        }
        if(in_array($column_name, ['facturation1'])){
            $message = " Facturation 25% : ".$OldValue[$column_name]." ---> $column_value";
            add_status($record_id, $message);
            echo 'Data Updated';
        }
        elseif(in_array($column_name, ['facturation2'])){
            $message = " Facturation 50% : ".$OldValue[$column_name]." ---> $column_value";
            add_status($record_id, $message);
            echo 'Data Updated';
        }
        elseif(in_array($column_name, ['facturation3'])){
            $message = " Facturation 75% : ".$OldValue[$column_name]." ---> $column_value";
            add_status($record_id, $message);
            echo 'Data Updated';
        }
        elseif(in_array($column_name, ['facturation4'])){
            $message = " Facturation 100% : ".$OldValue[$column_name]." ---> $column_value";
            add_status($record_id, $message);
            echo 'Data Updated';
        }
     }
 }
 else{
    $queryOldValue = "SELECT ".$column_name." FROM projetencours WHERE id = '".$record_id."'";

    $resultOld = mysqli_query($db, $queryOldValue);
    $OldValue = mysqli_fetch_array($resultOld);

    $query = "UPDATE projetencours SET ".$column_name."='".$column_value."' WHERE id = '".$record_id."'";
    if(mysqli_query($db, $query))
    {
        if(in_array($column_name, ['vente'])){
        $message = "Date de vente : ".$OldValue[$column_name]." ---> $column_value";
        add_status($record_id, $message);
        echo 'Data Updated';
        }
        elseif(in_array($column_name, ['projet'])){
            $message = "Nom du projet : ".$OldValue[$column_name]." --->  $column_value";
        add_status($record_id, $message);
        echo 'Data Updated';
        }
        elseif(in_array($column_name, ['etape_graphisme'])){
            $query2 = "SELECT * FROM graphisme_projetencours";
            $result2 = mysqli_query($db, $query2);
            $graphismes = array();
            while($row = mysqli_fetch_array($result2))
            {
                $graphismes[$row['idGraphisme']] = $row['libelle'];
            }

            $graph = $graphismes[$column_value];

            $graph2 = $graphismes[$OldValue[$column_name]];

            $message = "Etape de graphisme : $graph2 ---> $graph";
              add_status($record_id, $message);
              echo 'Data Updated';

        }
        elseif(in_array($column_name, ['etape_contenu'])){
            $query4 = "SELECT * FROM contenu_projetencours";
            $result4 = mysqli_query($db, $query4);
            $contenus = array();
            while($row = mysqli_fetch_array($result4))
            {
                $contenus[$row['idContenu']] = $row['libelle'];
            }

            $contenu = $contenus[$column_value];
            $contenu2 = $contenus[$OldValue[$column_name]];
            $message = "Etape de contenu : $contenu2 ---> $contenu";
              add_status($record_id, $message);
              echo 'Data Updated';

        }
        elseif(in_array($column_name, ['etape_correction'])){
            $query5 = "SELECT * FROM correction_projetencours";
            $result5 = mysqli_query($db, $query5);
            $corrections = array();
            while($row = mysqli_fetch_array($result5))
            {
                $corrections[$row['idCorrection']] = $row['libelle'];
            }

            $correction = $corrections[$column_value];
            $correction2 = $corrections[$OldValue[$column_name]];

            $message = "Etape de Correction : $correction2 ---> $correction";
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
            $type_site2 = $type_sites[$OldValue[$column_name]];

            $message = "Type de Site : $type_site2 ---> $type_site";
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
            $user2 = $users[$OldValue[$column_name]];

            $message = "Utilisateur : $user2 --> $user";
              add_status($record_id, $message);
              echo 'Data Updated';

        }
        else{
            $message = " $column_name : $column_value";
            add_status($record_id, $message);
            echo 'Data Updated';
        }
    }
 }
}


function add_status($project_id, $message){

    global $db;

    /* Addidional escape  */
    $project_id = intval($project_id);
    $message = mysqli_real_escape_string($db, $message);

    $date = date('Y-m-d H:i:s');
    $query = 'INSERT INTO project_status SET `project_id` = '.$project_id.', `date` = "'.$date.'", `message` = "'.$message.'"';
    mysqli_query($db, $query) or die(mysqli_error($db));
    
}
?>