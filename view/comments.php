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
    echo "<div class='m-5'>";
    foreach ($comments as $comment) {
        if (isset($_GET["mode"]) && $_GET["mode"]=="edit" && $comment["id_comment"]==$_GET["id_comment"]) {
            echo "<form action='index.php?action=edit-comment&id_post=".$comment["id_post"]."&id_comment=".$comment["id_comment"]."' method='post'>";
            echo "<textarea class='form-control' rows='2' name='comment'>".$comment["comment"]."</textarea>";
            echo "<input type='submit' value='Publish'>";
            echo "</form>";
        } else {
            echo "<div class='border p-2'><div class='d-flex align-items-center'>";
            $file = "images/user-".$comment["id_user"].".jpg";
            if (file_exists($file)) {
                $src = $file;
            } else $src = "images/default.png";
            echo "<img class='rounded-circle m-2' width=40 height=40 src='".$src."'>"; 
            echo "<p class='m-0'>".$comment["login"]."</p></div><p>".$comment["comment"]."<br>".$comment["date_comment"];
        }
        if (isset($_SESSION["id_user"])) {
            if ($_SESSION["id_user"]==$comment["id_user"]) {
                echo "<a class='mx-2' href='index.php?action=delete-comment&id_post=".$comment["id_post"]."comments=show&id_comment=".$comment["id_comment"]."'>Delete</a>";
                echo "<a href='index.php?action=post&id_post=".$comment["id_post"]."&comments=show&id_comment=".$comment["id_comment"]."&mode=edit'>Edit</a>";
            } elseif ($_SESSION["id_user"]==1) {
                echo "<a class='mx-2' href='index.php?action=delete-comment&id_post=".$comment["id_post"]."comments=show&id_comment=".$comment["id_comment"]."'>Delete</a>";
            }
        }
        echo "</p></div>";
    }
    echo "</div>";
    ?>
</body>
</html>