<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    if(isset($_POST['miniproject_order'])){
        $connect = mysqli_connect("localhost", "root", "", "adeuxcom");
        $next_number = 1;
        foreach($_POST['miniproject_order'] as $id){
            $id = intval($id); //intval for security
            $query = 'UPDATE `miniprojet` SET `order_id` = "'.$next_number.'" WHERE `id` = "'.$id.'"';
            $next_number++;
            $result = mysqli_query($connect, $query);
        }

    }

?>
