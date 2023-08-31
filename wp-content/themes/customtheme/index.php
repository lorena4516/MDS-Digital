    <?php get_header();?>
    <div class="container-fluid portada d-flex flex-colum justify-content-center align-items-center flex-direction-column">
        <div class="text-center">
            <h1 class="display-4">Lorem ipsum dolor sit </h1>
        </div>
        
    </div> 
    <!-- contenido -->
    <div class="container my-5">
        <div class="row">
            <?php if(have_posts()):while(have_posts()):the_post();?>
            <div class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'post-thumbnails', array( 'class' => 'card-img-top img-fluid' ) );
                            }
                        ?>
                    </a>
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <?php echo get_the_date();?> / <?php the_category(', '); ?> / <?php the_author(); ?>
                        </small>
                    </div>
                </div>
            </div>
            <?php endwhile;endif; ?>
        </div>
    </div>
    
    <!-- footer -->
    <?php get_footer();?>
   
    </body>
</html>