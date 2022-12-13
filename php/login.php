<?php 

require_once "config.php";

$_POST = json_decode(file_get_contents('php://input'), true);

$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);
$hash_password = password_hash($password, PASSWORD_DEFAULT);


$query = "SELECT * FROM users WHERE email = '$email'";

if ($result = $connection->query($query)) {
    if ($result->num_rows == 1) {
        $data = $result->fetch_array(MYSQLI_ASSOC);
        if (password_verify($password, $data['password'])) {
            //prendo i dati dalla tabella register per poi inserirli nella tabella utenti loggati
            $data_email = $data['email'];
            $data_password = $data['password'];
            $data_nome = $data['nome'];
            $data_cognome = $data['cognome'];
            $data_codice_fiscale = $data['codice_Fiscale'];
            $data_sesso = $data['sesso'];
            $data_compleanno = $data['compleanno'];
            $data_luogo = $data['luogo_di_nascita'];

            $create_user = "INSERT INTO log_users (email, password, nome, cognome, codice_fiscale, sesso, compleanno, luogo)
            VALUES ('$data_email', '$data_password', '$data_nome', '$data_cognome', '$data_codice_fiscale', '$data_sesso', '$data_compleanno', '$data_luogo')";

            

            if($connection->query($create_user) == true) {
                session_start();
                $_SESSION['logged'] = true;
                $_SESSION['nome'] = $data_nome;
                $_SESSION['cognome'] = $data_cognome;
                
            } else{
                echo "errore" . " " . $connection->error;
            }
        } else {
            echo "password errata";
        } 

    } else {
      echo  "non ci sono user";
    }
    
} else {
    echo "errore";
}

$connection->close();
?>