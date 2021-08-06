<?php
//fetch.php
require_once '../config.php';
$columns = array('vente', 'projet','nom_utilisateur','type_de_site','facturation','valide25','graphisme','facturation2','valide50','contenu','facturation3','valide75','correction','facturation4','valide100');

$query = "SELECT projetencours.id, projetencours.user_id, projetencours.typesite, vente, facturation, graphisme, projet, contenu, correction, facturation2, facturation3, facturation4, valide25, valide50, 
valide75, valide100, fiche_detailees.etape30, user.nom_utilisateur FROM projetencours JOIN fiche_detailees ON projetencours.id = fiche_detailees.projetencours_id 
JOIN user ON projetencours.user_id = user.IdUser JOIN type_site ON projetencours.typesite = type_site.idTypeSite ";

$query2 = "SELECT * FROM user WHERE user.Admin = 'user'";

$query3 = "SELECT * FROM type_site";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE etatprojet = "corbeille"
 AND (projet LIKE "%'.$_POST["search"]["value"].'%" 
 OR type_site.libelle LIKE "%'.$_POST["search"]["value"].'%" 
 OR graphisme LIKE "%'.$_POST["search"]["value"].'%"
 OR contenu LIKE "%'.$_POST["search"]["value"].'%"
 OR correction LIKE "%'.$_POST["search"]["value"].'%"
 OR user.nom_utilisateur LIKE "%'.$_POST["search"]["value"].'%"    
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
  $stylegraphisme ='';
  switch($row["graphisme"]){
    case "Fini" : 
      $stylegraphisme = 'style="color:green"';
      break;
    case "En cours" : 
      $stylegraphisme = 'style="color:orange"';
      break;
    case "En attente" : 
      $stylegraphisme = 'style="color:red"';
      break;
    default : 
      $stylegraphisme = '';
      break;
  }
  $stylecontenu ='';
  switch($row["contenu"]){
    case "Fini" : 
      $stylecontenu  = 'style="color:green"';
      break;
    case "En cours" : 
      $stylecontenu  = 'style="color:orange"';
      break;
    case "En attente" : 
      $stylecontenu = 'style="color:red"';
      break;
    default : 
      $stylecontenu  = '';
      break;
  }
  $stylecorrection ='';
  switch($row["correction"]){
    case "Fini" : 
      $stylecorrection  = 'style="color:green"';
      break;
    case "En cours" : 
      $stylecorrection  = 'style="color:orange"';
      break;
    case "En attente" : 
      $stylecorrection= 'style="color:red"';
      break;
    default : 
      $stylecorrection  = '';
      break;
  }
  $valide25 ='';
  switch($row["valide25"]){
    case 0 : 
      $valide25  = 'style="color:red"';
      break;
    case 1 : 
      $valide25  = 'style="color:green" checked';
      break;
    default : 
      $valide25  = 'style="color:red"';
      break;
  }
  $valide50 ='';
  switch($row["valide50"]){
    case 0 : 
      $valide50  = 'style="color:red"';
      break;
    case 1 : 
      $valide50 = 'style="color:green" checked';
      break;
    default : 
      $valide50  = 'style="color:red"';
      break;
  }
  $valide75 ='';
  switch($row["valide75"]){
    case 0 : 
      $valide75  = 'style="color:red"';
      break;
    case 1 : 
      $valide75  = 'style="color:green" checked';
      break;
    default : 
      $valide75  = 'style="color:red"';
      break;
  }
  $valide100 ='';
  switch($row["valide100"]){
    case 0 : 
      $valide100  = 'style="color:red"';
      break;
    case 1 : 
      $valide100  = 'style="color:green" checked';
      break;
    default : 
      $valide100  = 'style="color:red"';
      break;
  }

  
 $sub_array = array();
  $sub_array[] = '<span class="sortable-handle"> ↕ </span><input class="update" type="date" data-id="'.$row["id"].'" data-column="vente" value="'.$row["vente"].'">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="projet">' . $row["projet"] . '</div>';
//  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="nom_utilisateur">' . $row["nom_utilisateur"] . '</div>';

$select = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="nom_utilisateur">';
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

 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="type_de_site">' . $row["type_de_site"] . '</div>';

 $select2 = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="type_de_site">';
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


 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation" '.$valide25.'>' . $row["facturation"] . '</div>';
 $sub_array[] = '<input class="update" type="checkbox" '.$valide25.' data-id="'.$row["id"].'" data-column="valide25">';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="graphisme" '.$stylegraphisme.' >' . $row["graphisme"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation2" '.$valide50.'>' . $row["facturation2"] . '</div>';
 $sub_array[] = '<input class="update" type="checkbox" '.$valide50.' data-id="'.$row["id"].'" data-column="valide50">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contenu" '.$stylecontenu.' >' . $row["contenu"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation3" '.$valide75.'>' . $row["facturation3"] . '</div>';
  $sub_array[] = '<input class="update" type="checkbox" '.$valide75.' data-id="'.$row["id"].'" data-column="valide75">';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="correction" '.$stylecorrection.' >' . $row["correction"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="facturation4" '.$valide100.'>' . $row["facturation4"] . '</div>';
  $sub_array[] = '<input class="update" type="checkbox" '.$valide100.' data-id="'.$row["id"].'" data-column="valide100">';
  
 $sub_array[] = '<button type="button" data-target="#myModal'.$row["id"].'" role="button" data-toggle="modal" name="details" class="btn btn-success btn-xs success" id="'.$row["id"].'"><i class="fa fa-list-alt" style="font-size:19px"></i></button>';
 $sub_array[] = '<a class="btn btn-primary btn-xs lien" id="'.$row["id"].'" target="_blank" href="'.$row['etape30'].'"><i class="fa fa-external-link" style="font-size:19px"></i></a>';
 $sub_array[] = '<button type="button" name="unsuspendre" class="btn btn-danger btn-xs unsuspendre" id="'.$row["id"].'"><i class="fa fa-unlock" style="font-size:19px"></i></button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'"><i class="fa fa-trash" style="font-size:19px"></i></button>';
 $data[] = $sub_array;
}

function get_all_data($db)
{
 $query = "SELECT * FROM projetencours where etatprojet = 'corbeille'";
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