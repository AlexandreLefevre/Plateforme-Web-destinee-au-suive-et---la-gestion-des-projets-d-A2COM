<?php
require_once '../config.php';
session_start();
if(isset($_SESSION['username'])){

}
else{
    header('Location: login.php');
}

$query = "SELECT projetencours.id,etape1,etape2,etape3,etape4,etape5,etape6,etape7,etape8,etape9,etape10,etape11,etape12,etape13,etape14,etape15,etape16,etape17,etape18,etape19,etape20,etape21,etape22,etape23,etape24,etape25,etape26,etape27,etape28,etape29,etape30, project_substeps.* FROM projetencours JOIN fiche_detailees ON projetencours.id=fiche_detailees.projetencours_id JOIN project_substeps ON projetencours.id = project_substeps.project_id";

$query2 = "SELECT * FROM user WHERE user.Admin = 'user'";

$query3 = "SELECT * FROM type_site";

$query4 = "SELECT * FROM graphisme_projetencours";

$query5 = "SELECT * FROM contenu_projetencours";

$query6 = "SELECT * FROM correction_projetencours";

$result = mysqli_query($db, $query);

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


$project_status = [];

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $id = $row['id'];
  $substep_id = $row['substep_id'];

  if(!isset($data[$id])) $data[$id] = $row;
  
  if(!isset($project_status[$id])) $project_status[$id] = [];
  $project_status[$id][] = $substep_id;
}

$substeps = get_substeps_array();

?>
<html>
 <head>
  <title>Projet en Cours</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
  <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="../package/dist/sweetalert2.min.js"></script>
  <script src="../package/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../package/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="css/tableauprojet.css"/>
  <link rel="stylesheet" href="css/header.css">
  <link rel="icon" href="../images/Favicon-A2com.ico">

<!-- Start Navbar Area -->
<div class="navbar-area">
	<!-- Menu For Desktop Device -->
	<div class="main-nav">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
          <li class="nav-item">
          </li>
          <?php if($_SESSION['Admin']=='user'): ?>
						<li class="nav-item">
							<a href="../dashboard/dashboard.php" class="nav-link">Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="ProjetEnCous.php" class="nav-link">Projet en cours</a>
						</li>
						<li class="nav-item">
							<a href="../MiniProjet/MiniProjet.php" class="nav-link">Mini-Projet</a>
						</li>
						<li class="nav-item">
							<a href="../ProjetVideo/ProjetVideo.php" class="nav-link">Projet video</a>
						</li>
						<li class="nav-item">
							<a href="../Archive/Archives.php" class="nav-link">Archives</a>
						</li>
            <?php else: ?>
            <li class="nav-item">
							<a href="Inscription.php" class="nav-link">Création de compte</a>
						</li>
            <li class="nav-item">
							<a href="GestionUser.php" class="nav-link">Gestion des utilisateurs</a>
						</li>
            <?php endif; ?>
            <li class="nav-item">
               <a href="../logout.php">Déconnexion</a>
           </li>
					</ul>
    </div>
  </div>
</div>

 </head>
 <body>
  <div class="container box" style="margin-top:150px">
   <div class="table">
   <h3 style="text-align: center;">Projet en cours</h3>
    <div align="right">
    <button type="button" name="corbeille" id="corbeille" class="btn btn-danger">Corbeille</button>
     <button type="button" name="add" id="add" class="btn btn-info">Ajouter</button>
     <button type="button" name="log" id="log" class="btn btn-warning">Logs</button>
    </div>
    <table id="user_data" class="table table-bordered">
     <thead>
      <tr>
                      <th>Vente</th>
                      <th>Projet</th>
                      <th data-orderable="false">Text</th>
                      <th data-orderable="false">Type de site</th>
                      <th data-orderable="false">25%</th>
                      <th></th>
                      <th data-orderable="false">Graphisme</th>
                      <th data-orderable="false">50%</th>
                      <th></th>
                      <th data-orderable="false">Contenu</th>
                      <th data-orderable="false">75%</th>
                      <th></th>
                      <th data-orderable="false">Correction</th>
                      <th data-orderable="false">100%</th>
                      <th></th>
       <th id="th1" data-orderable="false"></th>
       <th data-orderable="false"></th>
       <th data-orderable="false"></th>
       <th data-orderable="false"></th>
       <th data-orderable="false"></th>
      </tr>
     </thead>
    </table>
  </div>
