<?php
                session_start();
                if(isset($_SESSION['username'])){
                }
                else{
                    header('Location: login.php');
                }

$connect = mysqli_connect("localhost", "root", "", "adeuxcom");

$query = "SELECT projetencours.id,etape1,etape2,etape3,etape4,etape5,etape6,etape7,etape8,etape9,etape10,etape11,etape12,etape13,etape14,etape15,etape16,etape17,etape18,etape19,etape20,etape21,etape22,etape23,etape24,etape25,etape26,etape27,etape28,etape29,etape30 FROM projetencours JOIN fiche_detailees ON projetencours.id=fiche_detailees.projetencours_id";

$query2 = "SELECT projetvideo.id, nom, prenom, telephone, email, lien FROM projetvideo JOIN fiche_contact ON projetvideo.id=fiche_contact.projetvideo_id";

$result = mysqli_query($connect, $query);

$result2 = mysqli_query($connect, $query2);

$data = array();

$data2 = array();

while($row = mysqli_fetch_array($result)){
  $data[]=$row;
}
while($row2 = mysqli_fetch_array($result2)){
  $data2[]=$row2;
}
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
							<a href="../index.php" class="nav-link">Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="../projetencours/ProjetEnCous.php" class="nav-link">Projet en cours</a>
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
   <h3 style="text-align: center;">Projet Archivé</h3>
    <table id="user_data" class="table table-bordered">
     <thead>
      <tr>
                      <th>Vente</th>
                      <th>Projet</th>
                      <th>Text</th>
                      <th >Type de site</th>
                      <th data-orderable="false">25%</th>
                      <th></th>
                      <th>Graphisme</th>
                      <th data-orderable="false">50%</th>
                      <th></th>
                      <th >Contenu</th>
                      <th data-orderable="false">75%</th>
                      <th></th>
                      <th>Correction</th>
                      <th data-orderable="false">100%</th>
                      <th></th>
       <th id="th1" data-orderable="false"></th>
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
   <h3 style="text-align: center;">Mini Projet Archivé</h3>
    <table id="user_data2" class="table table-bordered">
     <thead>
      <tr>
                      <th>Deadline</th>
                      <th>Client</th>
                      <th>Résumé</th>
                      <th>Statut</th>
                      <th >Qui va faire ?</th>
                      <th>Notes complémentaires</th>
       <th data-orderable="false"></th>
       <th data-orderable="false"></th>
      </tr>
     </thead>
    </table>
  </div>
</div>

