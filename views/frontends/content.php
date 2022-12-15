<!-- Content Start -->
<div class="container-fluid mt-3" id="content">
    <div class="row">
        <?php foreach($posts as $post){ ?>

        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="card my-3">
                <img src="./assets/posts/<?php echo $post['image']; ?>" class="card-img-top" style="height:250px" alt="">
                <div class="m-4">
                    <h4 class="text-center text-danger mb-3"><?php echo $post['title'] ?></h4>
                    <p class="mb-4" style="font-size:17px;"><?php echo substr($post["description"], 0,200) ?></p>
                    <a style="margin:0 100px;" class="btn btn-outline-danger d-block" href="index.php?page=detail&id=<?php echo $post['id'] ?>">View More</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- Content End -->