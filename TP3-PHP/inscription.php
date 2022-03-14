<!DOCTYPE html>
<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dataBase = 'idaw-php';
    $mysqli = new mysqli($serverName, $userName, $password, $dataBase);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    echo "Connected successfully<br>";

    if (isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin = $_POST['login'];
        $tryPwd = $_POST['password'];
        $tryPseudo = $_POST['pseudo'];
        if ($mysqli->query("INSERT INTO peoples (login, password, pseudo)
        VALUES ('$tryLogin', '$tryPwd', '$tryPseudo')") === TRUE) {
            echo "Data inserted successfully<br>";
        } else {
            echo "Error inserted data: " . $mysqli->error;
        }
    } else
        $errorText = "Merci d'utiliser le formulaire d'inscription";
    if (!$successfullyLogged) {
        echo $errorText;
    } else {
        echo "<p>Bienvenu " . $trylogin . $tryPseudo . $tryP . "</p>";
        echo 'session login : ' . $_SESSION['login'];
    }
    ?>
    </br> <a href="./index.php">retour</a>
?>
