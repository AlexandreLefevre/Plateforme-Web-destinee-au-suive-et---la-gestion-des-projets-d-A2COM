<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
 $record_id = intval($_POST['id']);
 $value = mysqli_real_escape_string($db, $_POST["value"]);
 $query = "UPDATE projetvideo SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$record_id."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data Updated';
 }
}
?>