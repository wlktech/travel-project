<div class="col-md-6 offset-md-3">
    <h2 class="mt-5 user-head"><i class="fa-solid fa-list"></i> Post List</h2>

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
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>


    <?php 
    $no = 1;
    foreach($posts as $post){ ?>

        <tr>
        <th scope="row"><?php echo $no; ?></th>
        <td><?php echo $post['title'] ?></td>
        <td><?php echo $post['description'] ?></td>
        <td>
            <a class="text-success" href="admin.php?page=postedit&id=<?php echo $post['id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
            <a class="text-danger" href="../../controllers/PostController.php?action=delete&id=<?php echo $post['id'] ?>"><i class="fa-solid fa-user-minus"></i></a>
        </td>
        </tr>
        <tr>
        <?php $no++; } ?>
        
    </tbody>
    </table>
</div>