<?php
                session_start();
                if(isset($_SESSION['username'])){
                }
                else{
                    header('Location: login.php');
                }
            ?>
<html>
 <head>
  <title>Corbeille projet en cours</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="css/tableauprojet.css"/>
  <link rel="stylesheet" href="css/header.css">
  <link rel="icon" href="images/Favicon-A2com.ico">

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
  <div class="container box" style="margin-top:150px">
   <div class="table-responsive">
    <div align="right">
    </div>
    <table id="user_data" class="table table-bordered">
     <thead>
      <tr>
                      <th class = "th1">Vente</th>
                      <th class = "th2">Projet</th>
                      <th>Text</th>
                      <th>Type de site</th>
                      <th>Facturation</th>
                      <th>Graphisme</th>
                      <th>Contenu</th>
                      <th>Correction</th>
       <th class = "th1"></th>
       <th class = "th1"></th>
       <th class = "th1"></th>
       <th></th>
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
    "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Tout"]],
    "zeroRecords": "Aucune recherche ne correspond",
    "infoEmpty": "Aucune recherche disponible",
    "search": "Recherche:",
    "processing" : true,
    "serverSide" : true,
    "ordering": false,
    "order" : [],
    "ajax" : {
     url:"fetch2.php",
     type:"POST"
    }
    
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
   update_data(id, column_name, value);
  });

  $(document).on('click', '#insert', function(){
   var vente = $('#data1').text();
   var projet = $('#data2').text();
   var nom_utilisateur = $('#data3').text();

var type_de_site = $('#data4').text();
var facturation = $('#data5').text();
var graphisme = $('#data6').text();
var contenu = $('#data7').text();
var correction = $('#data8').text();

   if(nom_utilisateur != '' && graphisme != '' && vente != '' && projet != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{nom_utilisateur:nom_utilisateur, type_de_site:type_de_site, vente:vente, projet:projet, facturation:facturation, graphisme:graphisme,contenu:contenu, correction:correction},
     success:function(data)
     {
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
 }
   else
   {
    alert("Tout les champs doivent être remplis");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("AEtes vous sur de vouloir placer dans la corbeille ce projet ?"))
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
  $(document).on('click', '.suspendre', function(){
   var id = $(this).attr("id");
   if(confirm("Etes-vous sur de vouloir suspendre ce projet ?"))
   {
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