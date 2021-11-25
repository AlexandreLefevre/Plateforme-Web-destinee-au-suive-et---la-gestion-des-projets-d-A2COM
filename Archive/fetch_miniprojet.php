<?php
//fetch.php
require_once '../config.php';

$columns = array('client','tache','statut','employe','date_de_fin','notes');

$query = "SELECT * FROM miniprojet JOIN user ON miniprojet.user_id = user.IdUser JOIN statut_miniprojet ON miniprojet.etape_statut = statut_miniprojet.idStatut";

$query2 = "SELECT * FROM user WHERE user.Admin = 'user'";

$query3 = "SELECT * FROM statut_miniprojet";

if(isset($_POST["search"]["value"]))
{
$search = mysqli_real_escape_string($db, $_POST["search"]["value"]);
 $query .= '
 WHERE etatminiprojet = "archiver"
 AND (client LIKE "%'.$search.'%" 
 OR tache LIKE "%'.$search.'%" 
 OR statut_miniprojet.libelle LIKE "%'.$search.'%"
 OR user.nom_utilisateur LIKE "%'.$search.'%"
 OR notes LIKE "%'.$search.'%"   
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

$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

$result = mysqli_query($db, $query . $query1);

$result2 = mysqli_query($db, $query2);

$result3 = mysqli_query($db, $query3);

$data = array();

$users = array();

$statuts = array();

while($row = mysqli_fetch_array($result3))
{
  $statuts[] = array("id"=>$row['idStatut'],"libele"=>$row["libelle"]);
}

while($row = mysqli_fetch_array($result2))
{
  $users[] = array("id"=>$row['IdUser'],"nom"=>$row["nom_utilisateur"]);
}

while($row = mysqli_fetch_array($result))
{
 
 $sub_array = array();
  $sub_array[] = '<input class="update" type="date" data-id="'.$row["id"].'" data-column="date_de_fin" value="'.$row["date_de_fin"].'">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="client">' . $row["client"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="tache">' . $row["tache"] . '</div>';

 // $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="statut" '.$stylestatut.' >' . $row["statut"] . '</div>';

 $select2 = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="statut">';
 foreach($statuts as $statut){
   if($statut["id"]==$row["etape_statut"]){
     $select2.= '<option value="'.$statut["id"].'"selected>'.$statut['libele'].'</option>';
   }
   else{
     $select2.= '<option value="'.$statut["id"].'">'.$statut['libele'].'</option>';
   }
 }
 $select2.="</select>";
 $sub_array[]= $select2;

 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="employe">' . $row["employe"] . '</div>';
 
 $select = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="employe">';
foreach($users as $user){
  if($user["id"]==$row["user_id"]){
    $select.= '<option value="'.$user["id"].'"selected>'.$user['nom'].'</option>';
  }
  else{
    $select.= '<option value="'.$user["id"].'">'.$user['nom'].'</option>';
  }
}
$select.="</select>";
$sub_array[]= $select;
 
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="notes">' . $row["notes"] . '</div>';

 
 $sub_array[] = '<button type="button" name="unsuspendre" class="btn btn-danger btn-xs unsuspendre" id="'.$row["id"].'"><i class="fa fa-unlock" style="font-size:19px"></i></button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'"><i class="fa fa-trash" style="font-size:19px"></i></button>';
 $data[] = $sub_array;
}
function get_all_data($db)
{
 $query = "SELECT * FROM miniprojet where etatminiprojet = 'corbeille'";
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