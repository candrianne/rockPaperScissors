<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <form action="connect.php" method="post" id="box">
        <h1>Login</h1>
        <input type="text" name="login" placeholder="username">
        <input type="password" name="password" placeholder="password" style="<?php if (isset($_GET["wrong"])) echo 'border-color : red;' ?>">
        <input type="submit" value="Login">
    </form>
</body>
</html>