<?php
require_once '../config.php';

if(isset($_POST['column_name']) && isset($_POST['value']) && isset($_POST['id'])){
$column_name = mysqli_real_escape_string($db, $_POST['column_name']);
$column_value = mysqli_real_escape_string($db, $_POST['value']);
$record_id = intval($_POST['id']);

if(in_array($column_name, ['facturation1', 'facturation2', 'facturation3', 'facturation4', 'validation1', 'validation2', 'validation3', 'validation4'])){

     $query1 = "UPDATE facturation SET ".$column_name."='".$column_value."' WHERE idprojet = '".$record_id."'";
     if(mysqli_query($db, $query1))
     {
      echo 'Data Updated';
     }
 }
 else{
    
    $query = "UPDATE projetencours SET ".$column_name."='".$column_value."' WHERE id = '".$record_id."'";
    if(mysqli_query($db, $query))
    {
        if(in_array($column_name, ['vente', 'projet'])){
        $message = "Changed attribute $column_name to $column_value";
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