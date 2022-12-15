<?php
session_start();
include "../../app/DB.php";
include "../../app/User.php";
include "../../app/Post.php";

$db = new DB();
$connection = $db->connect();
$user = new User($connection);
$postDB = new Post($connection);

if(!isset($_SESSION['auth'])){
    header("location: login.php");
}

include "./header.php";
include "./sidebar.php";
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page=="adduser"){
        include "./users/adduser.php";
    }else if($page=="userlist"){
        $users = $user->getAll();
        include "./users/userlist.php";
    }else if($page == "useredit"){
        $id = $_GET['id'];
        $userData = $user->get($id);
        include "./users/useredit.php";
    }else if($page == "addpost"){
        include "./posts/addpost.php";
    }else if($page == "postlist"){
        $posts = $postDB->getAll();
        include "./posts/postlist.php";
    }else if($page == "postedit"){
        $id = $_GET['id'];
        $post = $postDB->get($id);
        include "./posts/postedit.php";
    }
}
include "./footer.php";