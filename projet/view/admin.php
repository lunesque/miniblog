<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <title>Administration</title>
</head>
<body>
    <h1>User moderation</h1>
    <?php
        if (isset($_SESSION["login"]) && $_SESSION["id_user"]==1) {
            echo "<table style='width:400px' class='table table-striped'><thead><tr><th>N°</th><th>Login</th><th></th></tr></thead><tbody>";
            $i = 1;
            foreach ($users as $user) {
                if ($user["id_user"]!==1) {
                    echo "<tr>";
                    echo "<td>".$i."</td><td>".$user["login"]."</td>";
                    echo "<td><a href='index.php?action=delete-user&id_user=".$user["id_user"]."'>Delete</a></td>";
                    echo "</tr>";
                    $i++;
                }
            }
            echo "</tbody></table>";
        }
    ?>
</body>
</html>