</div>

<div class="container box">
   <div class="table">
   <h3 style="text-align: center;">Projet Suspendu</h3>
    <table id="user_data2" class="table table-bordered">
     <thead>
      <tr>
                      <th>Vente</th>
                      <th>Projet</th>
                      <th data-orderable="false">Text</th>
                      <th data-orderable="false">Type de site</th>
                      <th data-orderable="false">25%</th>
                      <th></th>
                      <th data-orderable="false">Graphisme</th>
                      <th data-orderable="false">50%</th>
                      <th></th>
                      <th data-orderable="false">Contenu</th>
                      <th data-orderable="false">75%</th>
                      <th></th>
                      <th data-orderable="false">Correction</th>
                      <th data-orderable="false">100%</th>
                      <th></th>
       <th id="th1" data-orderable="false"></th>
       <th data-orderable="false"></th>
       <th data-orderable="false"></th>
      </tr>
     </thead>
    </table>
  </div>
</div>

<?php foreach ($data as $row):?>
<div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Fiche Détaillées</h4>
      </div>
      <div class="modal-body">

      <?php $etapes = !empty($project_status[$row['id']]) ? $project_status[$row['id']] : []; ?>

       <div class="row">
        <?php foreach($substeps as $substep_id => $substep_name) : ?>      
          <div class="col-lg-6 col-md-4 col-sm-3">
            <label>
              <input type="checkbox" name="<?=$substep_id?>" <?=in_array($substep_id, $etapes) ? 'checked' : null; ?>>
              <?=$substep_name?>
            </label>
          </div>
        <?php endforeach; ?>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="savemodal" class="btn btn-primary" data-dismiss="modal" onclick="saveModal('<?php echo $row['id'] ?>')">Sauvegarder</button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>

 </body>
</html>

<script type="text/javascript" language="javascript" >

function saveModal(modalid){
  var etapes = [];
  var inputs = "#myModal" + modalid + " input";
  $(inputs).each( function () {
        if($(this).is(':checked')){
          var etape_id = $(this).prop('name');
          etapes.push(etape_id);
        }
  });
  $.ajax({
      url:"updateModal.php",
      method:"POST",
      data:{
        modalid: modalid,
        etapes: etapes
      }
  });

}


