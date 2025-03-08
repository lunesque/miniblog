<?php
session_start();
require ("model.php");

if (!isset($_GET["action"])) {
    require("view/header.php");
    $stmt = numPosts("date-recent",3);
    $posts = $stmt->fetchall(PDO::FETCH_ASSOC);
    require("view/home.php");

} else {
    switch ($_GET["action"]) {
        //CONNEXION ET DECONNEXION
        case "login":
            require "view/header.php";
            require ("view/login.php");
            break;
            
        case "traite-login":
            $stmt = logIn();
            switch ($stmt) {
                case "bon":
                    header("location:index.php");
                    break;
                case "err-login":
                    header("location:index.php?action=login&err=login");
                    break;
                case "err-pass":
                    header("location:index.php?action=login&err=pass");
                    break;
                }
            break;
            
        case "logout":
            $stmt = logOut();
            header("location:index.php");
            break;
    
        // CREATION COMPTE
        case "create-account":
            require "view/header.php";
            require ("view/inscription.php");
            break;

        case "traite-inscription":
            $stmt = createAccount();
            header("location:index.php?action=create-account&".$stmt);
            break;
    
        //GESTION DES COMPTE
        case "account":
            require "view/header.php";
            require "view/account.php";
            break;
            
        case "traite-photo":
            $stmt = uploadPhoto();
            header("location:index.php?action=account");
            break;

        case "admin":
            $stmt = allUsers();
            $users = $stmt->fetchall(PDO::FETCH_ASSOC);
            require "view/header.php";
            require "view/admin.php";
            break;
        
        //not working
        case "delete-user":
            $stmt = deleteUser();
            header("location:index.php?action=admin");
            break;

        //POSTS & COMMENTAIRES
        case "create-post":
            require "view/header.php";
            require "view/create-post.php";
            break;

        case "traite-post":
            $stmt = createPost();
            header("location:index.php");
            break;

        case "delete-post":
            $stmt = deletePost();
            header("location:index.php");
            break;

        case "edit-post":
            require "view/header.php";
            $stmt = onePost();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            require "view/edit-post.php";
            break;

        case "traite-edit":
            $stmt = editPost();
            header("location:index.php?action=post&id_post=".$_GET["id_post"]);
            break;
    

        case "post": 
            require("view/header.php");
            $stmt = onePost();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            require "view/post.php";
            $stmt2 = allComments();
            $comments = $stmt2->fetchall(PDO::FETCH_ASSOC);
            if (isset($_GET["comments"]) && $_GET["comments"]=="show") {
                require "view/comments.php";
            }
            break;

            
        case "archive":
            if (isset($_GET["sort"])) {
                switch ($_GET["sort"]) {
                    case "date-recent":
                        $stmt = numPosts("date-recent");
                        break;
                    case "date-old":
                        $stmt = numPosts("date-old");
                        break;
                    default:
                        $stmt = numPosts();
                        break;
                } 
            } else $stmt = numPosts();
            $posts = $stmt->fetchall(PDO::FETCH_ASSOC);
            require "view/header.php";
            require "view/archive.php";
            break;
    
        case "traite-comment":
            $stmt = addComment();
            header("location:index.php?action=post&id_post=".$_GET["id_post"]."&comments=show");
            break;
    
        case "delete-comment":
            $stmt = deleteComment();
            header("location:index.php?action=post&id_post=".$_GET["id_post"]."&comments=show");
            break;

            //not working
        case "edit-comment":
            $stmt = editComment();
            header("location:index.php?action=post&id_post=".$_GET["id_post"]."&comments=show");
            break;
    
        default:
            require("view/header.php");
            $stmt = numPosts("date-recent",3);
            $posts = $stmt->fetchall(PDO::FETCH_ASSOC);
            require("view/home.php");
            break;
    }
    
}



?>