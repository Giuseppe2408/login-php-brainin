<?php

session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("location: login.html");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>area privata</h1>
    <div>
        <?= "ciao" . $_SESSION["nome"] . " " .$_SESSION["cognome"]; ?>
    </div>
</body>
</html>