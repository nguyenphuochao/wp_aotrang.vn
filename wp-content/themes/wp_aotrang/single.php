<?php 
/* Template Name : Detail */
?>
<?php get_header(); ?>
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
    <div class="row mt-4">
        <!-- Get post mặt định -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-9">
                    <h1 class="title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                    <!-- Tính lượt view -->
                    <?php setPostViews(get_the_ID()); ?>
                    <!-- Like & share link FB -->
                    <div class="like_button_share_fb">
                        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="200px" data-layout="" data-action="" data-size="" data-share="true"></div>
                    </div>
                    <div class="tags text-orange mt-3">
                        <?php if (the_tags()) : ?>
                            Thẻ tìm kiếm: <?php the_tags(' ') ?>
                        <?php endif ?>
                    </div>
                    <!-- Start Hình banner nằm ngang -->
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <a href="https://tieuthuyet.vn/" target="_blank"><img width="100%" class="img-fluid" src="<?php bloginfo('template_directory') ?>/image/banner_tieuthuyet_ngang.jpg" alt="Tiểu thuyết"></a>
                        </div>

                    </div>
                    <!-- End Hình banner nằm ngang -->
                    <!-- Start Bài viết liên quan -->
                    <div class="related-articles mt-3">
                        <?php
                        $categories = get_the_category($post->ID);
                        if ($categories) {
                            $category_ids = array();
                            foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                            $args = array(
                                'category__in' => $category_ids,
                                'post__not_in' => array($post->ID),
                                'showposts' => 30, // Số bài viết bạn muốn hiển thị.
                                'caller_get_posts' => 1
                            );
                            $my_query = new wp_query($args);
                            if ($my_query->have_posts()) {
                                echo '<h3><strong>Bài viết cùng chuyên mục</strong></h3>';
                                echo ' <div class="row">';
                                while ($my_query->have_posts()) {
                                    $my_query->the_post();
                        ?>
                                    <div class="col-md-4 mb-2">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        <h6><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                                        <div class="content text-justify"><?php the_excerpt(); ?></div>
                                    </div>
                        <?php
                                }
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                    <!-- End Bài viết liên quan -->
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- Get post mặt định -->
        <div class="col-md-3 mt-2">
            <h6><strong>TIN MỚI NHẤT</strong></h6>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <!-- Bình luận -->
    <!-- <div class="comment-fb mt-2">
        <div class="fb-comments" data-href="<?php echo 'https:/' . $_SERVER['REQUEST_URI']; ?>" data-width="100%" data-numposts="5"></div>
    </div> -->
</div>

<?php get_footer(); ?>