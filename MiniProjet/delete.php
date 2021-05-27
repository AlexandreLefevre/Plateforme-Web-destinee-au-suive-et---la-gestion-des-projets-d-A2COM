<?php
require_once '../config.php';

if(isset($_POST["id"]))
{
 $query = "DELETE FROM miniprojet WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data Deleted';
 }
}
?>