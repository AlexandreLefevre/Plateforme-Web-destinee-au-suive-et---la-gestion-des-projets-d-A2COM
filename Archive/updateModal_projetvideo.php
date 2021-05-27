<?php
require_once '../config.php';

if(isset($_POST["modalid"]))
{

 $id = $_POST["modalid"];
 $query = "UPDATE fiche_contact ";
 $boo = true;


 foreach(json_decode($_POST['data2']) as $key => $value){
     if($boo){
        $query.= "SET ".$key."='".$value."'";
        $boo=false;
     }
     else{
        $query.= ", ".$key."='".$value."'";
        echo($query);
     }
 }
 $query.= " WHERE projetvideo_id = $id";
 if(mysqli_query($db, $query))
 {
  echo 'Data Updated';
 }
}
?>