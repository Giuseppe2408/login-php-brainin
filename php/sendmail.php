<?php
    require_once "config.php";

    
    $_POST = json_decode(file_get_contents('php://input'), true);
    $email = $_POST['email'];


    $to = $email;
    $subject = "recupero password";
    $message = "nuova password: password";

    


    if(mail($to, $subject, $message)) {

        echo "mail inviata";
    }
    else {
        echo "errore";
    }    
?>