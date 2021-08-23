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
    $query = "UPDATE projetencours SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
     echo 'Data Updated';
    }
 }

}
?>