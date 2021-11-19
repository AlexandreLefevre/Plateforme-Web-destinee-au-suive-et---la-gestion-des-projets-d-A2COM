<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($db, $_POST["value"]);
 if($_POST["column_name"] == 'facturation1' or $_POST["column_name"] == 'facturation2' or $_POST["column_name"] == 'facturation3'
 or $_POST["column_name"] == 'facturation4' or $_POST["column_name"] == 'validation1' or $_POST["column_name"] == 'validation2'
 or $_POST["column_name"] == 'validation3' or $_POST["column_name"] == 'validation4'){
     $query1 = "UPDATE facturation SET ".$_POST["column_name"]."='".$value."' WHERE idprojet = '".$_POST["id"]."'";
     if(mysqli_query($db, $query1))
     {
      echo 'Data Updated';
     }
 }
 else{

    $column_name = mysqli_real_escape_string($db, $_POST['column_name']);
    $column_value = mysqli_real_escape_string($db, $_POST['value']);
    $record_id = intval($_POST['id']);
    
    $query = "UPDATE projetencours SET ".$column_name."='".$column_value."' WHERE id = '".$record_id."'";
    if(mysqli_query($db, $query))
    {
        $message = "Changed attribute $column_name to $column_value";
        add_status($record_id, $message);
        echo 'Data Updated';
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