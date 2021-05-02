<?php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
if(isset($_POST["modalid"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE fiche_detailees ";
 $boo = true;
//  foreach($_POST['data'] as $key => $value){
//      if($boo){
//         $query .= "SET ".$key."='".$value."'";
//      }
//      else{
//         $query .= ",SET ".$key."='".$value."'";
//         $boo=false;
//      }
//  }

 $query.= "Set etape29 = 'zzzzz' WHERE projetencours_id = 113";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>