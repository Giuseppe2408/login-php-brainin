<?php

    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $db = "db_Brainin";



    $connection = new mysqli($host, $user, $password, $db);


    if($connection == false) 
        die("errore");
    
    
?>