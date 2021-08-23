<?php 
header("Strict-Transport-Security:max-age=63072000");
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=adeuxcom;charset=utf8', 'root', '');
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'adeuxcom';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');
    }catch(\Exception $e){
        die('Erreur : '.$e->getMessage());
    }