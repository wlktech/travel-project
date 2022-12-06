<?php
session_start();
include "../app/DB.php";
include "../app/Post.php";

$db = new DB();
$connection = $db->connect();
$postDB = new Post($connection);


if(isset($_POST['title'])){
    $title = $_POST['title'];
    $des = $_POST['description'];
    $image = $_FILES['image']['name'];

    if($title == "" | $des == "" | $image == ""){
        if($title == ""){
            $_SESSION['title'] = "Title Must Not Be Empty";
        }
        if($des == ""){
            $_SESSION['des'] = "Description Must Not Be Empty";
        }
        if($image == ""){
            $_SESSION['image'] = "Image Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['title']);
        unset($_SESSION['des']);
        unset($_SESSION['image']);

        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = "../assets/posts/";
        $saveImageName = uniqid().$image;
        move_uploaded_file($tmp_name,$folder.$saveImageName);

        if($_POST['action'] == 'add'){
            $status = $postDB->create($title, $des, $saveImageName);
            if($status){
                $_SESSION['status'] = "Post Created Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Post Fail";
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);

        }else if($_POST['action'] == 'update'){
            $id = $_POST['id'];
            $status = $postDB->update($id, $title, $des, $saveImageName);
            if($status){
                $_SESSION['status'] = "Post Updated Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Post Updated Fail";
            }
            header("location: ../views/backends/admin.php?page=postlist");
        }
    }
}

if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        $id = $_GET['id'];
        $status = $postDB->delete($id);
        if($status){
            $_SESSION['status'] = 'Post Deleted Successfully';
            $_SESSION['expire'] = time();
            header('location: '.$_SERVER["HTTP_REFERER"]);
        }
    }
}