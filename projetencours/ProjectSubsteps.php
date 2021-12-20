<?php
require_once '../config.php';
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['Admin'])){

}
else{
    header('Location: login.php');
}

$updated_flag = false;

 if(!empty($_POST['Substep'])){
    $updated_flag = true;
    foreach($_POST['Substep'] as $id => $data){
      $id = intval($id);
      $name = mysqli_real_escape_string($db, $data['name']);
      $sort = intval($data['sort']);


      if($id > 0){
        $delete = !empty($data['delete']);
    
        if($delete){
          
          $query = 'DELETE FROM substeps WHERE id = "'.$id.'"';
          mysqli_query($db, $query);

         
          $query = 'DELETE FROM project_substeps WHERE substep_id = "'.$id.'"';
          mysqli_query($db, $query);
        }
        else{
          
          $query = 'UPDATE substeps SET name = "'.$name.'", sort = "'.$sort.'" WHERE id = "'.$id.'"';
          mysqli_query($db, $query);
        }
      }
      
      elseif(!empty($name)){
        $query = 'INSERT INTO substeps SET name = "'.$name.'", sort = "'.$sort.'"';
        mysqli_query($db, $query);
      }         

    }
 }


?>
<html>

<head>
  <title>Project Substeps</title>
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

  <link rel="stylesheet" href="css/tableauprojet.css" />
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
                <a href="../logout.php">Déconnexion</a>
              </li>
            </ul>
          </div>
      </div>
    </div>

</head>

<body>
  <div class="container box" style="margin-top:150px">
  <?php if($updated_flag) : ?>
    <div class="alert alert-info">
      Data updated
    </div>
  <?php endif; ?>
      <?php $current_substeps = get_substeps_array(false); ?>
      <form method="POST">
        <h3>Create new substep</h3>
        <div class="row">
              <div class="col-md-6">
                  <input type="text" name="Substep[0][name]" value="" class="form-control"><br>
              </div>
              <div class="col-md-2">
                  <input type="text" name="Substep[0][sort]" value="0" class="form-control"><br>
              </div>
          </div>
        <h3>Modify existing substeps</h3>
        <div class="row">
          <div class="col-md-6">
            <h5>Name</h5>
          </div>
          <div class="col-md-2">
            Priority
          </div>
          <div class="col-md-4">
            Delete
          </div>
        </div>
        <?php foreach($current_substeps as $substep_id => $substep_details) : ?>          
          <div class="row">
              <div class="col-md-6">
                  <input type="text" name="Substep[<?=$substep_id?>][name]" value="<?=$substep_details['name']?>" class="form-control"><br>
              </div>
              <div class="col-md-2">
                  <input type="text" name="Substep[<?=$substep_id?>][sort]" value="<?=$substep_details['sort']?>" class="form-control"><br>
              </div>
              <div class="col-md-4 text-left">
                  <input type="checkbox" name="Substep[<?=$substep_id?>][delete]"><br>
              </div>
          </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      


  </div>
</body>
</html>

<script type="text/javascript" language="javascript">


</script>