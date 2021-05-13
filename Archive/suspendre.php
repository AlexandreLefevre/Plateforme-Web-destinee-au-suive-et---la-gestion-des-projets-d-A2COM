<?php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
if(isset($_POST["id"]))
{
 $query = "UPDATE projetencours SET etatprojet = 'suspendu' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data suspendu';
 }
}
?>