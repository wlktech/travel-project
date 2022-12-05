<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
            <h2 class="text-light mt-5"><i class="fa-solid fa-house-chimney"></i> Admin Panel</h2>
            <ul class="sidebar-list mt-4">
                <li><a href="admin.php?page=adduser"><i class="fa-solid fa-user-plus"></i> Add User</a></li>
                <li><a href="admin.php?page=userlist"><i class="fa-solid fa-users"></i> User List</a></li>
                <li><a href="admin.php?page=addpost"><i class="fa-solid fa-plus"></i> Add Post</a></li>
                <li><a href="admin.php?page=postlist"><i class="fa-solid fa-list"></i> Post List</a></li>
            </ul>
        </div>
        <div class="col-md-9 mt-1">