<?php
//fetch.php
require_once '../config.php';

$columns = array('delai', 'client','tache','chef_de_projet','type_de_projet');

$query = "SELECT projetvideo.id, delai, client, tache, projetvideo.user_id, projetvideo.typesite, fiche_contact.lien FROM projetvideo JOIN fiche_contact ON projetvideo.id = fiche_contact.projetvideo_id JOIN user ON projetvideo.user_id = user.IdUser JOIN type_site ON projetvideo.typesite = type_site.idTypeSite";

$query2 = "SELECT * FROM user WHERE user.Admin = 'user'";

$query3 = "SELECT * FROM type_site";

if(isset($_POST["search"]["value"]))
{
 $search = mysqli_real_escape_string($db, $_POST["search"]["value"]);
 $query .= '
 WHERE etatprojetvideo = "archiver"
 AND (client LIKE "%'.$search.'%" 
 OR tache LIKE "%'.$search.'%" 
 OR user.nom_utilisateur LIKE "%'.$search.'%"
 OR type_site.libelle LIKE "%'.$search.'%"   
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

$typesites = array();

while($row = mysqli_fetch_array($result3))
{
  $typesites[] = array("id"=>$row['idTypeSite'],"libele"=>$row["libelle"]);
}

while($row = mysqli_fetch_array($result2))
{
  $users[] = array("id"=>$row['IdUser'],"nom"=>$row["nom_utilisateur"]);
}

while($row = mysqli_fetch_array($result))
{
  
 $sub_array = array();
  $sub_array[] = '<input class="update" type="date" data-id="'.$row["id"].'" data-column="delai" value="'.$row["delai"].'">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="client">' . $row["client"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="tache">' . $row["tache"] . '</div>';

 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="chef_de_projet">' . $row["chef_de_projet"] . '</div>';
 
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

 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="type_de_projet">' . $row["type_de_projet"] . '</div>';

 $select2 = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="type_de_projet">';
 foreach($typesites as $typesite){
   if($typesite["id"]==$row["typesite"]){
     $select2.= '<option value="'.$typesite["id"].'"selected>'.$typesite['libele'].'</option>';
   }
   else{
     $select2.= '<option value="'.$typesite["id"].'">'.$typesite['libele'].'</option>';
   }
 }
 $select2.="</select>";
 $sub_array[]= $select2;

$sub_array[] = '<button type="button" data-target="#myModall'.$row["id"].'" role="button" data-toggle="modal" name="details" class="btn btn-success btn-xs success" id="'.$row["id"].'"><i class="fa fa-list-alt" style="font-size:19px"></i></button>';
$sub_array[] = '<a class="btn btn-primary btn-xs lien" id="'.$row["id"].'" target="_blank" href="'.$row['lien'].'"><i class="fa fa-external-link" style="font-size:19px"></i></a>';
 $sub_array[] = '<button type="button" name="unsuspendreprojetvideo" class="btn btn-danger btn-xs unsuspendreprojetvideo" id="'.$row["id"].'"><i class="fa fa-unlock" style="font-size:19px"></i></button>';
 $sub_array[] = '<button type="button" name="deleteprojetvideo" class="btn btn-danger btn-xs deleteprojetvideo" id="'.$row["id"].'"><i class="fa fa-trash" style="font-size:19px"></i></button>';
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