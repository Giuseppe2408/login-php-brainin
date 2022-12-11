<?php 

require_once "config.php";

// $_POST = json_decode(file_get_contents('php://input'), true);

$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);
$hash_password = password_hash($password, PASSWORD_DEFAULT);


$query = "SELECT * FROM users WHERE email = '$email'";

if ($result = $connection->query($query)) {
    if ($result->num_rows == 1) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if (password_verify($password, $row['password'])) {
            session_start();

            $_SESSION['logged'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['cognome'] = $row['cognome'];

            header("location : area_privata.html");
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