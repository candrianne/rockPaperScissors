<?php session_start();
$mysqli = new mysqli('localhost', 'root', NULL, 'ppc');

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

/*
 * Use this instead of $connect_error if you need to ensure
 * compatibility with PHP versions prior to 5.2.9 and 5.3.0.
 */
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}

if (!empty($_POST)) {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        // Getting submitted user data from database
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE login = ?");
        $stmt->bind_param('s', $_POST['login']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();
        $mysqli->close();

        if(!empty($_POST["password"]) && password_verify($_POST["password"], password_hash($user->password, PASSWORD_DEFAULT))) {
            $_SESSION['user_id'] = $user->login;
            $_SESSION['user_score'] = $user->user_score;
            $_SESSION['comp_score'] = $user->comp_score;
            header("Location: /rockPaperCissors/game.php");
            exit;
        }
        else {
            header("Location: /rockPaperCissors/?wrong=true");
            exit;
        }
    }
}
