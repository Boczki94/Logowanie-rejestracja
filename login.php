<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM users WHERE user = '$user' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['user'] = $user;
        header('location:user.php');
    }
    else
    {
       $error[] = 'Błędne hasło lub użytkownik!';
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <form id="log" action="" method="post">
        <h1>Zaloguj się</h1>
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '<span class="blad">'.$error.'</span>';
            }
        };
        ?>
        <div class="dane">
            <label for="user">Nazwa użytkownika</label>
            <input id="user" name="user" type="text">
        </div>
        <div class="dane">
            <label for="password">Hasło</label>
            <input id="password" name="password" type="password">
        </div>
        <input id="Zaloguj" name="submit" type="submit" value="Zaloguj">
        <p>Nie masz konta? <a href="register.php">Zarejestruj się!</a></p>
    </form>
    
</body>
</html>