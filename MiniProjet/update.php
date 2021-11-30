<?php
require_once '../config.php';

if(isset($_POST['column_name']) && isset($_POST['value']) && isset($_POST['id'])){
$column_name = mysqli_real_escape_string($db, $_POST['column_name']);
$column_value = mysqli_real_escape_string($db, $_POST['value']);
$record_id = intval($_POST['id']);

$query = "UPDATE miniprojet SET ".$column_name."='".$column_value."' WHERE id = '".$record_id."'";
if(mysqli_query($db, $query)){
 if(in_array($column_name, ['date_de_fin', 'client', 'tache', 'notes'])){
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


function add_status($miniproject_id, $message){

    global $db;

    /* Addidional escape  */
    $miniproject_id = intval($miniproject_id);
    $message = mysqli_real_escape_string($db, $message);

    $date = date('Y-m-d H:i:s');
    $query = 'INSERT INTO miniproject_status SET `miniproject_id` = '.$miniproject_id.', `date` = "'.$date.'", `message` = "'.$message.'"';
    mysqli_query($db, $query) or die(mysqli_error($db));
    
}
?>