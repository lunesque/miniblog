<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <?php
    if (isset($_GET["err"])) {
        switch ($_GET["err"]) {
            case "login": 
                echo "Ce login existe deja. Merci de choisir un autre.";
                break;
            default:
                echo "Erreur, veuillez reessayez.";
                break;
        }
    }

    if (isset($_GET["creation"])) {
        echo "Vous etes incrit. ";
        echo "<a href='index.php?action=login'>Log In</a> avec ton nouveau compte.";
    } else {
    ?>
    <form action="index.php?action=traite-inscription" method="post">
        <label for="login">Login :</label><br>
        <input type="text" name="login"><br>

        <label for="pass">Mot de passe :</label><br>
        <input type="password" name="pass"><br>

        <input type="submit" value="Inscrire">
    </form>

    <?php }?>
</body>
</html>