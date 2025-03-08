<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul class="list-group list-group-horizontal">
            <li class='list-group-item'><a href="index.php">Home</a></li>
            <?php
            if (isset($_SESSION["login"])) {
                if ($_SESSION["id_user"]==1) {
                    echo "<li class='list-group-item'><a href='index.php?action=create-post'>Create Post</a></li>";
                    echo "<li class='list-group-item'><a href='index.php?action=admin'>Administration</a></li>";
                }
                echo "<li class='list-group-item'><a href='index.php?action=account'>My account</a></li>";
                echo "<li class='list-group-item'><a href='index.php?action=logout'>Log Out</a></li>";
            } else {
                echo "<li class='list-group-item'><a href='index.php?action=login'>Log In</a></li>";
                echo "<li class='list-group-item'><a href='index.php?action=create-account'>Create a new account</a></li>";
            }
            ?>
            <li class='list-group-item'><a href="index.php?action=archive">Archive</a></li>
        </ul>
    </nav>
</body>
</html>