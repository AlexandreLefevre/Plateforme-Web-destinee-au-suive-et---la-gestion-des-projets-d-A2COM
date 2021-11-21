<?php
//fetch.php
require_once '../config.php';

$columns = array('client','commentaire_reunion');

$query = "SELECT id, client, commentaire_reunion, etatprojetvideo FROM projetvideo";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE etatprojetvideo = "En cours"
 AND (order_id = "1" 
 OR order_id = "2"  
 OR order_id = "3" 
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

$query1 = '';

$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

$result = mysqli_query($db, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
  $sub_array[] = '<div contenteditable class="updateprojetvideo" data-id="'.$row["id"].'" data-column="client">' . $row["client"] . '</div>';
 $sub_array[] = '<div contenteditable class="updateprojetvideo" data-id="'.$row["id"].'" data-column="commentaire_reunion">' . $row["commentaire_reunion"] . '</div>';
  
 $sub_array[] = '<button type="button" name="detailsprojetvideo" class="btn btn-success btn-xs detailsprojetvideo" id="'.$row["id"].'" style="font-size:15px">Voir details</button>';

 $data[] = $sub_array;
}
function get_all_data($db)
{
 $query = "SELECT * FROM projetvideo where etatprojetvideo = 'corbeille'";
 $result = mysqli_query($db, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($db),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>