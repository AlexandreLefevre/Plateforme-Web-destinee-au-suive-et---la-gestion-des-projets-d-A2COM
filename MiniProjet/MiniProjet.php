<?php
require_once '../config.php';

                session_start();
                if(isset($_SESSION['username'])){
                }
                else{
                    header('Location: login.php');
                }
                

$query = "SELECT projetencours.id,etape1,etape2,etape3,etape4,etape5,etape6,etape7,etape8,etape9,etape10,etape11,etape12,etape13,etape14,etape15,etape16,etape17,etape18,etape19,etape20,etape21,etape22,etape23,etape24,etape25,etape26,etape27,etape28,etape29,etape30 FROM projetencours JOIN fiche_detailees ON projetencours.id=fiche_detailees.projetencours_id";

$query2 = "SELECT * FROM user WHERE user.Admin = 'user'";

$query3 = "SELECT * FROM statut_miniprojet";

$result = mysqli_query($db, $query);

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

while($row = mysqli_fetch_array($result)){
  $data[]=$row;
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
							<a href="../dashboard/dashboard.php" class="nav-link">Dashboard</a>
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
   <h3 style="text-align: center;">Mini-Projet en cours</h3>
    <div align="right">
    <button type="button" name="corbeille" id="corbeille" class="btn btn-danger">Corbeille</button>
     <button type="button" name="add" id="add" class="btn btn-info">Ajouter</button>
     <button type="button" name="log" id="log" class="btn btn-warning">Logs</button>
    </div>
    <table id="user_data" class="table table-bordered">
     <thead>
      <tr>
                      <th>Deadline</th>
                      <th>Projet</th>
                      <th>Résumé</th>
                      <th data-orderable="false">Statut</th>
                      <th data-orderable="false">Qui va faire ?</th>
                      <th>Notes complémentaires</th>
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
   <h3 style="text-align: center;">Mini Projet Suspendu</h3>
    <table id="user_data2" class="table table-bordered">
     <thead>
      <tr>
                      <th>Deadline</th>
                      <th>Projet</th>
                      <th>Résumé</th>
                      <th data-orderable="false">Statut</th>
                      <th data-orderable="false">Qui va faire ?</th>
                      <th>Notes complémentaires</th>
       <th data-orderable="false"></th>
      </tr>
     </thead>
    </table>
  </div>
</div>

 </body>
</html>

<script type="text/javascript" language="javascript" >

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
      lengthMenu:    "Afficher _MENU_ Mini Projets",
        search: "Rechercher:",
        
        processing:     "Traitement en cours...",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        loadingRecords: "Chargement en cours...",
        zeroRecords: "Aucune données trouvée",
        infoFiltered: "",
        info:"Affichage de Mini Projet _START_ &agrave; _END_ sur _TOTAL_",
        infoEmpty:      "Affichage de Mini Projet; 0 sur 0",
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
    if(column_name == 'date_de_fin'){
      var value = $(this).val();
    }
    if(column_name == 'employe'){
      var value = $(this).val();
      column_name = "user_id";
    }
    if(column_name == 'statut'){
      var value = $(this).val();
      column_name = "etape_statut";
    }
   update_data(id, column_name, value);
  });

  $('#add').click(function(){
   var html = '<tr data-unsortable>';
   html += '<td id="data5"><input type="date" id="start" name="trip-start" style="font-size: 1.7rem"></td>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';

  // html += '<td contenteditable id="data3"></td>';
   
  html += '<td contenteditable><select size="1" id="data3">';
  <?php foreach ($statuts as $statut):?>
  html += '<option value=<?php echo $statut["id"] ?>><?php echo $statut['libele']?></option>'; 
  <?php endforeach; ?>


   html += '<td contenteditable><select size="1" id="data4">';
  <?php foreach ($users as $user):?>
  html += '<option value=<?php echo $user["id"] ?>><?php echo $user['nom']?></option>'; 
  <?php endforeach; ?>

html +="</select></td>";

   html += '<td contenteditable id="data6"></td>';
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

   var client = $('#data1').text();
   var tache = $('#data2').text();
   var statut = $('#data3').val();

var employe = $('#data4').val();
var date_de_fin = $('#data5 input').val();
var notes = $('#data6').text();

   if(client != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{client:client, tache:tache, statut:statut, employe:employe, date_de_fin:date_de_fin, notes:notes},
     success:function(data)
     {
      $('#user_data').DataTable().destroy();
      fetch_data();
      // document.location.reload();
     }
    });
 }
   else
   {
    alert("Il faut un client !");
   }
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous placer ce Mini Projet en corbeille ?',
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
              Swal.fire('Le Mini Projet à été déplacé en corbeille', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le Mini Projet n a pas été mis en corbeille', '', 'info')
      }
    })
   }  
  );


  $(document).on('click', '.archiver', function(e){
    e.preventDefault();
    var id = $(this).attr("id");

    Swal.fire({
      title: 'Voulez-vous archiver ce Mini Projet ?',
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
              Swal.fire('Le Mini Projet à été archivé', '', 'success')
            }
        });
        
      } else if (result.isDenied) {
        Swal.fire('Le Mini Projet n a pas été archivé', '', 'info')
      }
    })
   }  
  );

  $(document).on('click', '.suspendre', function(e){
  e.preventDefault();
   var id = $(this).attr("id");
   Swal.fire({
      title: 'Voulez-vous suspendre ce Mini Projet ?',
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
        Swal.fire('Le Mini Projet n a pas été suspendu', '', 'info')
      }
    })
   }  
  );


});

// Tableau des miniprojet suspendu

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

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#user_data2').DataTable().destroy();
     fetch_data();
    }
   });
  }
  
  $(document).on('click', '.unsuspendre', function(e){
  e.preventDefault();
   var id = $(this).attr("id");
   Swal.fire({
      title: 'Voulez-vous débloquer ce Mini Projet  ?',
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
        Swal.fire('Le Mini Projet n a pas été débloqué', '', 'info')
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
              miniproject_order: order
            }
          }); 
        }
    });
  }
})(jQuery)

</script>