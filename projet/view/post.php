<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Post</title>
</head>
<body>
    <div class="d-flex flex-column align-items-center">
    <?php
        echo "<div class='col-10 border p-3 m-5'><h2>".$post["title"]."</h2>";
        echo "<p>".$post["content"]."</p>";

        if (isset($_SESSION["id_user"]) && $_SESSION["id_user"]=="1") {
            echo "<a class='mx-2' href='index.php?action=edit-post&id_post=".$post["id_post"]."'>Edit Post</a>";
            echo "<a href='index.php?action=delete-post&id_post=".$post["id_post"]."'>Delete Post</a>";
        }
        echo "</div>";

        if (isset($_SESSION["login"])) {
            echo "<p class='m-0 col-10'>Leave a comment<p>";
            echo "<form class='col-10' method='post' action='index.php?action=traite-comment&id_post=".$post["id_post"]."'>";
            echo "<textarea class='form-control' name='comment'></textarea>";
            echo "<input type='submit' value='Comment'></form>";
        }


        if (isset($_GET["comments"])) {
            switch ($_GET["comments"]) {
                case "show":
                    echo "<a href='index.php?action=post&id_post=".$post["id_post"]."&comments=hide'>Hide comments</a>";
                    break;
                case "hide":
                    echo "<a href='index.php?action=post&id_post=".$post["id_post"]."&comments=show'>View comments</a>";
                    break;
            }
        } else echo "<a href='index.php?action=post&id_post=".$post["id_post"]."&comments=show'>View comments</a>";


    ?>
    </div>

        

    

</body>
</html>