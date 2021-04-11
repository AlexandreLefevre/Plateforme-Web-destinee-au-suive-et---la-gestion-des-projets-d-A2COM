<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="styles/styleconnexion.css" media="screen" type="text/css" />
        <title>Login</title>
        <link rel="icon" href="images/Favicon-A2com.ico">
    </head>
    <body>
        <div class="wrapper">

          <div class="title">Authentification</div>

           <form action="verification.php" method="POST">

               <div class="field">
                  <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
               </div>
               <div class="field">
                  <input type="password" placeholder="Entrer le mot de passe" name="password" required>
               </div>

               <div class="content"></div>

               <div class="field">
               <input type="submit" id='submit' value='LOGIN' > 
               <br>
               <br>
               <a href="index2.php" id='mdpforget'>Mot de passe oublié ?</a>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                </div>
            </form>
    </body>
</html>