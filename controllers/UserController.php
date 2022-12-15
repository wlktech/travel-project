<?php
session_start();
include "../app/DB.php";
include "../app/User.php";

$db = new DB();
$connection = $db->connect();
$user = new User($connection);


if(isset($_POST['username'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($name == "" | $email == "" | $password == ""){
        if($name == ""){
            $_SESSION['name']= "User Name Must Not Be Empty";
        }

        if($email == ""){
            $_SESSION['email']= "Email Must Not Be Empty";
        }

        if($password == ""){
            $_SESSION['password']= "Password Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        

        if($_POST['action']=="add"){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $status = $user->create($name, $email, $password);
            if($status){
                $_SESSION['status'] = "User Created Successfully";
                $_SESSION['expire'] = time();
            }
            header("location:".$_SERVER["HTTP_REFERER"]);

        }else if($_POST['action']=="update"){
            $id = $_POST['id'];
            $status = $user->update($id, $name, $email, $password);
            if($status){
                $_SESSION['status'] = "User Updated Successfully";
                $_SESSION['expire'] = time();
            }
            header("location: ../views/backends/admin.php?page=userlist");
        }

    
    }
}

if(isset($_GET['action'])){
    if($_GET['action']=='delete'){
        $id=$_GET['id'];
        $status = $user->delete($id);
        if($status){
            $_SESSION['status'] = 'User Deleted Successfully';
            $_SESSION['expire'] = time();
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }
    }
}