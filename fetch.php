<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
$columns = array('nom_utilisateur', 'type_de_site');

$query = "SELECT * FROM projetencours";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE etatprojet = "En cours"
 AND (projet LIKE "%'.$_POST["search"]["value"].'%" 
 OR type_de_site LIKE "%'.$_POST["search"]["value"].'%" 
 OR graphisme LIKE "%'.$_POST["search"]["value"].'%"
 OR contenu LIKE "%'.$_POST["search"]["value"].'%"
 OR correction LIKE "%'.$_POST["search"]["value"].'%"
 OR nom_utilisateur LIKE "%'.$_POST["search"]["value"].'%"    
 )';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
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
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="vente">' . $row["vente"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="projet">' . $row["projet"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="nom_utilisateur">' . $row["nom_utilisateur"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="type_de_site">' . $row["type_de_site"] . '</div>';
   $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation">' . $row["facturation"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="graphisme">' . $row["graphisme"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contenu">' . $row["contenu"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="correction">' . $row["correction"] . '</div>';
  
 $sub_array[] = '<button type="button" name="details" class="btn btn-success btn-xs success" id="'.$row["id"].'">Details</button>';
 $sub_array[] = '<button type="button" name="archiver" class="btn btn-warning btn-xs warning" id="'.$row["id"].'">Archiver</button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM projetencours where etatprojet = 'corbeille'";
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