<?php
function dbConnect() {
    $db=new PDO('mysql:localhost;dbname=tnguyen_miniprojet;port=3306', 'tnguyen_miniprojet', 'Yuzuru4a!');
    return $db;
}

// GESTION DES COMPTES
function logIn() {
    $db=dbConnect();
    $login = $_POST["login"];
    $pass = $_POST["pass"];

    $requete = "SELECT id_user,login, password FROM user WHERE login=:login";
    $stmt = $db->prepare($requete);
    if (isset($login)) {
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    }
    $stmt->execute();

    if ($utilisateur=$stmt->fetch()) {
        if (password_verify($pass, $utilisateur["password"])) {
            $_SESSION["id_user"] = $utilisateur["id_user"];
            $_SESSION["login"] = $utilisateur["login"];
            return "bon";
        }
        else {
            return "err-pass";
        }
    }
    else {
        return "err-login";
    }
}

function logOut() {
    $_SESSION=array();
    session_destroy();
}

function createAccount() {
    $db=dbConnect();
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $requete = "SELECT login FROM user WHERE login=:login";
    $stmt = $db->prepare($requete);
    if (isset($login)) {
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    }
    $stmt->execute();
    if ($utilisateur=$stmt->fetch()) {
        return "err=login";
    } else {
        $requete = "INSERT INTO user VALUES (NULL,:login,:pass)";
        $stmt = $db->prepare($requete);

        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt->bindValue(":pass", $hash, PDO::PARAM_STR);
        
        $stmt->execute();
        return "creation=bon";
    }
}

function uploadPhoto() {
    $target_file = "images/user-".$_SESSION["id_user"].".jpg";
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
}


function deleteUser() {
    $db=dbConnect();
    $requete = "DELETE FROM user WHERE id_user=:id_user";
    $stmt=$db->prepare($requete);
    if (isset($_GET["id_user"])) {
        $stmt->bindValue(":id_user", $_GET["id_user"], PDO::PARAM_INT);
    }
    $stmt->execute();
}


// MANIPULATION DES CONTENUS & COMMENTAIRES
function createPost() {
    $db=dbConnect();
    $title = $_POST["title"];
    $content = $_POST["content"];
    $requete = "INSERT INTO post VALUES (NULL,:title,:content, DEFAULT)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":title", $title, PDO::PARAM_STR);
    $stmt->bindValue(":content", $content, PDO::PARAM_STR);
    $stmt->execute();
}

function deletePost() {
    $db=dbConnect();
    $requete = "DELETE FROM post WHERE id_post=:id_post";
    $stmt=$db->prepare($requete);
    if (isset($_GET["id_post"])) {
        $stmt->bindValue(":id_post", $_GET["id_post"], PDO::PARAM_INT);
    }
    $stmt->execute();
}

function editPost() {
    $db=dbConnect();
    $requete="UPDATE post SET title=:title, content=:content WHERE id_post=:id_post";
    $stmt=$db->prepare($requete);
    $stmt->bindValue(":id_post", $_GET["id_post"], PDO::PARAM_INT);
    $stmt->bindValue(":title", $_POST["title"], PDO::PARAM_STR);
    $stmt->bindValue(":content", $_POST["content"], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function addComment() {
    $db=dbConnect();
    $id_post = $_GET["id_post"];
    $id_user = $_SESSION["id_user"];
    $comment = $_POST["comment"];
    $requete = "INSERT INTO comment VALUES (NULL,:id_post,:comment,:id_user, DEFAULT)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":id_post", $id_post, PDO::PARAM_STR);
    $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
    $stmt->bindValue(":id_user", $id_user, PDO::PARAM_STR);
    $stmt->execute();
}

function deleteComment() {
    $db=dbConnect();
    $requete = "DELETE FROM comment WHERE id_comment=:id_comment";
    $stmt=$db->prepare($requete);
    if (isset($_GET["id_comment"])) {
        $stmt->bindValue(":id_comment", $_GET["id_comment"], PDO::PARAM_INT);
    }
    $stmt->execute();
}

function editComment() {
    $db=dbConnect();
    $requete="UPDATE comment SET comment=:comment WHERE id_comment=:id_comment";
    $stmt=$db->prepare($requete);
    $stmt->bindValue(":id_comment", $_GET["id_comment"], PDO::PARAM_INT);
    $stmt->bindValue(":comment", $_POST["comment"], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}


// AFFICHAGE
function numPosts($sort = NULL,$num = NULL) {
    $db=dbConnect();
    $requete = "SELECT * FROM post";
    if (isset($sort)) {
        if ($sort=="date-recent") {
            $requete.=" ORDER BY date DESC";
        } elseif ($sort=="date-old") {
            $requete.=" ORDER BY date ASC";
        }
    }
    if (isset($num) && gettype($num) == "integer") {
        $requete.= " LIMIT ".$num;
    }
    $stmt = $db->query($requete);
    return $stmt;
}



function onePost() {
    $db=dbConnect();
    $requete="SELECT * FROM post WHERE id_post=:id_post";
    $stmt=$db->prepare($requete);
    if (isset($_GET["id_post"])) {
        $stmt->bindValue(":id_post", $_GET["id_post"], PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt;
}

function allComments() {
    $db=dbConnect();
    $requete = "SELECT id_comment, comment.id_post, comment, login, comment.id_user, date_comment FROM comment JOIN user ON user.id_user=comment.id_user WHERE id_post=:id_post";
    $stmt=$db->prepare($requete);
    if (isset($_GET["id_post"])) {
        $stmt->bindValue(":id_post", $_GET["id_post"], PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt;
}

function allUsers() {
    $db=dbConnect();
    $requete = "SELECT id_user,login FROM user";
    $stmt=$db->prepare($requete);
    $stmt->execute();
    return $stmt;
}


?>