$('.modal.fade').on('hide.bs.modal', function(e) {
  console.log('hidden');

});

 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
  var dragSrc = null; 
  var cells = null;  
   var dataTable = $('#user_data').DataTable({
    lengthMenu: [[10, 20, -1], [10, 20, "Tout"]],
    processing : true,
    order: [],
    serverSide : true,
    language: {
      lengthMenu:    "Afficher _MENU_ projets",
        search: "Rechercher:",
        
        processing:     "Traitement en cours...",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        loadingRecords: "Chargement en cours...",
        zeroRecords: "Aucune données trouvée",
        infoFiltered: "",
        info:"Affichage de projet _START_ &agrave; _END_ sur _TOTAL_",
        infoEmpty:      "Affichage de projet; 0 sur 0",
        paginate: {
            first:      "Premier",
            previous:   "Pr&eacute;c&eacute;dent",
            next:       "Suivant",
            last:       "Dernier"
        },
      },
    ajax : {
     url:"fetch.php",
     type:"POST"
    },

   });
  }

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#user_data').DataTable().destroy();
     $('#user_data2').DataTable().destroy();
     fetch_data();
    }
   });
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
    if(column_name == 'validation1'){
    var value = $(this).val();
    if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'validation2'){
    var value = $(this).val();
      if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'validation3'){
      var value = $(this).val();
      if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'validation4'){
      var value = $(this).val();
      if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'vente'){
      var value = $(this).val();
    }
    if(column_name == 'nom_utilisateur'){
      var value = $(this).val();
      column_name = "user_id";
    }
    if(column_name == 'type_de_site'){
      var value = $(this).val();
      column_name = "typesite";
    }
    if(column_name == 'graphisme'){
      var value = $(this).val();
      column_name = "etape_graphisme";
    }
    if(column_name == 'contenu'){
      var value = $(this).val();
      column_name = "etape_contenu";
    }
    if(column_name == 'correction'){
      var value = $(this).val();
      column_name = "etape_correction";
    }
   update_data(id, column_name, value);
  });


  $('#add').click(function(){
   var html = '<tr data-unsortable>';
   html += '<td id="data1"><input type="date" id="start" name="trip-start" style="font-size: 1.7rem"></td>';
   html += '<td contenteditable id="data2"></td>';
  //  html += '<td contenteditable id="data3"></td>';

  html += '<td contenteditable><select size="1" id="data3">';
  <?php foreach ($users as $user):?>
  html += '<option value=<?php echo $user["id"] ?>><?php echo $user['nom']?></option>'; 
  <?php endforeach; ?>

html +="</select></td>";

  // html += '<td contenteditable id="data4"></td>';

  html += '<td contenteditable><select size="1" id="data4">';
  <?php foreach ($typesites as $typesite):?>
  html += '<option value=<?php echo $typesite["id"] ?>><?php echo $typesite['libele']?></option>'; 
  <?php endforeach; ?>

html +="</select></td>";

   html += '<td contenteditable id="data5"></td>';
   html += '<td id="data6"><input type="checkbox" name="valide25"></td>';

  // html += '<td contenteditable id="data7"></td>';

  html += '<td contenteditable><select size="1" id="data7">';
  <?php foreach ($graphismes as $graphisme):?>
  html += '<option value=<?php echo $graphisme["id"] ?>><?php echo $graphisme['libele']?></option>'; 
  <?php endforeach; ?>

html +="</select></td>";

   html += '<td contenteditable id="data8"></td>';
   html += '<td id="data9"><input type="checkbox" name="valide50"></td>';

  // html += '<td contenteditable id="data10"></td>';

  html += '<td contenteditable><select size="1" id="data10">';
  <?php foreach ($contenus as $contenu):?>
  html += '<option value=<?php echo $contenu["id"] ?>><?php echo $contenu['libele']?></option>'; 
  <?php endforeach; ?>


   html += '<td contenteditable id="data11"></td>';
   html += '<td id="data12"><input type="checkbox" name="valide75"></td>';

 //  html += '<td contenteditable id="data13"></td>';

 html += '<td contenteditable><select size="1" id="data13">';
  <?php foreach ($corrections as $correction):?>
  html += '<option value=<?php echo $correction["id"] ?>><?php echo $correction['libele']?></option>'; 
  <?php endforeach; ?>

   html += '<td contenteditable id="data14"></td>';
   html += '<td id="data15"><input type="checkbox" name="valide100"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $('#corbeille').click(function(){
    document.location.href="corbeille.php"; 
  });

  $('#log').click(function(){
    document.location.href="logs.php"; 
  });

  $(document).on('click', '#insert', function(){
   var vente = $('#data1 input').val();
   var projet = $('#data2').text();
   var nom_utilisateur = $('#data3').val();

var type_de_site = $('#data4').val();
var facturation25 = $('#data5').text();
var valide25 = $('#data6 input').is(":checked")==true?true:false;
var graphisme = $('#data7').val();
var facturation50 = $('#data8').text();
var valide50 = $('#data9 input').is(":checked")==true?true:false;
var contenu = $('#data10').val();
var facturation75 = $('#data11').text();
var valide75 = $('#data12 input').is(":checked")==true?true:false;
var correction = $('#data13').val();
var facturation100 = $('#data14').text();
var valide100 = $('#data15 input').is(":checked")==true?true:false;

   if(projet != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{nom_utilisateur:nom_utilisateur, type_de_site:type_de_site, vente:vente, projet:projet, facturation:facturation25, valide25:valide25, graphisme:graphisme, contenu:contenu, correction:correction, facturation2:facturation50, valide50:valide50, facturation3:facturation75, valide75:valide75, facturation4:facturation100, valide100:valide100},
     success:function(data)
     {
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
 }
   else
   {
    alert("Il faut un nom de projet !");
   }
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous placer ce projet en corbeille ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"delete_corbeille.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data').DataTable().destroy();
              fetch_data();
              Swal.fire('Le projet à été déplacé en corbeille', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été mis en corbeille', '', 'info')
      }
    })
   }  
  );


  $(document).on('click', '.archiver', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous archiver ce projet ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"archiver.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data').DataTable().destroy();
              fetch_data();
              Swal.fire('Le projet à été archivé', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été archivé', '', 'info')
      }
    })
   }  
  );

  $(document).on('click', '.suspendre', function(e){
  e.preventDefault();
   var id = $(this).attr("id");
   Swal.fire({
      title: 'Voulez-vous suspendre ce projet ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"suspendre.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data').DataTable().destroy();
              fetch_data();
            }
        });
        document.location.reload();
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été suspendu', '', 'info')
      }
    })
   }  
  );


});

