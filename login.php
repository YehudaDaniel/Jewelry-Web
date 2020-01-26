<?php
session_start();
if(isset($_SESSION['Userid'])){
    header('Location: ./index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" />
</head>
<body>
    <form action="includes/loginCheck.php" method="post">

        <div class="Username-section">
            <input type="text" name="User" autocomplete="off" required />
            <label for="User" class="Username-label">
                <span class="label-content">Username</span>
            </label>
        </div>

        <div class="Password-section">
            <input type="password" name="Password" autocomplete="off" required />
            <label for="password" class="Password-label">
                <span class="label-content">Password</span>
            </label>
        </div>
        <div class="Login-submit">
            <button type="submit" name="Login-submit">Login</button>
        </div>
    </form>
</body>
</html>