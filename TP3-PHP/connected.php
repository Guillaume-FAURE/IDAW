<?php
session_start();
// on simule une base de données
$users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'jedi',
    'willi' => 'mdr'
);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "idaw-php";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorText = "";
$successfullyLogged = false;
if (isset($_POST['login']) && isset($_POST['password'])) {
    $tryLogin = $_POST['login'];
    $tryPwd = $_POST['password'];
    $sql = 'SELECT login,pseudo,password FROM peoples WHERE login="' . $tryLogin . '" AND password="' . $tryPwd . '"';
    $result = mysqli_query($mysqli, $sql);
    if ($result->num_rows>0) {
        $successfullyLogged = true;
        $login = $tryLogin;
        $_SESSION['login'] = $login;
    } else
        $errorText = "Erreur de login/password";
} else
    $errorText = "Merci d'utiliser le formulaire de login";
if (!$successfullyLogged) {
    echo $errorText;
} else {
    echo "<h1>Bienvenu " . $login . "</h1>";
    echo 'session login : ' . $_SESSION['login'];
}
?>
</br> <a href="./index.php">retour</a>