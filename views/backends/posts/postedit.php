<nav aria-label="breadcrumb" class="bread">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration:none;" href="#">Posts</a></li>
        <li class="breadcrumb-item active">Edit Post</li>
    </ol>
</nav>
<div class="col-md-6 offset-md-3 mt-5 bg-dark text-white py-3 px-5">

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

        <h2 class="mt-5 mb-5"><i class="fa-solid fa-plus"></i> Edit Post</h2>
        <form enctype="multipart/form-data" action="../../controllers/PostController.php" method="POST">
        <div class="form-group">
            <div class="row my-3">
                <div class="col-md-4">
                    <label for="title" class="form-label">Title : </label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $post['title']  ?>">
                    <?php
                        if(isset($_SESSION['title'])){ ?>
                            <p class="text-danger">
                            <?php 
                            echo $_SESSION['title'];
                            ?>
                            </p>
                            <?php 
                            }
                            ?>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-4">
                    <label for="description" class="form-label">Description : </label>
                </div>
                <div class="col-md-8">
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" ><?php echo $post['description']  ?></textarea>
                    <?php
                        if(isset($_SESSION['des'])){ ?>
                        <p class="text-danger">
                        <?php 
                        echo $_SESSION['des'];
                        ?>
                        </p>
                        <?php 
                        }
                        ?>
                </div>
            </div>  
            
            <div class="row my-3">
                <div class="col-md-4">
                    <label for="image" class="form-label">Image : </label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control" name="image">
                    <?php
                    if(isset($_SESSION['image'])){ ?>
                    <p class="text-danger">
                    <?php 
                    echo $_SESSION['image'];
                    ?>
                    </p>
                    <?php 
                    }
                    ?>
                </div>
            </div>


            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            <div class="form-btn text-center mb-5">
                <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-circle-plus"></i> Update</button>
                <button type="reset" class="btn btn-outline-danger"><i class="fa-solid fa-eraser"></i> Reset</button>
            </div>
        </div>
        </form>
</div>
        