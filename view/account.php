<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>My account</title>
</head>
<body>
    <h1>My account</h1>
    <p>Profile photo</p>
    <?php
    $file = "images/user-".$_SESSION["id_user"].".jpg";
    if (file_exists($file)) {
        $src = $file;
    } else $src = "images/default.png";
    echo "<img class='rounded-circle' width=200 height=200 src='".$src."'>"; 
    ?>
    <form method='post' enctype=multipart/form-data action='index.php?action=traite-photo'>
        <label for="photo">Change your profile photo :</label><br>
        <input type="file" accept="image" name="photo">
        <input type="submit" value="Upload">
    </form>

</body>
</html>