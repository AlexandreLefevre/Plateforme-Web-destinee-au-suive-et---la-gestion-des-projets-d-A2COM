 <?php
                session_start();
                if(isset($_SESSION['username'])){
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
    <title>Dashboard</title>
    <!-- Bootstrap Min CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- MeanMenu CSS -->
<link rel="stylesheet" href="styles/header.css">
    <link rel="icon" href="images/Favicon-A2com.ico">
</head>
<body>
<!-- Start Navbar Area -->
<div class="navbar-area">
	<!-- Menu For Mobile Device -->
	<div class="mobile-nav">
		<a href="#" class="logo">
			Logo
		</a>
	</div>

	<!-- Menu For Desktop Device -->
	<div class="main-nav">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
            <img src="images/logo_A2Com.png" alt="A2com Logo" class="hidden-xs">
				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
                    <?php if($_SESSION['Admin']==0): ?>
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
                        <?php endif; ?>
                        <li class="nav-item">
                           <a href="logout.php">Déconnexion</a>
                       </li>
					</ul>
				</div>
</body>
</html>
    
</body>
</html>