<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
$columns = array('client','commentaire_reunion');

$query = "SELECT id, client, commentaire_reunion, etatminiprojet FROM miniprojet";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE etatminiprojet = "En cours"
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

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
  $sub_array[] = '<div contenteditable class="updatemniniprojet" data-id="'.$row["id"].'" data-column="client">' . $row["client"] . '</div>';
 $sub_array[] = '<div contenteditable class="updateminiprojet" data-id="'.$row["id"].'" data-column="commentaire_reunion">' . $row["commentaire_reunion"] . '</div>';
  
 $sub_array[] = '<button type="button" name="detailsminiprojet" class="btn btn-success btn-xs detailsminiprojet" id="'.$row["id"].'" style="font-size:15px">Voir details</button>';

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