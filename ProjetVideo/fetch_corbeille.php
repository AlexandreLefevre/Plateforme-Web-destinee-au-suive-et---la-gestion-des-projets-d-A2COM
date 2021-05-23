<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "adeuxcom");
$columns = array('delai', 'client','tache','chef_de_projet','type_de_projet');

$query = "SELECT projetvideo.id, delai, client, tache, chef_de_projet, type_de_projet, fiche_contact.lien FROM projetvideo JOIN fiche_contact ON projetvideo.id = fiche_contact.projetvideo_id";

// $query = "SELECT projetvideo.id, delai, client, tache, chef_de_projet, type_de_projet FROM projetvideo";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE etatprojetvideo = "corbeille"
 AND (client LIKE "%'.$_POST["search"]["value"].'%" 
 OR tache LIKE "%'.$_POST["search"]["value"].'%" 
 OR chef_de_projet LIKE "%'.$_POST["search"]["value"].'%"
 OR type_de_projet LIKE "%'.$_POST["search"]["value"].'%"   
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
  $sub_array[] = '<span class="sortable-handle"> ↕ </span><input class="update" type="date" data-id="'.$row["id"].'" data-column="delai" value="'.$row["delai"].'">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="client">' . $row["client"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="tache">' . $row["tache"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="chef_de_projet">' . $row["chef_de_projet"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="type_de_projet">' . $row["type_de_projet"] . '</div>';

$sub_array[] = '<button type="button" data-target="#myModal'.$row["id"].'" role="button" data-toggle="modal" name="details" class="btn btn-success btn-xs success" id="'.$row["id"].'"><i class="fa fa-list-alt" style="font-size:19px"></i></button>';
$sub_array[] = '<a class="btn btn-primary btn-xs lien" id="'.$row["id"].'" target="_blank" href="'.$row['lien'].'"><i class="fa fa-external-link" style="font-size:19px"></i></a>';
 $sub_array[] = '<button type="button" name="unsuspendre" class="btn btn-danger btn-xs unsuspendre" id="'.$row["id"].'"><i class="fa fa-unlock" style="font-size:19px"></i></button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'"><i class="fa fa-trash" style="font-size:19px"></i></button>';
 $data[] = $sub_array;
}
function get_all_data($connect)
{
 $query = "SELECT * FROM projetvideo where etatprojetvideo = 'corbeille'";
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