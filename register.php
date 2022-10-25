<?php

@include 'config.php';

if(isset($_POST['submit']))
{
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = md5($_POST['password']);
    $passc = md5($_POST['passwordc']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $select = " SELECT * FROM users WHERE user = '$user' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'Użytkownik już istnieje';
    }
    else
    {
        if($pass != $passc)
        {
            $error[] = 'Hasła nie pasują';
        }
        elseif(empty($user) or empty($email) or empty($pass) or empty($passc))
        {
            $error[] = 'Podaj dane!';
        }
        else
        {
            $insert = "INSERT INTO users(user, password, email) VALUES('$user', '$pass', '$email')";
            mysqli_query($conn, $insert);
            header('location: login.php');
        }
    }
};

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php


?>

<form id="reg" action="" method="post">
    <h1>Rejestracja</h1>
    <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '<span class="blad">'.$error.'</span>';
            };
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
    <div class="dane">
        <label for="passc">Potwierdź hasło</label>
        <input id="passwordc" name="passwordc" type="password">
    </div>
    <div class="dane">
        <label for="email">Email</label>
        <input id="email" name="email" type="email">
    </div>
    <input id="rejestracja" name="submit" type="submit" value="Rejestracja">
</form>
</body>
</html>