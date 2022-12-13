<?php
    session_start();
    require_once "config.php";
    unset($_SESSION['logged']);
    session_destroy();
    header("location: ../index.php")


    


?>