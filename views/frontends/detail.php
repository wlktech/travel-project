<!-- Content Start -->
<div class="container-fluid mt-3" id="content">
    <div class="row">
        

        <div class="col-md-4 offset-md-4 col-12">
            <div class="card my-3">
                <img src="./assets/posts/<?php echo $post['image']; ?>" class="card-img-top" alt="">
                <div class="m-4">
                    <h4 class="text-center text-danger mb-3"><?php echo $post['title'] ?></h4>
                    <p class="mb-4" style="font-size:17px;"><?php echo $post["description"] ?></p>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Content End -->