<?php
require_once "config.php";
$_POST = json_decode(file_get_contents('php://input'), true);

$nome = $connection->real_escape_string($_POST['nome']);
$cognome = $connection->real_escape_string($_POST['cognome']);
$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);
$codice_Fiscale = $connection->real_escape_string($_POST['codice_Fiscale']);
$sesso = $connection->real_escape_string($_POST['sesso']);
$compleanno = $connection->real_escape_string($_POST['compleanno']);
$luogo_di_nascita = $connection->real_escape_string($_POST['luogo_di_nascita']);

//password hashata
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$error = '';

if (empty($nome)) {
    $error = "inserisci il nome";
} 
else if (empty($cognome)) {
    $error = "inserisci il cognome";
}
else if (empty($email)) {
    $error = "inserisci l' email";
}
else if (empty($password)) {
    $error = "inserisci la password";
}
else if (empty($codice_Fiscale)) {
    $error = "inserisci il codice fiscale";
}
else if (empty($sesso)) {
    $error = "inserisci il sesso";
}
else if (empty($compleanno)) {
    $error = "inserisci la tua data di nascita";
}
else if (empty($luogo_di_nascita)) {
    $error = "inserisci il luogo di nascita";
}





$query = "INSERT INTO users (nome, cognome, email, password, codice_Fiscale, sesso, compleanno, luogo_di_nascita) 
        VALUES ('$nome', '$cognome', '$email', '$hash_password', '$codice_Fiscale', '$sesso', '$compleanno', '$luogo_di_nascita')";


if($connection->query($query) == true) {
        echo "registrazione avvenuta";
} else{
        echo "errore" . " " . $connection->error;
}

?>