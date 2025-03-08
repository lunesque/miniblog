<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create post</title>
</head>
<body>
    <h1>Create a new post</h1>
    <form action="index.php?action=traite-post" method="post">
        <label for="title">Titre</label><br>
        <input name="title" type="text"><br>

        <label for="content">Contenu</label><br>
        <textarea class="form-control" rows="5" name="content"></textarea>

        <input type="submit" value="Publish">
    </form>
</body>
</html>