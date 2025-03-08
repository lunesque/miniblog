<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<form action='index.php?action=traite-edit&id_post=".$post["id_post"]."' method='post'>";
    echo "<label for='title'>Titre</label><br>";
    echo "<input name='title' type='text' value='".$post["title"]."'><br>";

    echo "<label for='content'>Contenu</label><br>";
    echo "<textarea class='form-control' rows='5' name='content'>".$post["content"]."</textarea>";

    echo "<input type='submit' value='Publish'>";
    echo "</form>";
    ?>
</body>
</html>