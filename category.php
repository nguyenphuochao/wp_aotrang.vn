<?php get_header(); ?>
<div class="container category">
    <div class="row mt-3">
        <div class="col-md-10">
            <!-- Section 1 -->
            <div class="row">
                <!-- Get post mặt định -->
                <?php $i = 0; ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if ($i < 2) { ?>
                            <div class="col-md-6">
                                <div class="image-thumnail-1"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a></div>
                                <h6 class="mt-2"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                                <div class="content">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php $i++ ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- Get post mặt định -->
            </div>
            <!-- End Section 1 -->
            <!-- Section 2 -->

            <div class="row mt-3">
                <!-- Get post mặt định -->
                <?php $i = 0; ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if ($i > 1 && $i < 5) : ?>
                            <div class="col-md-4">
                                <div class="image-thumnail-2"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a></div>
                                <h6 class="mt-2"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                            </div>
                        <?php endif ?>
                        <?php $i++ ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- Get post mặt định -->
            </div>
            <!-- End Section 2 -->
            <!-- Section 3 -->
            <div class="row mt-3">
                <!-- Get post mặt định -->
                <?php $i = 0; ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if ($i > 4 && $i < 25) : ?>
                            <div class="col-md-4 mb-2">
                                <div class="image-thumnail-3"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a></div>
                            </div>
                            <div class="col-md-8 mb-2">
                                <h6><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                                <div class="content"><?php the_excerpt(); ?></div>
                            </div>
                        <?php endif ?>
                        <?php $i++ ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- Get post mặt định -->
            </div>
            <!-- End Section 3 -->
            <!-- Pagination -->
            <?php if (paginate_links() != '') { ?>
                <div class="quatrang">
                    <?php
                    global $wp_query;
                    $big = 999999999;
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'prev_text'    => __('«'),
                        'next_text'    => __('»'),
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages
                    ));
                    ?>
                </div>
            <?php } ?>
            <!-- End Pagination -->
        </div>
        <div class="col-md-2">
            <h2>Tin Mới</h2>
        </div>
    </div>
</div>
<?php get_footer(); ?>