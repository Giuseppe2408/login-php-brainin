<?php
    session_start();
    require_once "config.php";
    $data_email = $_SESSION['email'];
    unset($_SESSION['logged']);


    if(session_destroy()) {
        $delete_query = "DELETE FROM log_users WHERE email='$data_email'";
        if ($connection->query($delete_query)) {
            echo "logout fatto";
        } else {
            echo "errore" . $connection->error;
        }
    }
    header("location: ../index.php")


    


?>