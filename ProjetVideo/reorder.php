<?php
require_once '../config.php';
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    if(isset($_POST['projetvideo_order'])){
        $next_number = 1;
        foreach($_POST['projetvideo_order'] as $id){
            $id = intval($id); //intval for security
            $query = 'UPDATE `projetvideo` SET `order_id` = "'.$next_number.'" WHERE `id` = "'.$id.'"';
            $next_number++;
            $result = mysqli_query($db, $query);
        }

    }

?>
