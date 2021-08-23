 
<?php 
header("Strict-Transport-Security:max-age=63072000");
    session_start();
    session_destroy();
    header("location:login.php");
?>
