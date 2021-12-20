<?php
require_once 'config.php';
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
    <title>Gestion utilisateur</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- Bootstrap Min CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- MeanMenu CSS -->
<link rel="stylesheet" href="styles/header.css">
    <link rel="icon" href="images/Favicon-A2com.ico">
</head>
<body>
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
<?php require_once("verificationinscription.php"); ?>
		  <div class="container" style="margin-top:120px">
				<table class="table">
					<thead>
						<tr>
							<th>Username</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<form action="verificationinscription.php" method="POST">
					<?php 
					//user data
					$sQuery = "SELECT * FROM user where Admin='user' AND IdUser != 70";
				    $result = $db->query($sQuery);
					
					while($row = $result->fetch_assoc()): ?>
					
					<tr>
						<td><?= $row['nom_utilisateur']; ?></td>
						<td><?= $row['Email']; ?></td>
						<td style="width: 15%">
							<button type="submit" name="delete" value="<?= $row['IdUser']; ?>" class="btn btn-danger">Delete</button>
						</td>
					</tr>
					
					<?php endwhile; ?>
					</form>
					</tbody>
				</table>
		</div>
		
            
</div>
</body>
</html>