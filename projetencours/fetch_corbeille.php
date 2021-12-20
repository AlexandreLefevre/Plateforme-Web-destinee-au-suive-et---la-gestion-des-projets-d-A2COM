<?php
//fetch.php
require_once '../config.php';
$columns = array('vente', 'projet','nom_utilisateur','type_de_site','facturation1','validation1','graphisme','facturation2','validation2','contenu','facturation3','validation3','correction','facturation4','validation4');

$query = "SELECT projetencours.id, projetencours.user_id, projetencours.typesite, vente, facturation.facturation1, projetencours.etape_graphisme, projet, projetencours.etape_contenu, projetencours.etape_correction, facturation.facturation2, facturation.facturation3, facturation.facturation4, facturation.validation1, facturation.validation2, 
facturation.validation3, facturation.validation4, fiche_detailees.etape30, user.nom_utilisateur FROM projetencours JOIN fiche_detailees ON projetencours.id = fiche_detailees.projetencours_id 
JOIN user ON projetencours.user_id = user.IdUser JOIN type_site ON projetencours.typesite = type_site.idTypeSite JOIN graphisme_projetencours ON projetencours.etape_graphisme = graphisme_projetencours.idGraphisme
JOIN contenu_projetencours ON projetencours.etape_contenu = contenu_projetencours.idContenu JOIN correction_projetencours ON projetencours.etape_correction = correction_projetencours.idCorrection
JOIN facturation ON projetencours.id = facturation.idprojet";

$query2 = "SELECT * FROM user WHERE user.Admin = 'user'";

$query3 = "SELECT * FROM type_site";

$query4 = "SELECT * FROM graphisme_projetencours";

$query5 = "SELECT * FROM contenu_projetencours";

$query6 = "SELECT * FROM correction_projetencours";

if(isset($_POST["search"]["value"]))
{
$search = mysqli_real_escape_string($db, $_POST["search"]["value"]);
 $query .= '
 WHERE etatprojet = "corbeille"
 AND (projet LIKE "%'.$search.'%" 
 OR type_site.libelle LIKE "%'.$search.'%" 
 OR graphisme_projetencours.libelle LIKE "%'.$search.'%"
 OR contenu_projetencours.libelle LIKE "%'.$search.'%"
 OR correction_projetencours.libelle LIKE "%'.$search.'%"
 OR user.nom_utilisateur LIKE "%'.$search.'%"    
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

$result4 = mysqli_query($db, $query4);

$result5 = mysqli_query($db, $query5);

$result6 = mysqli_query($db, $query6);

$data = array();

$users = array();

$typesites = array();

$graphismes = array();

$contenus = array();

$corrections = array();

while($row = mysqli_fetch_array($result6))
{
  $corrections[] = array("id"=>$row['idCorrection'],"libele"=>$row["libelle"]);
}

while($row = mysqli_fetch_array($result5))
{
  $contenus[] = array("id"=>$row['idContenu'],"libele"=>$row["libelle"]);
}

while($row = mysqli_fetch_array($result4))
{
  $graphismes[] = array("id"=>$row['idGraphisme'],"libele"=>$row["libelle"]);
}

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
  $valide25 ='';
  switch($row["validation1"]){
    case 1 : 
      $valide25 = 'green';
      $valide25check = 'checked';
      break;
    default : 
      $valide25 = 'red';
      $valide25check = '';
      break;
  }
  $valide50 ='';
  switch($row["validation2"]){
    case 1 : 
      $valide50 = 'green';
      $valide50check = 'checked';
      break;
    default : 
      $valide50 = 'red';
      $valide50check = '';
      break;
  }
  $valide75 ='';
  switch($row["validation3"]){
    case 1 : 
      $valide75 = 'green';
      $valide75check = 'checked';
      break;
    default : 
      $valide75 = 'red';
      $valide75check = '';
      break;
  }
  $valide100 ='';
  switch($row["validation4"]){
    case 1 : 
      $valide100 = 'green';
      $valide100check = 'checked';
      break;
    default : 
      $valide100 = 'red';
      $valide100check = '';
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


 $sub_array[] = '<div contenteditable class="update '.$valide25.'" data-id="'.$row["id"].'" data-column="facturation1">' . $row["facturation1"] . '</div>';
 $sub_array[] = '<input class="update '.$valide25.'" type="checkbox" data-id="'.$row["id"].'" data-column="validation1" '.$valide25check.'>';

 //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="graphisme" '.$stylegraphisme.' >' . $row["graphisme"] . '</div>';

 $select3 = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="graphisme">';
 foreach($graphismes as $graphisme){
   if($graphisme["id"]==$row["etape_graphisme"]){
     $select3.= '<option value="'.$graphisme["id"].'"selected>'.$graphisme['libele'].'</option>';
   }
   else{
     $select3.= '<option value="'.$graphisme["id"].'">'.$graphisme['libele'].'</option>';
   }
 }
 $select3.="</select>";
 $sub_array[]= $select3;

 $sub_array[] = '<div contenteditable class="update '.$valide50.'" data-id="'.$row["id"].'" data-column="facturation2">' . $row["facturation2"] . '</div>';
 $sub_array[] = '<input class="update '.$valide50.'" type="checkbox"  data-id="'.$row["id"].'" data-column="validation2" '.$valide50check.'>';

 // $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contenu" '.$stylecontenu.' >' . $row["contenu"] . '</div>';

 $select4 = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="contenu">';
 foreach($contenus as $contenu){
   if($contenu["id"]==$row["etape_contenu"]){
     $select4.= '<option value="'.$contenu["id"].'"selected>'.$contenu['libele'].'</option>';
   }
   else{
     $select4.= '<option value="'.$contenu["id"].'">'.$contenu['libele'].'</option>';
   }
 }
 $select4.="</select>";
 $sub_array[]= $select4;

 $sub_array[] = '<div contenteditable class="update '.$valide75.'" data-id="'.$row["id"].'" data-column="facturation3">' . $row["facturation3"] . '</div>';
  $sub_array[] = '<input class="update '.$valide75.'" type="checkbox" data-id="'.$row["id"].'" data-column="validation3" '.$valide75check.'>';

  //$sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="correction" '.$stylecorrection.' >' . $row["correction"] . '</div>';

  $select5 = '<select size="1" class="update" data-id="'.$row["id"].'" data-column="correction">';
  foreach($corrections as $correction){
    if($correction["id"]==$row["etape_correction"]){
      $select5.= '<option value="'.$correction["id"].'"selected>'.$correction['libele'].'</option>';
    }
    else{
      $select5.= '<option value="'.$correction["id"].'">'.$correction['libele'].'</option>';
    }
  }
  $select5.="</select>";
  $sub_array[]= $select5;

  $sub_array[] = '<div contenteditable class="update '.$valide100.'" data-id="'.$row["id"].'" data-column="facturation4">' . $row["facturation4"] . '</div>';
  $sub_array[] = '<input class="update '.$valide100.'" type="checkbox" data-id="'.$row["id"].'" data-column="validation4" '.$valide100check.'>';
  
 $sub_array[] = '<button type="button" data-target="#myModal'.$row["id"].'" role="button" data-toggle="modal" name="details" class="btn btn-success btn-xs success" id="'.$row["id"].'"><i class="fa fa-list-alt" style="font-size:19px"></i></button>';
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