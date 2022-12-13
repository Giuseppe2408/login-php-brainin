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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">    
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <form action="php/logout.php">
                    <button class="nav-link bg-transparent border-0" type="submit">Logout</button>
                </form>
            </li>           
            
          </ul>
        </div>
    </nav>
       
    <div class="container">
        <h1>area privata</h1>
        <?= "ciao" . " " . $_SESSION["nome"] . " " .$_SESSION["cognome"]; ?>
        
    </div>
</body>
</html>