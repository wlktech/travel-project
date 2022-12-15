<div class="col-md-9 mt-1">
<div class="col-md-6 offset-md-3">
    <h2 class="mt-5 user-head"><i class="fa-solid fa-users"></i> User List</h2>

    <?php if(isset($_SESSION['expire'])){
        $diff = time() - $_SESSION['expire'];
        if($diff > 2){
            unset($_SESSION['status']);
            unset($_SESSION['expire']);
        }
        }
    ?>
    <?php if(isset($_SESSION['status'])){ ?>   
        <div class="alert alert-success alert-dismissible fade show" role="alert">

        <?php echo $_SESSION['status'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php }?>

    <table class="table table-hover mt-4">
    <thead class="bg-dark text-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>


    <?php 
    $no = 1;
    foreach($users as $user){ ?>

        <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td><?php echo $user['username'] ?></td>
        <td><?php echo $user['email'] ?></td>
        <td>
            <a class="text-success" href="admin.php?page=useredit&id=<?php echo $user['id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
            <a class="text-danger" href="../../controllers/UserController.php?action=delete&id=<?php echo $user['id'] ?>"><i class="fa-solid fa-user-minus"></i></a>
        </td>
        </tr>
        <tr>
        <?php $no++; } ?>
        
    </tbody>
    </table>
</div>