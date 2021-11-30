<?php
require_once '../config.php';

if(isset($_POST['column_name']) && isset($_POST['value']) && isset($_POST['id'])){
$column_name = mysqli_real_escape_string($db, $_POST['column_name']);
$column_value = mysqli_real_escape_string($db, $_POST['value']);
$record_id = intval($_POST['id']);

$query = "UPDATE projetvideo SET ".$column_name."='".$column_value."' WHERE id = '".$record_id."'";
if(mysqli_query($db, $query)){
 if(in_array($column_name, ['delai', 'client', 'tache'])){
        $message = "$column_name : $column_value";
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