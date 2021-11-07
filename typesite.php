<?php
header("Strict-Transport-Security:max-age=63072000");
                session_start();
                if(isset($_SESSION['username'])&&isset($_SESSION['Admin'])){
                }
                else{
                    header('Location: login.php');
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- MeanMenu CSS -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="icon" href="images/Favicon-A2com.ico">
</head>
<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/index.js"></script>
<div class="container">
 <!-- Start Navbar Area -->
 <div class="navbar-area position-static">
	<!-- Menu For Desktop Device -->
	<div class="row main-nav">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
                    <?php if($_SESSION['Admin']=='user'): ?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="ProjetEnCous.php" class="nav-link">Projet en cours</a>
						</li>
						<li class="nav-item">
							<a href="MiniProjet.php" class="nav-link">Mini-Projet</a>
						</li>
						<li class="nav-item">
							<a href="ProjetVideo.php" class="nav-link">Projet video</a>
						</li>
						<li class="nav-item">
							<a href="Archives.php" class="nav-link">Archives</a>
						</li>
                        <?php else: ?>
                            <li class="nav-item">
							<a href="Inscription.php" class="nav-link">Création de compte</a>
						</li>
                        <li class="nav-item">
							<a href="GestionUser.php" class="nav-link">Gestion des utilisateurs</a>
						</li>
						<li class="nav-item">
							<a href="typesite.php" class="nav-link">Ajouter type de site</a>
						</li>
						<li class="nav-item">
							<a href="etapegraphisme.php" class="nav-link">Ajouter un état d'étape</a>
						</li>
						<li class="nav-item">
							<a href="historique.php" class="nav-link">Historique</a>
						</li>
                        <?php endif; ?>
                        <li class="nav-item">
                           <a href="logout.php">Déconnexion</a>
                       </li>
					</ul>
				</div>
			</div>
		</div>
	</div>

          <div class="container" style="margin-top:100px">
             <h1>Ajouter un type de site</h1>
             <form class="needs-validation" novalidate method="post" action="ajouttypesite.php">
                 <div class="form-row">
                     <div class="col-md-4 mb-3">
                         <label for="prenom">Type de site</label>
                         <input type="text" class="form-control" name="typesite" placeholder="Type de site" required>
						 <div class="invalid-feedback">Champ vide</div>

                     </div>               
                 <button class="btn btn-primary" type="submit" name="submit"  style="margin-top:20px">Ajouter</button>
             </form>

           </div>

           <?php require_once("ajouttypesite.php"); ?>
		  <div class="container">
				<table class="table">
					<thead>
						<tr>
							<th>Type de site</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<form action="ajouttypesite.php" method="POST">
					<?php 
					//user data
					$sQuery = "SELECT * FROM type_site";
				    $result = $db->query($sQuery);
					
					while($row = $result->fetch_assoc()): ?>
					
					<tr>
						<td><?= $row['libelle']; ?></td>
						<td style="width: 15%">
							<button type="submit" name="delete" value="<?= $row['idTypeSite']; ?>" class="btn btn-danger">Delete</button>
						</td>
					</tr>
					
					<?php endwhile; ?>
					</form>
					</tbody>
				</table>
		</div>
</div>
         <script>

           (function() {
             'use strict';
             window.addEventListener('load', function() {
               let forms = document.getElementsByClassName('needs-validation');
               let validation = Array.prototype.filter.call(forms, function(form) {
                 form.addEventListener('submit', function(event) {
                   if (form.checkValidity() === false) {
                     event.preventDefault();
                     event.stopPropagation();
                   }
                   form.classList.add('was-validated');
                 }, false);
               });
             }, false);
           })();

         </script>
</body>
</html>