<?php
require_once '../config.php';

if(isset($_POST["modalid"]))
{
   $id = intval($_POST["modalid"]);

   $etapes = !empty($_POST['etapes']) ? $_POST['etapes'] : [];

   array_walk($etapes, 'intval');

   $query = 'DELETE FROM project_substeps WHERE project_id = "'.$id.'"';
   mysqli_query($db, $query);

   foreach($etapes as $etape_id){
      $query = 'INSERT IGNORE INTO project_substeps SET project_id = "'.$id.'", substep_id = "'.$etape_id.'"';
      mysqli_query($db, $query);
   }

}
?>