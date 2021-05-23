<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
$columns = array('client','tache','statut','employe','date_de_fin','notes');

$query = "SELECT * FROM miniprojet";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE etatminiprojet = "corbeille"
 AND (client LIKE "%'.$_POST["search"]["value"].'%" 
 OR tache LIKE "%'.$_POST["search"]["value"].'%" 
 OR statut LIKE "%'.$_POST["search"]["value"].'%"
 OR employe LIKE "%'.$_POST["search"]["value"].'%"
 OR notes LIKE "%'.$_POST["search"]["value"].'%"   
 )';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
';
}
else
{
 $query .= 'ORDER BY order_id ASC ';
}

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 
    $stylestatut ='';
  switch($row["statut"]){
    case "Fini" : 
      $stylestatut = 'style="color:green"';
      break;
    case "En cours" : 
      $stylestatut = 'style="color:orange"';
      break;
    case "En attente" : 
      $stylestatut = 'style="color:red"';
      break;
    default : 
      $stylestatut = '';
      break;
  } 

 $sub_array = array();
  $sub_array[] = '<span class="sortable-handle"> ↕ </span><input class="update" type="date" data-id="'.$row["id"].'" data-column="date_de_fin" value="'.$row["date_de_fin"].'">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="client">' . $row["client"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="tache">' . $row["tache"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="statut" '.$stylestatut.' >' . $row["statut"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="employe">' . $row["employe"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="notes">' . $row["notes"] . '</div>';

 
 $sub_array[] = '<button type="button" name="unsuspendre" class="btn btn-danger btn-xs unsuspendre" id="'.$row["id"].'"><i class="fa fa-unlock" style="font-size:19px"></i></button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'"><i class="fa fa-trash" style="font-size:19px"></i></button>';
 $data[] = $sub_array;
}
function get_all_data($connect)
{
 $query = "SELECT * FROM miniprojet where etatminiprojet = 'corbeille'";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>