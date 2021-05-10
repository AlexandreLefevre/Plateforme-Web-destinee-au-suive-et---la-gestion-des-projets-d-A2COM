<?php
                session_start();
                if(isset($_SESSION['username'])){
                }
                else{
                    header('Location: login.php');
                }

$connect = mysqli_connect("localhost", "root", "", "adeuxcom");

$query = "SELECT id FROM projetencours";

$result = mysqli_query($connect, $query);

$data = array();

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
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
  <div class="container box" style="margin-top:150px" id ="tablecombo">
   <div class="table">
    <table id="user_data" class="table table-bordered">
     <thead>
      <tr>
                      <th class = "th1">Vente</th>
                      <th class = "th2">Projet</th>
                      <th>Text</th>
                      <th >Type de site</th>
                      <th class = "th1">Facturation</th>
                      <th class = "th1">Graphisme</th>
                      <th class = "th1">Contenu</th>
                      <th class = "th1">Correction</th>
       <th></th>
       <th></th>
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
            <input type="checkbox" value="etape1" name="etape[]" id="etape1">
            Premier acompte
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape16" name="etape[]" id="etape16">
            Deuxième acompte (50%) payé
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape2" name="etape[]" id="etape2">
            Template validé
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape17" name="etape[]" id="etape17">
            Création de texte
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape3" name="etape[]" id="etape3">
            Logo
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape18" name="etape[]" id="etape18">
            Validation du contenu par le client
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape4" name="etape[]" id="etape4">
            Couleurs
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape19" name="etape[]" id="etape19">
            Toutes les matières reçues
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape5" name="etape[]" id="etape5">
            Structure
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape20" name="etape[]" id="etape20">
            Réalisation du E2/3
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape6" name="etape[]" id="etape6">
            Informations de contact
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape21" name="etape[]" id="etape21">
            Checkup interne du E2/3
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape7" name="etape[]" id="etape7">
            Texte de la page d'accueil validé
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape22" name="etape[]" id="etape22">
            Corrections internes pour E2/3 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape8" name="etape[]" id="etape8">
            Photos pour E1/3
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape23" name="etape[]" id="etape23">
            Présentation au client 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape9" name="etape[]" id="etape9">
            Personnalisation du Template
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape24" name="etape[]" id="etape24">
            Troisième acompte (75%) payé 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape10" name="etape[]" id="etape10">
            Création de page d'accueil
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape25" name="etape[]" id="etape25">
            Deuxième tour de corrections 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape11" name="etape[]" id="etape11">
            Création d'une page intérieure
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape26" name="etape[]" id="etape26">
            Validation finale par le client 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape12" name="etape[]" id="etape12">
            E1/3 Validation interne
          </label>
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape27" name="etape[]" id="etape27">
            Migration et SSL 
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape13" name="etape[]" id="etape13">
            E1/3 Corrections internes
        </div>
        <div class="col-md">
          <label>
            <input type="checkbox" value="etape28" name="etape[]" id="etape28">
            Vérification finale -> migration
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape14" name="etape[]" id="etape14">
            E1/3 Corrections du client
          </label>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-3">
          <label>
            <input type="checkbox" value="etape15" name="etape[]" id="etape15">
            E1/3 Validation par client
          </label>
        </div>  
        <div class="form-group">
            <label for="message-text" class="col-lg-7 col-md-4 col-sm-3">Commentaires:</label>
            <textarea class="form-control" id="etape29" name="etape[]" value="etape29"></textarea>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" id="savemodal" class="btn btn-primary" data-dismiss="modal" onclick="saveModal('<?php echo $row['id'] ?>')">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>

 </body>
</html>

<script type="text/javascript" language="javascript" >
function saveModal(modalid){
  var $test = "#myModal" + modalid + " input[name='etape[]']";
  $($test).each( function () {
    if($(this).is(':checked'))
    {
      console.log($(this).val());
      if($(this).val()=="etape1"){
        console.log($(this).val());
      }
    }
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
    "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Tout"]],
    "processing" : true,
    "serverSide" : true,
    "ordering": false,
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
    "ajax" : {
     url:"fetch2.php",
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
   if(column_name == 'facturation'){
    var value = $(this).val();
   }
   update_data(id, column_name, value);
  });

  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Etes vous sur de vouloir placer dans la corbeille ce projet ?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
   }
  });
  $(document).on('click', '.archiver', function(){
   var id = $(this).attr("id");
   if(confirm("Etes-vous sur de vouloir archiver ce projet ?"))
   {
    $.ajax({
     url:"archiver.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
   }
  });
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