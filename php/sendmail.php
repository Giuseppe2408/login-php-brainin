<?php
    require_once "config.php";

    
    $_POST = json_decode(file_get_contents('php://input'), true);
    $email = $_POST['email'];


    $to = $email;
    $subject = "recupero password";
    $new_password = generaPassword(8);
    $message = "nuova password:" . $new_password;

    $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    
        
    
   
        if(mail($to, $subject, $message)) {
            echo "mail inviata";
            $alter_query = "UPDATE users SET password = '$hash_new_password' WHERE email = '$email'";
            if($connection->query($alter_query) == true) {
                echo "password modificata";
            } else{
                echo "errore" . " " . $connection->error;
            }
        }
        else {
            echo "errore";
        }  
    


     function generaPassword($lunghezza) {
        $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $random_string = "";

        for ($i=0; $i < $lunghezza; $i++) { 
            $random_string .= $char[rand(0, strlen($char) - 1)];
        }

        return $random_string;

     }
?>