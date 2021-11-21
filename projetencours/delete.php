<?php
require_once '../config.php';
if(isset($_POST["id"]))
{
$record_id = intval($_POST['id']);  
$query2 = "DELETE FROM fiche_detailees WHERE projetencours_id = '".$record_id."'";
if(mysqli_query($db, $query2))
{
 echo 'Data Deleted';
}
$query1 = "DELETE FROM facturation WHERE idprojet = '".$record_id."'";
if(mysqli_query($db, $query1))
{
 echo 'Data Deleted';
}
 $query = "DELETE FROM projetencours WHERE id = '".$record_id."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data Deleted';
 }
}
?>