<?php 
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location: index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <header class="header">
        <nav class="nav">
            <ul>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div><h1>Bem Vindo</h1></div>
</body>

</html>