<?php include("includes/header.php"); ?>

<?php

$photos = Photo::find_all();



?>
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">

        <div class="row">
            <?php foreach ($photos as $photo) { ?>

                <div class="col-xs-6 col-md-3">

                    <a class="thumbnail" href="photo.php?id=<?php echo $photo->id ;?>">
                        <img class="img-responsive custome_thumb" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                    </a>

                </div>

            <?php } ?>
        </div>

    </div>




    <!-- Blog Sidebar Widgets Column -->
    <!-- <div class="col-md-4"> -->


        <?php //include("includes/sidebar.php"); 
        ?>

    <!-- </div> -->
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>