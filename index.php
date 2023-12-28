<?php get_header() ?>
<div class="container">
    <!-- News Hot -->
    <section class="news-hot mt-3">
        <div class="row">
            <!-- Get post News Query -->
            <?php $getposts = new WP_query();
            $getposts->query('post_status=publish&showposts=1&post_type=post&category_name=tin-hot'); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <div class="col-image col-md-7">
                    <a href="<?php the_permalink(); ?>"><img width="100%" style="background: linear-gradient(to top, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
                        -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
                        mask-image: linear-gradient(to bottom, black 50%, transparent 100%);" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                    <div class="content-hot">
                        <h3 class="mt-2 font-weight-bold"><a class="text-brown" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
            <!-- Get post News Query -->
            <div class="col-md-5 news-hot-sub">
                <div class="row">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=4&post_type=post&category_name=tin-hot&offset=1'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                        <div class="col-image col-md-6 mb-1 pr-1">
                            <a href="<?php the_permalink(); ?>"><img width="100%" height="189" src="<?php echo $featured_img_url; ?>" alt="<?php the_title() ?>"></a>
                            <div class="content-hot-sub text-light">
                                <h6><strong><a class="text-light" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                                <div><small><?php echo  get_the_time('d/m/Y') ?> <i class="fa-solid fa-eye"></i> 999</small></div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
            </div>
        </div>
    </section>
    <!-- End News Hot -->
    <hr class="line">
    <!-- Đời sống gen z-->
    <div class="row mt-2">
        <div class="col-md-9">
            <section class="list-news doi-song-gen-z">
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                    $parent_category_slug  = 'doi-song-gen-z';
                    $parent_category = get_term_by('slug', $parent_category_slug, 'category');
                    $child_categories = get_categories(array('parent' => $parent_category->term_id));
                    ?>
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo get_category_link($parent_category->term_id); ?>"><?php echo chuyenChuHoaThanhThuong($parent_category->name) ?></a></strong></h3>
                    </div>
                    <div>
                        <h6><strong>
                                <?php foreach ($child_categories as $child_category) {
                                    echo '<a class="text-dark" href="' . get_category_link($child_category->term_id) . '">' . mb_convert_case($child_category->name, MB_CASE_TITLE, "UTF-8") . ' | ' . '</a>';
                                }
                                // Trường tôi | Nhỏ to tâm sự | Cảnh giác 247 | Sách hay
                                ?>
                            </strong></h6>
                    </div>
                </div>
                <hr>
                <!-- Owl Caurosel -->
                <div class="owl-carousel owl-theme">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=9&post_type=post&category_name=doi-song-gen-z'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                        <div class="item"><a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>"></a>
                            <a href="<?php the_permalink(); ?>" class="text-dark">
                                <h6 class="mt-1"><?php the_title(); ?></h6>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
                <!-- End Owl Caurosel -->
                <div class="row">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=4&post_type=post&category_name=doi-song-gen-z&offset=9'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $post_time = get_post_time('U', false, $post);
                        $time_diff = human_time_diff($post_time, current_time('U')) . ' trước';
                        ?>
                        <div class="col-5 col-sm-4 col-md-4 mb-2">
                            <a href="<?php the_permalink(); ?>"><img width="100%" class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                        </div>
                        <div class="col-7 col-sm-8 col-md-8 mb-2">
                            <h5><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                            <div>
                                <span class="bg-primary text-light pl-3 pr-3 font-weight-bold" style="border-radius: 10px;"><?php echo mb_convert_case(get_the_category()[0]->name, MB_CASE_TITLE, "UTF-8"); ?></span>
                                <small class="ml-xl-5 ml-0"><i class="fa-solid fa-clock"></i> <?php echo $time_diff; ?></small>
                                <div class="content d-none d-md-block"><small><?php the_excerpt(); ?></small></div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
            </section>
        </div>
        <div class="col-md-3 sidebar mt-2">
            <div class="bg-orange text-center text-light font-weight-bold rounded text-uppercase">Xem nhiều</div>
            <div class="view-list mt-3">
                <h6>Dư luận lạnh lùng trước giải thích về quản lí yếu kém</h6>
                <small class="font-italic">07/12/2023</small>
            </div>
            <div class="view-list mt-3">
                <h6>Dư luận lạnh lùng trước giải thích về quản lí yếu kém</h6>
                <small class="font-italic">07/12/2023</small>
            </div>
            <div class="view-list mt-3">
                <h6>Dư luận lạnh lùng trước giải thích về quản lí yếu kém</h6>
                <small class="font-italic">07/12/2023</small>
            </div>
            <div class="view-list mt-3">
                <h6>Dư luận lạnh lùng trước giải thích về quản lí yếu kém</h6>
                <small class="font-italic">07/12/2023</small>
            </div>
        </div>
    </div>
    <!-- Luyện thi -->
    <hr class="line">
    <div class="row mt-2">
        <div class="col-md-9">
            <section class="list-news luyen-thi">
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                    $parent_category_slug  = 'luyen-thi';
                    $parent_category = get_term_by('slug', $parent_category_slug, 'category');
                    $child_categories = get_categories(array('parent' => $parent_category->term_id));
                    ?>
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo get_category_link($parent_category->term_id); ?>"><?php echo chuyenChuHoaThanhThuong($parent_category->name); ?></a></strong></h3>
                    </div>
                    <div>
                        <h6 class="text-right"><strong>
                                <?php foreach ($child_categories as $key => $child_category) {
                                    echo '<a class="text-dark" href="' . get_category_link($child_category->term_id) . '">' . mb_convert_case($child_category->name, MB_CASE_TITLE, "UTF-8") . ' | ' . ($key == 5 ? '<br>' : '') . '</a>';
                                }
                                ?>
                                <!-- Lớp 1 | Lớp 2 | Lớp 3 | Lớp 4 | Lớp 5 | Lớp 6 
                             Lớp 7 | Lớp 8 | Lớp 9 | Lớp 10 | Lớp 11 | Lớp 12  -->
                            </strong></h6>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=1&post_type=post&category_name=luyen-thi'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $post_time = get_post_time('U', false, $post);
                        $time_diff = human_time_diff($post_time, current_time('U')) . ' trước';
                        ?>
                        <div class="col-md-6">
                            <a href="<?php the_permalink(); ?>"><img width="100%" src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>"></a>
                            <h4 class="mt-2 mb-3"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h4>
                            <div>
                                <span class="bg-primary text-light pl-3 pr-3 font-weight-bold" style="border-radius: 10px;"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span>
                                <small class="ml-5"><i class="fa-solid fa-clock"></i> <?php echo $time_diff; ?></small>
                                <div class="mt-4 mb-4 content"><strong><?php the_excerpt(); ?></strong>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                    <div class="col-md-6">
                        <div class="row">
                            <!-- Get post News Query -->
                            <?php $getposts = new WP_query();
                            $getposts->query('post_status=publish&showposts=4&post_type=post&category_name=luyen-thi&offset=1'); ?>
                            <?php global $wp_query;
                            $wp_query->in_the_loop = true; ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                                <div class="col-5 col-sm-4 col-md-6 mb-2">
                                    <a href="<?php the_permalink(); ?>"><img width="100%" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                                </div>
                                <div class="col-7 col-sm-8 col-md-6 mb-2">
                                    <h6><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                            <!-- Get post News Query -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3 sidebar mt-2">
            <img width="100%" src="<?php bloginfo('template_directory') ?>/image/cococ.jpg" alt="">
        </div>
    </div>
    <!-- Tuyển sinh -->
    <hr class="line">
    <div class="row mt-2">
        <div class="col-md-12">
            <section class="list-news tuyen-sinh">
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                    $parent_category_slug  = 'tuyen-sinh-du-hoc-hoc-bong';
                    $parent_category = get_term_by('slug', $parent_category_slug, 'category');
                    $child_categories = get_categories(array('parent' => $parent_category->term_id));
                    ?>
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo get_category_link($parent_category->term_id); ?>"><?php echo chuyenChuHoaThanhThuong($parent_category->name); ?></a></strong></h3>
                    </div>
                    <div>
                        <h6><strong>
                                <?php foreach ($child_categories as $child_category) {
                                    echo '<a class="text-dark" href="' . get_category_link($child_category->term_id) . '">' . mb_convert_case($child_category->name, MB_CASE_TITLE, "UTF-8") . ' | ' . '</a>';
                                }
                                ?>
                            </strong></h6>
                    </div>
                </div>
                <hr>
                <div class="bg-primary p-5">
                    <div class="row">
                        <!-- Get post News Query -->
                        <?php $getposts = new WP_query();
                        $getposts->query('post_status=publish&showposts=1&post_type=post&category_name=tuyen-sinh'); ?>
                        <?php global $wp_query;
                        $wp_query->in_the_loop = true; ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                            <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                            <div class="col-md-7">
                                <div class="col-image">
                                    <a href="<?php the_permalink(); ?>"><img width="100%" height="382" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                                    <h4><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h4>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                        <!-- Get post News Query -->
                        <div class="col-md-5">
                            <?php $getposts = new WP_query();
                            $getposts->query('post_status=publish&showposts=2&post_type=post&category_name=tuyen-sinh&offset=1'); ?>
                            <?php global $wp_query;
                            $wp_query->in_the_loop = true; ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                                <div class="mt-1 mb-1 col-image">
                                    <a href="<?php the_permalink(); ?>"><img width="100%" height="190" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                                    <h5><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                            <!-- Get post News Query -->

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Ăn và chơi -->
    <hr class="line">
    <div class="row mt-2">
        <div class="col-md-9">
            <section class="list-news doi-song-gen-z">
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                    $parent_category_slug  = 'an-choi';
                    $parent_category = get_term_by('slug', $parent_category_slug, 'category');
                    $child_categories = get_categories(array('parent' => $parent_category->term_id));
                    ?>
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo get_category_link($parent_category->term_id); ?>"><?php echo chuyenChuHoaThanhThuong($parent_category->name); ?></a></strong></h3>
                    </div>
                    <div>
                        <h6><strong>
                                <?php foreach ($child_categories as $child_category) {
                                    echo '<a class="text-dark" href="' . get_category_link($child_category->term_id) . '">' . mb_convert_case($child_category->name, MB_CASE_TITLE, "UTF-8") . ' | ' . '</a>';
                                }
                                ?>
                            </strong></h6>
                    </div>
                </div>
                <hr>
                <div class="owl-carousel owl-theme">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=9&post_type=post&category_name=an-choi'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                        <div class="item"><a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                            <h6 class="mt-1"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
                <div class="row">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=4&post_type=post&category_name=an-choi&offset=9'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php 
                        $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
                        $post_time = get_post_time('U', false, $post);
                        $time_diff = human_time_diff($post_time, current_time('U')) . ' trước';
                        ?>
                        <div class="col-5 col-sm-4 col-md-4 mb-2">
                            <a href="<?php the_permalink(); ?>"><img width="100%" class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                        </div>
                        <div class="col-7 col-sm-8 col-md-8 mb-2">
                            <h5><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                            <div>
                                <span class="bg-primary text-light pl-3 pr-3 font-weight-bold" style="border-radius: 10px;"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span>
                                <small class="ml-5"><i class="fa-solid fa-clock"></i> <?php echo $time_diff ?></small>
                                <div class="content d-none d-md-block"><small><?php the_excerpt(); ?></small></div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
            </section>
        </div>
        <div class="col-md-3 sidebar mt-2">
            <div>
                <img width="100%" height="460" src="<?php bloginfo('template_directory') ?>/image/sach_moi.webp" alt="">
            </div>
            <div class="mt-3">
                <img width="100%" height="460" src="<?php bloginfo('template_directory') ?>/image/thanh_xuan.webp" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php get_footer(); ?>