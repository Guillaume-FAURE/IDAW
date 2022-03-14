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
    if ($mysqli->query('DROP TABLE IF EXISTS peoples, MyGuests') === TRUE) {
        echo "DB restored successfully<br>";
    } else {
        echo "Error deleting tables: " . $mysqli->error;
    }
    if ($mysqli->query("CREATE TABLE peoples (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    pseudo VARCHAR(50) NOT NULL
    ) ") === TRUE) {
        echo "Table created successfully<br>";
    } else {
        echo "Error creating tables: " . $mysqli->error;
    }
    if ($mysqli->query("INSERT INTO peoples
    (login, password, pseudo)
VALUES ('william', 'bonjour', 'iWilli'),
('guillaume', 'bonsoir', 'Epistelmoz') ") === TRUE) {
        echo "Data inserted successfully<br>";
    } else {
        echo "Error creating tables: " . $mysqli->error;
    }
    $res = $mysqli -> query('SELECT id, login, password, pseudo FROM peoples');
    while ($row = $res->fetch_assoc()) {
        echo '<table>
        <tr>
        <td> id : ' . $row['id'] . '</td>
        </tr>
        <tr>
        <td> login :' . $row['login'] . '</td>
        </tr>
        <tr>
        <td> password :' . $row['password'] . '</td>
        </tr>
        <tr>
        <td> pseudo :' . $row['pseudo'] . '</td>
        </tr>
        </table>';
    }

    mysqli_close($mysqli);
?>
