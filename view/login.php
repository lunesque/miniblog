<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <?php
    if (isset($_GET["err"])) {
        switch ($_GET["err"]) {
            case "login": 
                echo "<p>Ce login n'existe pas. Veuillez reessayer ou <a href='index.php?action=create-account'>creer un compte</a>.</p>";
                break;
            case "pass":
                echo "<p>Votre password est incorrecte. Veuillez reessayer.</p>";
                break;
        }
    }
    ?>
    <form method="post" action="index.php?action=traite-login">
        <label for="login">Login : <br></label>
        <input type="text" name="login">
        <br>
        <label for="Password">Password : <br></label>
        <input type="password" name="pass">
        <br>
        <input type="submit" value="Log In">
    </form>
</body>
</html>