<div class="container box">
   <div class="table">
   <h3 style="text-align: center;">Projet vidéo Archivé</h3>
    <table id="user_data3" class="table table-bordered">
     <thead>
      <tr>
	                  <th>Deadline</th>
                      <th>Client</th>
                      <th>Tache</th>
                      <th>Chef de projet</th>
                      <th >Type</th>
       <th id="th1" data-orderable="false"></th>
       <th data-orderable="false"></th>
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
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape1" name="etape[]" id="etape1" <?php if($row['etape1']){echo("checked");}?>>
            Premier acompte
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape16" name="etape[]" id="etape16" <?php if($row['etape16']){echo("checked");}?>>
            Deuxième acompte (50%) payé
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape2" name="etape[]" id="etape2" <?php if($row['etape2']){echo("checked");}?>>
            Template validé
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape17" name="etape[]" id="etape17" <?php if($row['etape17']){echo("checked");}?>>
            Création de texte
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape3" name="etape[]" id="etape3" <?php if($row['etape3']){echo("checked");}?>>
            Logo
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape18" name="etape[]" id="etape18" <?php if($row['etape18']){echo("checked");}?>>
            Validation du contenu par le client
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape4" name="etape[]" id="etape4" <?php if($row['etape4']){echo("checked");}?>>
            Couleurs
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape19" name="etape[]" id="etape19" <?php if($row['etape19']){echo("checked");}?>>
            Toutes les matières reçues
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape5" name="etape[]" id="etape5" <?php if($row['etape5']){echo("checked");}?>>
            Structure
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape20" name="etape[]" id="etape20" <?php if($row['etape20']){echo("checked");}?>>
            Réalisation du E2/3
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape6" name="etape[]" id="etape6" <?php if($row['etape6']){echo("checked");}?>>
            Informations de contact
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape21" name="etape[]" id="etape21" <?php if($row['etape21']){echo("checked");}?>>
            Checkup interne du E2/3
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape7" name="etape[]" id="etape7" <?php if($row['etape7']){echo("checked");}?>>
            Texte de la page d'accueil validé
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape22" name="etape[]" id="etape22" <?php if($row['etape22']){echo("checked");}?>>
            Corrections internes pour E2/3 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape8" name="etape[]" id="etape8" <?php if($row['etape8']){echo("checked");}?>>
            Photos pour E1/3
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape23" name="etape[]" id="etape23" <?php if($row['etape23']){echo("checked");}?>>
            Présentation au client 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape9" name="etape[]" id="etape9" <?php if($row['etape9']){echo("checked");}?>>
            Personnalisation du Template
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape24" name="etape[]" id="etape24" <?php if($row['etape24']){echo("checked");}?>>
            Troisième acompte (75%) payé 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape10" name="etape[]" id="etape10" <?php if($row['etape10']){echo("checked");}?>>
            Création de page d'accueil
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape25" name="etape[]" id="etape25" <?php if($row['etape25']){echo("checked");}?>>
            Deuxième tour de corrections 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape11" name="etape[]" id="etape11" <?php if($row['etape11']){echo("checked");}?>>
            Création d'une page intérieure
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape26" name="etape[]" id="etape26" <?php if($row['etape26']){echo("checked");}?>>
            Validation finale par le client 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape12" name="etape[]" id="etape12" <?php if($row['etape12']){echo("checked");}?>>
            E1/3 Validation interne
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape27" name="etape[]" id="etape27" <?php if($row['etape27']){echo("checked");}?>>
            Migration et SSL 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape13" name="etape[]" id="etape13" <?php if($row['etape13']){echo("checked");}?>>
            E1/3 Corrections internes
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape28" name="etape[]" id="etape28" <?php if($row['etape28']){echo("checked");}?>>
            Vérification finale -> migration
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape14" name="etape[]" id="etape14" <?php if($row['etape14']){echo("checked");}?>>
            E1/3 Corrections du client
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape15" name="etape[]" id="etape15" <?php if($row['etape15']){echo("checked");}?>>
            E1/3 Validation par client
          </label>
        </div>  
        <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Commentaires:</label>
            <textarea class="form-control" id="etape29" name="etape[]" value="etape29"><?php echo($row['etape29'])?></textarea>
          </div> 
          <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Preview:</label>
            <textarea class="form-control" id="etape30" name="etape[]" value="etape30"><?php echo($row['etape30'])?></textarea>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" id="savemodal" class="btn btn-primary" data-dismiss="modal" onclick="saveModal('<?php echo $row['id'] ?>')">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>

<?php foreach ($data2 as $row2):?>
<div class="modal fade" id="myModall<?php echo $row2['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModallLabel">
  <div class="modal-dialog" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModallLabel">Fiche de contact</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Nom:</label>
            <textarea class="form-control" id="nom" name="etape[]" value="nom"><?php echo($row2['nom'])?></textarea>
          </div> 
          <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Prénom:</label>
            <textarea class="form-control" id="prenom" name="etape[]" value="prenom"><?php echo($row2['prenom'])?></textarea>
          </div> 
		  <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Téléphone:</label>
            <textarea class="form-control" id="telephone" name="etape[]" value="telephone"><?php echo($row2['telephone'])?></textarea>
          </div> 
		  <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Email:</label>
            <textarea class="form-control" id="email" name="etape[]" value="email"><?php echo($row2['email'])?></textarea>
          </div> 
		  <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Lien:</label>
            <textarea class="form-control" id="lien" name="etape[]" value="lien"><?php echo($row2['lien'])?></textarea>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" id="savemodal" class="btn btn-primary" data-dismiss="modal" onclick="saveModall('<?php echo $row2['id'] ?>')">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>

 </body>
</html>

<script type="text/javascript" language="javascript" >
function saveModal($modalid){
  var $test = "#myModal" + $modalid + " input[name='etape[]']";
  var $data = {};
  $("#myModal" + $modalid + " textarea").each(function(){
    $data[$(this).attr('value')] = $(this).val();
    document.location.reload();
  });

  $($test).each( function () {
      if($(this).is(':checked'))
      {
        $data[$(this).val()] = true;
      }
      else{
        $data[$(this).val()] = false;
      }
  });
  var $data2 = JSON.stringify($data);
  $.ajax({
    url:"updateModal.php",
    method:"POST",
    data:{modalid:$modalid, data:$data2}
   });
}

