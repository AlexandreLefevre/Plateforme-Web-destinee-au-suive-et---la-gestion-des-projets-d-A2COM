<?php

require_once '../config.php';

$columns = array('horairechangement', 'projetvideo', 'changement');

$query = "SELECT * from videoproject_status JOIN projetvideo ON videoproject_status.videoproject_id = projetvideo.id ";

$query2 = "SELECT client from projetvideo";

if(isset($_POST["search"]["value"]))
{
  $search = mysqli_real_escape_string($db, $_POST["search"]["value"]);
  $query .= '
  WHERE videoproject_status.message LIKE "%'.$search.'%"
  OR projetvideo.client LIKE "%'.$search.'%"
  ';
}

// if(isset($_POST["order"]))
// {
//  $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
// ';
// }
// else
// {
//  $query .= 'ORDER BY date ASC ';
// }

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

$result = mysqli_query($db, $query . $query1);

$data = array();

$result2 = mysqli_query($db, $query2);


while($row = mysqli_fetch_array($result))
{
    $sub_array = array();

    $sub_array[] = '<div contenteditable data-id="'.$row["id"].'" data-column="horairechangement">' . $row["date"] . '</div>';

    $sub_array[] = '<div contenteditable data-id="'.$row["id"].'" data-column="projetvideo">' . $row["client"] . '</div>';

    $sub_array[] = '<div contenteditable data-id="'.$row["id"].'" data-column="changement">' . $row["message"] . '</div>';

    $data[] = $sub_array;

}

function get_all_data($db)
{
 $query = "SELECT * FROM videoproject_status";
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