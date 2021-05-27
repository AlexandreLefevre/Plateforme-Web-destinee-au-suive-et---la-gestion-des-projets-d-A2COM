<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
$query2 = "DELETE FROM fiche_detailees WHERE projetencours_id = '".$_POST["id"]."'";
if(mysqli_query($db, $query2))
{
 echo 'Data Deleted';
}
 $query = "DELETE FROM projetencours WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data Deleted';
 }
}
?>