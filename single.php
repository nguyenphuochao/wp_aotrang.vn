<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="container detail">
            <!-- Breadcrumb -->
            <div class="mt-3">
                <span><a class="text-orange" href="<?php echo home_url(); ?>">Trang chủ</a></span>
                <i class="fa-solid fa-chevron-right"></i>
                <span><a class="text-orange" href="<?php the_permalink(); ?>"><?php echo get_the_category()[0]->name ?></a></span>
                <i class="fa-solid fa-chevron-right"></i>
                <span class="text-grey"><?php the_title(); ?></span>
            </div>
            <!-- End Breadcrumb -->
            <!-- Breadcrumb Sub -->
            <div class="mt-3">
                <span class="text-grey mr-3"><i class="fa-regular fa-clock"></i> <?php echo get_the_date('d/m/Y') ?></span>
                <span><a class="text-grey" href="<?php the_permalink(); ?>"><i class="fa-regular fa-folder"></i> <?php echo get_the_category()[0]->name ?></a></span>
            </div>
            <!-- End Breadcrumb Sub -->
            <!-- Get post mặt định -->
            <div class="row mt-4">
                <div class="col-md-10">
                    <h2 class="title">
                        <?php the_title(); ?>
                    </h2>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-md-2">
                    Được xem nhiều
                </div>
            </div>
            <!-- Get post mặt định -->
            <div class="tags text-orange">
                Thẻ tìm kiếm: <?php the_tags(' ') ?>
            </div>
            <div class="related-articles mt-3">
                <?php
                $categories = get_the_category($post->ID);
                if ($categories) {
                    $category_ids = array();
                    foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                    $args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post->ID),
                        'showposts' => 4, // Số bài viết bạn muốn hiển thị.
                        'caller_get_posts' => 1
                    );
                    $my_query = new wp_query($args);
                    if ($my_query->have_posts()) {
                        echo '<h3>Bài viết cùng chuyên mục</h3>';
                        echo ' <div class="row">';
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                ?>
                            <div class="col-md-3">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                <h4 class="mt-2"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                <?php
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="comment-fb">
                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    <?php endwhile;
    ?>
<?php endif; ?>
<?php get_footer(); ?>