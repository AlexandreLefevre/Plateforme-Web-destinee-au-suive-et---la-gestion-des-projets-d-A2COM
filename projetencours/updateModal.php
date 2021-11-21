<?php
require_once '../config.php';
if(isset($_POST["modalid"]))
{
 $id = intval($_POST["modalid"]);
 $query = "UPDATE fiche_detailees ";
 $boo = true;


 foreach(json_decode($_POST['data']) as $key => $value){
     if($boo){
        $query.= "SET ".$key."='".$value."'";
        $boo=false;
     }
     else{
        $query.= ", ".$key."='".$value."'";
     }
 }

 $query.= " WHERE projetencours_id = $id";
 if(mysqli_query($db, $query))
 {
  echo 'Data Updated';
 }
}
?>