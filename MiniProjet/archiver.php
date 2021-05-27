<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
 $query = "UPDATE miniprojet SET etatminiprojet = 'archiver' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data archiver';
 }
}
?>