$('#myModal').on('hidden.bs.modal', function(e) {
  $("#myModal .modal-body").find('input:radio, input:checkbox');
});

 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
  var dragSrc = null;  //Globally track source cell
  var cells = null;  // All cells in table
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
     fetch_data();
    }
   });
  }

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
   update_data(id, column_name, value);
  });

  $(document).on('click', '.deleteprojet', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous supprimer définitivement ce projet ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"delete.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data').DataTable().destroy();
              fetch_data();
              Swal.fire('Le projet à bien été supprimé !', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été supprimé !', '', 'info')
      }
    })
   }  
  );

  $(document).on('click', '.unsuspendreprojet', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous désarchiver ce projet ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"unsuspendre.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data').DataTable().destroy();
              fetch_data();
              Swal.fire('Le projet à été désarchiver', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été désarchiver', '', 'info')
      }
    })
   }  
  );


});

// Mini Projet archivé

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
     url:"fetch_miniprojet.php",
     type:"POST"
    },

   });
  }

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update_miniprojet.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#user_data2').DataTable().destroy();
     fetch_data();
    }
   });
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
    if(column_name == 'date_de_fin'){
      var value = $(this).val();
    }
   update_data(id, column_name, value);
  });

  $(document).on('click', '.unsuspendre', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous désarchiver ce Mini Projet ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"unsuspendre_miniprojet.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data2').DataTable().destroy();
              fetch_data();
              Swal.fire('Le Mini Projet à été désarchiver', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le Mini Projet n a pas été désarchiver', '', 'info')
      }
    })
   }  
  );

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous supprimer définitivement ce Mini Projet ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"delete_miniprojet.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data2').DataTable().destroy();
              fetch_data();
              Swal.fire('Le Mini Projet à été supprimé !', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le Mini Projet n a pas été supprimé !', '', 'info')
      }
    })
   }  
  );
});

// Projet vidéo archivé
function saveModall($modalid){
  var $data2 = {};
  $("#myModall" + $modalid + " textarea").each(function(){
    $data2[$(this).attr('value')] = $(this).val();
    document.location.reload();
  });
  var $data3 = JSON.stringify($data2);
  $.ajax({
    url:"updateModal_projetvideo.php",
    method:"POST",
    data:{modalid:$modalid, data2:$data3} 
   });
}

$('#myModall').on('hidden.bs.modal', function(e) {
  $("#myModall .modal-body").find('input:radio, input:checkbox');
});

$(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
  var dragSrc = null;  //Globally track source cell
  var cells = null;  // All cells in table
   var dataTable = $('#user_data3').DataTable({
    lengthMenu: [[10, 20, -1], [10, 20, "Tout"]],
    processing : true,
    order: [],
    serverSide : true,
    language: {
      lengthMenu:    "Afficher _MENU_ projets vidéo",
        search: "Rechercher:",
        
        processing:     "Traitement en cours...",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        loadingRecords: "Chargement en cours...",
        zeroRecords: "Aucune données trouvée",
        infoFiltered: "",
        info:"Affichage de projet vidéo _START_ &agrave; _END_ sur _TOTAL_",
        infoEmpty:      "Affichage de projet vidéo; 0 sur 0",
        paginate: {
            first:      "Premier",
            previous:   "Pr&eacute;c&eacute;dent",
            next:       "Suivant",
            last:       "Dernier"
        },
      },
    ajax : {
     url:"fetch_projetvideo.php",
     type:"POST"
    },

   });
  }

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update_projetvideo.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#user_data3').DataTable().destroy();
     fetch_data();
    }
   });
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   if(column_name == 'delai'){
      var value = $(this).val();
    }
   update_data(id, column_name, value);
  });

  $(document).on('click', '.unsuspendreprojetvideo', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous désarchiver ce projet vidéo ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"unsuspendre_projetvideo.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data3').DataTable().destroy();
              fetch_data();
              Swal.fire('Le projet vidéo à été désarchivé !', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été désarchivé !', '', 'info')
      }
    })
   }  
  );

  $(document).on('click', '.deleteprojetvideo', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous supprimer définitivement ce projet vidéo ?',
      showDenyButton: true
    }).then((result) => {
      if (result.isConfirmed) {
            $.ajax({
            url:"delete_projetvideo.php",
            method:"POST",
            data:{id:id},
            success:function(data){
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              $('#user_data3').DataTable().destroy();
              fetch_data();
              Swal.fire('Le projet vidéo à été supprimé !', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le projet n a pas été supprimé !', '', 'info')
      }
    })
   }  
  );
});


 /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
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