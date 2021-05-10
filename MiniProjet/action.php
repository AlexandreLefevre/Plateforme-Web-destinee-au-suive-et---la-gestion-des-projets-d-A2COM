<?php

//action.php;

$connect = new PDO("mysql:host=localhost;dbname=adeuxcom", "root", "");

if(isset($_POST["action"]))
{
 if($_POST["action"] == 'fetch_data')
 {
  $query = "
  SELECT * FROM page 
  ORDER BY page_order ASC
  ";

  $statement = $connect->prepare($query);

  $statement->execute();

  while($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
   $data[] = $row;
  }

  echo json_encode($data);
 }

 if($_POST['action'] == 'update')
 {
  for($count = 0;  $count < count($_POST["page_id_array"]); $count++)
  {
   $query = "
   UPDATE page 
   SET page_order = '".($count+1)."' 
   WHERE page_id = '".$_POST["page_id_array"][$count]."'
   ";
   $statement = $connect->prepare($query);
   $statement->execute();
  }
 }
}

?>