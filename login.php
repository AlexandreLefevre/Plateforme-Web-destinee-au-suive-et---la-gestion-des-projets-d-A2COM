<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Connectez-vous à votre compte client afin de visualiser toutes vos données sur vos appels entrants, directement sur votre dashboard">
		<meta name="author" content="">
					<title>A2Com</title>
		        <link href="https://www.a2speak.com/console/assets/css/theme/plugins/toastr/toastr.min.css" rel="stylesheet">
		<link href="https://www.a2speak.com/console/assets/css/theme/bootstrap.min.css" rel="stylesheet">
		<link href="https://www.a2speak.com/console/assets/css/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="https://www.a2speak.com/console/assets/css/theme/animate.css" rel="stylesheet">
		<link href="https://www.a2speak.com/console/assets/css/theme/plugins/iCheck/custom.css" rel="stylesheet">
		<link href="https://www.a2speak.com/console/assets/css/theme/style.css" rel="stylesheet">
		<link href="https://www.a2speak.com/console/assets/css/login.css" rel="stylesheet">
									<link rel="icon" type="image/png" href="images/Favicon-A2com.ico">
					<style>
									body {
						background-color: #ffffff !important;
					}
				
				
									body {
						color: #333333;
					}
								
									.btn-primary {
						background-color: #f30b0b;
						border-color: #f30b0b;
						color: #ffffff;
					}
				
									.btn-primary:hover,
					.btn-primary:focus,
					.btn-primary:active,
					.btn-primary.active,
					.open .dropdown-toggle.btn-primary,
					.btn-primary:active:focus,
					.btn-primary:active:hover,
					.btn-primary.active:hover,
					.btn-primary.active:focus {
						background-color: #000000;
						border-color: #000000;
						color: #ffffff;
					}	
							</style>
		

          <div class="middle-box text-center animated fadeInDown">
    		<div class="ibox-content">
      			<center>
										<img src="https://www.a2speak.com/console/assets/whitelabel_img/1956_20171018170022_1.png" class="img-responsive">
						</center>
									<form action="verification.php" class="m-t" method="post" accept-charset="utf-8">
				<div class="form-group text-left">
					<label for="login">Adresse email</label>
					<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required="">
				</div>
				<div class="form-group text-left">
					<label for="password">Mot de passe</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required="">
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b" id='submit' value='LOGIN'>Se connecter</button>
				<hr>
			</form>											<a href="index2.php" id='mdpforget'><small>Mot de passe oublié?</small></a>
			    							<p class="m-t"> <small>©2021 by A2Com.com</small> </p>
								</div>
                                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
	</div>


</body>
		<script src="https://www.a2speak.com/console//assets/js/theme/jquery-3.1.1.min.js"></script>
		<script src="https://www.a2speak.com/console//assets/js/theme/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="https://www.a2speak.com/console//assets/js/theme/plugins/iCheck/icheck.min.js"></script>
        <!-- Toastr script -->
        <script src="https://www.a2speak.com/console/assets/js/theme/plugins/toastr/toastr.min.js"></script>
	</body>
</html>