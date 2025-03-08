<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    

</head>
<body>
    <h1>Archive</h1>

    <p>Sort by :
    <a href="index.php?action=archive&sort=date-recent">Most recent first</a>
    <a href="index.php?action=archive&sort=date-old">Oldest first</a>
    </p>


    <div class='container'>
        <div class="row justify-content-around">
    <?php
    foreach($posts as $post) {
        echo "<div class='col-3 m-3 border p-3'>";
        echo "<h2>".$post["title"]."</h2>";
        echo "<p class='m-0'>".substr($post["content"],0,100)."...</p>";
        echo "<a href='index.php?action=post&id_post=".$post["id_post"]."'>View entire post</a>";
        echo "</a></div>";
    }
    ?>

        </div>
    </div>
</body>
</html>