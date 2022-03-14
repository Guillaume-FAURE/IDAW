<div class="form">
    <form id="login_form" action="./connected.php" method="POST">
        <table>
            <tr>
                <th>Login :</th>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <th>Mot de passe :</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Se connecter..." /></td>
            </tr>
        </table>
    </form>
    <form id="inscription_form" action="./inscription.php" method="POST">
        <table>
            <tr>
                <th>Login :</th>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <th>Mot de passe :</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th>Pseudo :</th>
                <td><input type="text" name="pseudo"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Inscrire" /></td>
            </tr>
        </table>
    </form>


    <form id="style_form" action="./index.php" method="GET">
        <select onchange="" name="css">
            <option value="style1">style1</option>
            <option value="style2">style2</option>
        </select>
        <input type="submit" value="Appliquer" />
    </form>
</div>


<?php
session_start();

if (isset($_GET['css'])) {
    echo '<link rel="stylesheet" href=./' . $_GET['css'] . '.css />';
    setcookie('css', $_GET['css']);
    if (!isset($_COOKIE['css'])){
        echo '<link rel="stylesheet" href=./' . $_COOKIE['css'] . '.css />';
    }
} else {
    echo '<link rel="stylesheet" href=./style1.css />';
}
?>
<form method="post" action="./index.php">
    <input type="submit" name="disconnect" id="disconnect" value="Kill session" /><br />
</form>
<?php
if (array_key_exists('disconnect', $_POST)) {
    setcookie("css", "", time() - 3600);
    session_destroy();
}
?>