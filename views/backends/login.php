<?php
session_start();
include "header.php";

if(isset($_SESSION['auth'])){
    header("location: admin.php");
}

?>

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

            <h2 class="mt-5 mb-5"><i class="fa-solid fa-right-to-bracket"></i> Please Login!</h2>
            <form action="../../controllers/loginController.php" method="POST">
                <div class="form-group">
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email : </label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email ">
                            <?php
                                if(isset($_SESSION['email'])){ ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $_SESSION['email'];
                                        ?>
                                    </p>
                                <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label for="password" class="form-label">Password : </label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control" id="password" placeholder="******* ">
                            <?php
                                if(isset($_SESSION['password'])){ ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $_SESSION['password'];
                                        ?>
                                    </p>
                                <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="add">
                    <div class="form-btn text-center mb-5">
                        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-circle-plus"></i> Login</button>
                        <button type="reset" class="btn btn-outline-danger"><i class="fa-solid fa-eraser"></i> Reset</button>
                    </div>
                </div>
            </form>
           </div>

<?php
include "footer.php";
?>