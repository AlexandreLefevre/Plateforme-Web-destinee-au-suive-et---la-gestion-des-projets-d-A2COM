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
							<a href="projetencours/ProjectSubsteps.php" class="nav-link">Ajouter une sous-étape</a>
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
             <h1>Ajouter un état de graphisme</h1>
             <form class="needs-validation" novalidate method="post" action="ajoutgraphisme.php">
                 <div class="form-row">
                     <div class="col-md-4 mb-3">
                         <label for="prenom">Etat de graphisme</label>
                         <input type="text" class="form-control" name="graphisme" placeholder="Etat de graphisme" required>
						 <div class="invalid-feedback">Champ vide</div>

                     </div>               
                 <button class="btn btn-primary" type="submit" name="submit"  style="margin-top:20px">Ajouter</button>
             </form>

           </div>

           <?php require_once("ajoutgraphisme.php"); ?>
		  <div class="container">
				<table class="table">
					<thead>
						<tr>
							<th>Etat de graphisme</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<form action="ajoutgraphisme.php" method="POST">
					<?php 
					//user data
					$sQuery = "SELECT * FROM graphisme_projetencours";
				    $result = $db->query($sQuery);
					
					while($row = $result->fetch_assoc()): ?>
					
					<tr>
						<td><?= $row['libelle']; ?></td>
						<td style="width: 15%">
							<button type="submit" name="delete" value="<?= $row['idGraphisme']; ?>" class="btn btn-danger">Delete</button>
						</td>
					</tr>
					
					<?php endwhile; ?>
					</form>
					</tbody>
				</table>
		</div>
</div>

<div class="container">
             <h1>Ajouter un état de contenu</h1>
             <form class="needs-validation" novalidate method="post" action="ajoutcontenu.php">
                 <div class="form-row">
                     <div class="col-md-4 mb-3">
                         <label for="prenom">Etat de contenu</label>
                         <input type="text" class="form-control" name="contenu" placeholder="Etat de contenu" required>
						 <div class="invalid-feedback">Champ vide</div>

                     </div>               
                 <button class="btn btn-primary" type="submit" name="submit"  style="margin-top:20px">Ajouter</button>
             </form>

           </div>

           <?php require_once("ajoutcontenu.php"); ?>
		  <div class="container">
				<table class="table">
					<thead>
						<tr>
							<th>Etat de contenu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<form action="ajoutcontenu.php" method="POST">
					<?php 
					//user data
					$sQuery = "SELECT * FROM contenu_projetencours";
				    $result = $db->query($sQuery);
					
					while($row = $result->fetch_assoc()): ?>
					
					<tr>
						<td><?= $row['libelle']; ?></td>
						<td style="width: 15%">
							<button type="submit" name="delete" value="<?= $row['idContenu']; ?>" class="btn btn-danger">Delete</button>
						</td>
					</tr>
					
					<?php endwhile; ?>
					</form>
					</tbody>
				</table>
		</div>
</div>

<div class="container">
             <h1>Ajouter un état de correction</h1>
             <form class="needs-validation" novalidate method="post" action="ajoutcorrection.php">
                 <div class="form-row">
                     <div class="col-md-4 mb-3">
                         <label for="prenom">Etat de correction</label>
                         <input type="text" class="form-control" name="correction" placeholder="Etat de correction" required>
						 <div class="invalid-feedback">Champ vide</div>

                     </div>               
                 <button class="btn btn-primary" type="submit" name="submit"  style="margin-top:20px">Ajouter</button>
             </form>

           </div>

           <?php require_once("ajoutcorrection.php"); ?>
		  <div class="container">
				<table class="table">
					<thead>
						<tr>
							<th>Etat de correction</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<form action="ajoutcorrection.php" method="POST">
					<?php 
					//user data
					$sQuery = "SELECT * FROM correction_projetencours";
				    $result = $db->query($sQuery);
					
					while($row = $result->fetch_assoc()): ?>
					
					<tr>
						<td><?= $row['libelle']; ?></td>
						<td style="width: 15%">
							<button type="submit" name="delete" value="<?= $row['idCorrection']; ?>" class="btn btn-danger">Delete</button>
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