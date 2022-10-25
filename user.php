<?php
    @include 'config.php';

    session_start();

    if(!isset($_SESSION['user']))
    {
        header('location:login.php');
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" conten="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="userdiv">
    <h1 id="userh1">Witaj, <span><?php echo $_SESSION['user'] . '!!!'; ?></span></h1>
    <button id="logout"><a id="logouta" href="logout.php" >Wyloguj</a></button>
    </div>
</body>
</html>