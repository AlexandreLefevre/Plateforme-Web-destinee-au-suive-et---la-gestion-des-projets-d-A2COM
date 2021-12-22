<?php
require_once '../config.php';
if(isset($_GET["id"])) :?>

    <?php $id = intval($_GET['id']); ?>
    
    <input type="hidden" name="modal_id" value="<?=$id?>" />
    
    <?php 
      
        $active = get_project_active_statuses($id); 

       
        $substeps = get_substeps_array();
    ?>

    <div class="row">
     <?php foreach($substeps as $substep_id => $substep_name) : ?>      
       <div class="col-lg-6 col-md-4 col-sm-3">
         <label>
            <?php?>
           <input type="checkbox" name="<?=$substep_id?>" <?=in_array($substep_id, $active) ? 'checked' : null; ?>>
           <?=$substep_name?>
         </label>
       </div>
     <?php endforeach; ?>
     </div>


<?php endif; ?>