// Tableau des projets suspendu

$(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
  var dragSrc = null;
  var cells = null;
   var dataTable = $('#user_data2').DataTable({
    lengthMenu: [[10, 20, -1], [10, 20, "Tout"]],
    processing : true,
    order: [],
    serverSide : true,
    language: {
      lengthMenu:    "Afficher _MENU_ projets",
        search: "Rechercher:",
        
        processing:     "Traitement en cours...",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        loadingRecords: "Chargement en cours...",
        zeroRecords: "Aucune données trouvée",
        infoFiltered: "",
        info:"Affichage de projet _START_ &agrave; _END_ sur _TOTAL_",
        infoEmpty:      "Affichage de projet; 0 sur 0",
        paginate: {
            first:      "Premier",
            previous:   "Pr&eacute;c&eacute;dent",
            next:       "Suivant",
            last:       "Dernier"
        },
      },
    ajax : {
     url:"fetch_Suspendu.php",
     type:"POST"
    },

   });
  }

  function update_data_suspendu(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#user_data2').DataTable().destroy();
     fetch_data();
     console.log('update data suspendu')
    }
   });
  }
/*
  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
    if(column_name == 'valide25'){
    var value = $(this).val();
    if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'valide50'){
    var value = $(this).val();
      if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'valide75'){
      var value = $(this).val();
      if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'valide100'){
      var value = $(this).val();
      if($(this).is(":checked")){
    var value = 1;
    }
    else{
      var value = 0;
    }
    }
    if(column_name == 'vente'){
      var value = $(this).val();
    }
    if(column_name == 'nom_utilisateur'){
      var value = $(this).val();
      column_name = "user_id";
    }
    if(column_name == 'type_de_site'){
      var value = $(this).val();
      column_name = "typesite";
    }
    if(column_name == 'graphisme'){
      var value = $(this).val();
      column_name = "etape_graphisme";
    }
    if(column_name == 'contenu'){
      var value = $(this).val();
      column_name = "etape_contenu";
    }
    if(column_name == 'correction'){
      var value = $(this).val();
      column_name = "etape_correction";
    }
   update_data_suspendu(id, column_name, value);
  });
  */

  $(document).on('click', '.unsuspendre', function(e){
  e.preventDefault();
   var id = $(this).attr("id");
   Swal.fire({
      title: 'Voulez-vous débloquer ce projet ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"unsuspendre.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data2').DataTable().destroy();
              fetch_data();
            }
        });
        document.location.reload();
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été débloqué', '', 'info')
      }
    })
   }  
  );
});


function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}


window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');

      }
    }
  }
}
</script>


<script>
(function($){

  $(document).ready(function(){
    initSortable()
  });

  function initSortable(){
    $('tbody').sortable({
        placeholder : "ui-state-highlight",
        handle: ".sortable-handle",
        update : function(event, ui){
          var order = [];
          $('tbody tr').each(function(){
            var id = $(this).find('[data-id]').data('id');
            order.push(id);       
          });         
          $.ajax({
            url:"reorder.php",
            method:"POST",
            data:{
              projects_order: order
            }
          }); 
        }
    });
  }
})(jQuery)

</script>