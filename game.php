<?php session_start();
$mysqli = new mysqli('localhost', 'root', NULL, 'ppc');

if (array_key_exists('save', $_POST)) {
    $stmt = $mysqli->prepare("UPDATE user SET user_score = ?, comp_score = ? WHERE login = ?");
    $stmt->bind_param('iis', $_SESSION['user_score'], $_SESSION['comp_score'], $_SESSION["user_id"]);
    $stmt->execute();
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Paper Cissors</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Asap:wght@400;500;700&display=swap');
    </style>
    <script src="./app.js"></script>
</head>
</body>
<header>
    <h1>Rock Paper Scissors</h1>
</header>
<div class="scoreBoard">
    <div id="user" class="badge"><?php echo  $_SESSION["user_id"] ?></div>
    <div id="comp" class="badge">comp</div>
    <span id="user-score"><?php echo  $_SESSION["user_score"] ?></span>:<span id="comp-score"><?php echo  $_SESSION["comp_score"] ?></span>
</div>
<div class="result">
    <p>:)</p>
</div>
<div class="choices">
    <div class="choice">
        <img id="r" src="./images/rock.png" alt="">
    </div>
    <div class="choice">
        <img id="p" src="./images/paper.png" alt="">
    </div>
    <div class="choice">
        <img id="s" src="./images/scissors.png" alt="">
    </div>
</div>
<p id="action-message">make your move</p>
<form action="" method="post">
    <div id="save"><button type="submit" name="save">save</button></div>
</form>
</body>
</html>