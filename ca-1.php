<?php get_header(); ?>
<div class="container">

    <div class="row mt-3">
        <div class="col-md-10">
            <!-- Section 1 -->
            <div class="row">
                <!-- Get post News Query -->
                <?php
                $category_id = get_queried_object_id();

                ?>
                <?php $getposts = new WP_query();
                $getposts->query('post_status=publish&showposts=2&post_type=post&cat=' . $category_id); ?>
                <?php global $wp_query;
                $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                    <div class="col-md-6">
                        <img height="250px" width="100%" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                        <h6 class="mt-2"><strong><?php the_title(); ?></strong></h6>
                        <div class="content">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
                <!-- Get post News Query -->
            </div>
            <!-- End Section 1 -->
            <!-- Section 2 -->
            <div class="row mt-3">
                <!-- Get post News Query -->
                <?php $getposts = new WP_query();
                $getposts->query('post_status=publish&showposts=3&post_type=post&offset=2&cat=' . $category_id); ?>
                <?php global $wp_query;
                $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                    <div class="col-md-4">
                        <img width="100%" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                        <h6><strong><?php the_title(); ?></strong></h6>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
                <!-- Get post News Query -->
            </div>
            <!-- End Section 2 -->
            <!-- Section 3 -->
            <div class="row mt-3">
                <!-- Get post News Query -->
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
                <?php $getposts = new WP_query();
                $getposts->query('post_status=publish&showposts=12&post_type=post&offset=5&cat=' . $category_id); ?>
                <?php global $wp_query;
                $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                    <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                    <div class="col-md-4 mb-2">
                        <img width="100%" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="col-md-8 mb-2">
                        <h6><strong><?php the_title(); ?></strong></h6>
                        <div class="content"><?php the_excerpt(); ?></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
                <!-- Get post News Query -->
            </div>
            <!-- End Section 3 -->
            <!-- Phân trang -->
            <!-- <div aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div> -->
            <?php
            echo paginate_links(array(
                'total' => $getposts->max_num_pages,
                'current' => max(1, $paged),
                'format' => '?paged=%#%',
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
            ));
            ?>



        </div>
        <div class="col-md-2">
            <h2>Tin Mới</h2>
        </div>
    </div>
</div>
<?php get_footer(); ?>