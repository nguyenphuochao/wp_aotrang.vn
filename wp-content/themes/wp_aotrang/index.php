<?php
/* Template Name: HomePage */
?>
<?php get_header() ?>
<div class="container">
    <?php
    $menu_locations = get_nav_menu_locations();
    $primary_menu_id = $menu_locations['main_nav'];
    $menu_items = wp_get_nav_menu_items($primary_menu_id);
    $parent = [];
    foreach ($menu_items as $key => $menu_item) {
        if ($menu_item->menu_item_parent == 0) {
            $parent[] = [$menu_item->ID, $menu_item->title, $menu_item->url];
        }
    }
    // var_dump($parent);
    ?>
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
                <div class="col-md-7 news-hot-main">
                    <div class="col-image">
                        <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" height="418px" style="background: linear-gradient(to top, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 1));
                        -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
                        mask-image: linear-gradient(to bottom, black 30%, transparent 100%);" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                        <div class="content-hot">
                            <h1 class="mt-2 font-weight-bold"><a class="text-brown" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php $content = get_the_content(); ?>
                            <p class="font-weight-normal"><?php echo wp_trim_words($content, 25); ?></p>
                        </div>
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
                    <?php $index = 0; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                        <div class="col-image col-md-6 mb-1 <?php echo $index % 2 == 0 ? 'pr-1' : 'pl-0'; ?>">
                            <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" height="205" src="<?php echo $featured_img_url; ?>" alt="<?php the_title() ?>"></a>
                            <div class="content-hot-sub text-light pl-3">
                                <?php $title = get_the_title(); ?>
                                <h6 style="font-size: 14px;"><strong><a class="text-light" href="<?php the_permalink(); ?>"><?php echo wp_trim_words($title, 11); ?></a></strong></h6>
                                <div style="font-size: 13px;margin-top:-8px"><small><?php echo  get_the_time('d/m/Y') ?></small></div>
                            </div>
                        </div>
                        <?php $index++; ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
            </div>
            <!-- Owl Caurosel News Hot -->
            <div class="col-md-12 owl-caurosel-news-hot">
                <div class="owl-carousel owl-theme">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=9&post_type=post&category_name=tin-hot&offset=1'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                        <div class="item"><a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" height="180" src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>"></a>
                            <a href="<?php the_permalink(); ?>" class="text-dark">
                                <h6 class="mt-1"><strong><?php the_title(); ?></strong></h6>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
            </div>
            <!-- Owl Caurosel News Hot -->
        </div>
    </section>
    <!-- End News Hot -->
    <hr class="line">
    <!-- Đời sống gen z-->
    <div class="row mt-2">
        <div class="col-md-9">
            <section class="list-news doi-song-gen-z">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo $parent[1][2]; ?>"><?php echo chuyenChuHoaThanhThuong($parent[1][1]); ?></a></strong></h3>
                    </div>
                    <div class="d-none d-md-block mt-lg-3">
                        <h6>
                            <?php foreach (get_submenu_items($parent[1][0], $menu_items) as $child) {
                                echo '<a class="text-dark" href="' . $child->url . '">' . chuyenChuHoaThanhThuong($child->title) . ' | ' . '</a>';
                            }
                            // Trường tôi | Nhỏ to tâm sự | Cảnh giác 247 | Sách hay
                            ?>
                        </h6>
                    </div>
                    <div class="d-block d-md-none mb-2">
                        <a style="background: #F48E4F;padding: 1px 3px 1px 3px;border-radius: 30px;color: black;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Xem thêm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php foreach (get_submenu_items($parent[1][0], $menu_items) as $child) { ?>
                                <a class="dropdown-item" href="<?php echo $child->url ?>"><?php echo $child->title ?></a>
                            <?php } ?>
                        </div>
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
                        <div class="item"><a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" height="160" src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>"></a>
                            <a href="<?php the_permalink(); ?>" class="text-dark">
                                <h6 class="mt-1"><strong><?php the_title(); ?></strong></h6>
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
                            <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                        </div>
                        <div class="col-7 col-sm-8 col-md-8 mb-2">
                            <h5><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                            <div>
                                <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><span class="category_name_button text-dark"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span></a>
                                <small class="ml-xl-5 ml-0"><i class="fa-solid fa-clock"></i> <?php echo $time_diff; ?></small>
                                <div class="content d-none d-md-block mt-3 text-justify"><small><?php the_excerpt(); ?></small></div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                </div>
            </section>
        </div>
        <div class="col-md-3 sidebar mt-2">
            <div class="bg-orange text-center text-dark font-weight-bold rounded text-uppercase">Xem nhiều</div>
            <!-- Query post -->
            <?php
            $args = array(
                'post_type'      => 'post', // Thay 'post' bằng kiểu bài viết của bạn nếu cần
                'posts_per_page' => -1, // -1 để lấy tất cả bài viết
                'showposts' => 11, // hiển thị 12 dòng post
                'meta_key'       => 'post_views_count',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC',
            );
            $query = new WP_Query($args);
            // Duyệt qua kết quả query
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
            ?>
                    <div class="view-list mt-3">
                        <h6 class="text-justify mb-0"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                        <small class="font-italic"><?php echo get_the_date('d/m/Y'); ?></small>
                    </div>
            <?php
                }
            }
            wp_reset_postdata();
            ?>
            <!-- Query post -->
        </div>
    </div>
    <!-- Luyện thi -->
    <hr class="line">
    <div class="row mt-2">
        <div class="col-md-9">
            <section class="list-news luyen-thi">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo $parent[2][2]; ?>"><?php echo chuyenChuHoaThanhThuong($parent[2][1]); ?></a></strong></h3>
                    </div>
                    <div class="d-none d-md-block mt-lg-3">
                        <h6 class="text-right">
                            <?php foreach (get_submenu_items($parent[2][0], $menu_items) as $key => $child) {
                                echo '<a class="text-dark" href="' . $child->url . '">' . chuyenChuHoaThanhThuong($child->title) . ' | '  . '</a>';
                            }
                            ?>
                        </h6>

                    </div>
                    <div class="d-block d-md-none mb-2">
                        <a style="background: #F48E4F;padding: 1px 3px 1px 3px;border-radius: 30px ;color: black;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Xem thêm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php foreach (get_submenu_items($parent[2][0], $menu_items) as $child) { ?>
                                <a class="dropdown-item" href="<?php echo $child->url ?>"><?php echo $child->title ?></a>
                            <?php } ?>
                        </div>
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
                            <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>"></a>
                            <h4 class="mt-2 mb-3"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h4>
                            <div>
                                <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><span class="category_name_button text-dark"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span></a>
                                <small class="ml-5"><i class="fa-solid fa-clock"></i> <?php echo $time_diff; ?></small>
                                <div class="mt-4 mb-4 content text-justify"><?php the_excerpt(); ?></div>
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
                                <?php
                                $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
                                $post_time = get_post_time('U', false, $post);
                                $time_diff = human_time_diff($post_time, current_time('U')) . ' trước';
                                ?>
                                <div class="col-5 col-sm-4 col-md-6 mb-2">
                                    <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                                </div>
                                <div class="col-7 col-sm-8 col-md-6 mb-2">
                                    <h6 class="text-justify"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                                    <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><span class="category_name_button text-dark"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span></a>
                                    <small class="ml-lg-2"><i class="fa-solid fa-clock"></i> <?php echo $time_diff; ?></small>
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
            <a target="_blank" href="https://coccoc.com/download/thanks?utm_source=internal&utm_campaign=40823_1703043814&utm_medium=referral"><img width="100%" src="<?php the_field('image_cococ') ?>" alt="coccoc.com"></a>
        </div>
    </div>
    <!-- Tuyển sinh -->
    <hr class="line">
    <div class="row mt-2">
        <div class="col-md-12">
            <section class="list-news tuyen-sinh">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo $parent[3][2]; ?>"><?php echo chuyenChuHoaThanhThuong($parent[3][1]); ?></a></strong></h3>
                    </div>
                    <div class="d-none d-md-block mt-lg-3">
                        <h6>
                            <?php foreach (get_submenu_items($parent[3][0], $menu_items) as $child) {
                                echo '<a class="text-dark" href="' . $child->url . '">' . chuyenChuHoaThanhThuong($child->title) . ' | ' . '</a>';
                            }
                            ?>
                        </h6>
                    </div>
                    <div class="d-block d-md-none mb-2">
                        <a style="background: #F48E4F;padding: 1px 3px 1px 3px;border-radius: 30px;color: black;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Xem thêm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php foreach (get_submenu_items($parent[3][0], $menu_items) as $child) { ?>
                                <a class="dropdown-item" href="<?php echo $child->url ?>"><?php echo $child->title ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="bg-orange p-md-5 p-3">
                    <div class="row">
                        <!-- Get post News Query -->
                        <?php $getposts = new WP_query();
                        $getposts->query('post_status=publish&showposts=1&post_type=post&category_name=tuyen-sinh'); ?>
                        <?php global $wp_query;
                        $wp_query->in_the_loop = true; ?>
                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                            <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                            <div class="col-md-8 mb-2">
                                <div class="col-image">
                                    <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" height="400" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                                    <h4><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h4>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                        <!-- Get post News Query -->
                        <div class="col-md-4">
                            <?php $getposts = new WP_query();
                            $getposts->query('post_status=publish&showposts=2&post_type=post&category_name=tuyen-sinh&offset=1'); ?>
                            <?php global $wp_query;
                            $wp_query->in_the_loop = true; ?>
                            <?php $key = 0; ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                                <div class="<?php echo $key == 1 ? 'mt-2' : ''; ?> col-image">
                                    <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" height="195" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                                    <h5><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                                </div>
                                <?php $key++; ?>
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
                        <h3><strong><a class="text-dark" href="<?php echo $parent[4][2]; ?>"><?php echo chuyenChuHoaThanhThuong($parent[4][1]); ?></a></strong></h3>
                    </div>
                    <div class="d-none d-md-block mt-lg-3">
                        <h6>
                            <?php foreach (get_submenu_items($parent[4][0], $menu_items) as $child) {
                                echo '<a class="text-dark" href="' . $child->url . '">' . chuyenChuHoaThanhThuong($child->title) . ' | ' . '</a>';
                            }
                            ?>
                        </h6>
                    </div>
                    <div class="d-block d-md-none mb-2">
                        <a style="background: #F48E4F;padding: 1px 3px 1px 3px;border-radius: 30px;color:black;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Xem thêm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php foreach (get_submenu_items($parent[4][0], $menu_items) as $child) { ?>
                                <a class="dropdown-item" href="<?php echo $child->url ?>"><?php echo $child->title ?></a>
                            <?php } ?>
                        </div>
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
                        <div class="item"><a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" height="160" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
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
                            <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" class="img-fluid" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                        </div>
                        <div class="col-7 col-sm-8 col-md-8 mb-2">
                            <h5><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                            <div>
                                <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><span class="category_name_button text-dark"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span></a>
                                <small class="ml-0 ml-lg-5"><i class="fa-solid fa-clock"></i> <?php echo $time_diff ?></small>
                                <div class="content d-none d-md-block mt-3 text-justify"><small><?php the_excerpt(); ?></small></div>
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
                <a target="_blank" href="http://chibooks.vn/"><img width="100%" height="460" src="<?php the_field('image_book') ?>" alt="http://chibooks.vn/"></a>
            </div>
            <div class="mt-3">
                <a target="_blank" href="https://vansinhchau.vn/collagen-nuoc-water-collagen-lolita-white"><img width="100%" height="460" src="<?php the_field('image_collagen') ?>" alt="collagen-nuoc-water-collagen-lolita-white"></a>
            </div>
        </div>
    </div>
    <!-- Việc làm -->
    <hr class="line">
    <div class="row mt-2">
        <div class="col-md-9">
            <section class="list-news viec-lam">
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                    $parent_category_slug  = 'viec-lam';
                    $parent_category = get_term_by('slug', $parent_category_slug, 'category');
                    $child_categories = get_categories(array('parent' => $parent_category->term_id));
                    ?>
                    <div>
                        <h3><strong><a class="text-dark" href="<?php echo $parent[5][2] ?>"><?php echo chuyenChuHoaThanhThuong($parent[5][1]); ?></a></strong></h3>
                    </div>
                    <div class="d-none d-md-block mt-lg-3">
                        <h6 class="text-right">
                            <?php foreach (get_submenu_items($parent[5][0], $menu_items) as $child) {
                                echo '<a class="text-dark" href="' . $child->url . '">' . chuyenChuHoaThanhThuong($child->title) . ' | '  . '</a>';
                            }
                            ?>
                        </h6>
                    </div>

                    <?php if (count(get_submenu_items($parent[5][0], $menu_items)) > 0) : ?>
                        <div class="d-block d-md-none mb-2">
                            <a style="background: #F48E4F;padding: 1px 3px 1px 3px;border-radius: 30px;color:black;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Xem thêm
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php foreach (get_submenu_items($parent[5][0], $menu_items) as $child) { ?>
                                    <a class="dropdown-item" href="<?php echo $child->url ?>"><?php echo $child->title ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <hr>
                <div class="row">
                    <!-- Get post News Query -->
                    <?php $getposts = new WP_query();
                    $getposts->query('post_status=publish&showposts=1&post_type=post&category_name=viec-lam'); ?>
                    <?php global $wp_query;
                    $wp_query->in_the_loop = true; ?>
                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $post_time = get_post_time('U', false, $post);
                        $time_diff = human_time_diff($post_time, current_time('U')) . ' trước';
                        ?>
                        <div class="col-md-6">
                            <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>"></a>
                            <h4 class="mt-2 mb-3"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h4>
                            <div>
                                <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><span class="category_name_button text-dark"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span></a>
                                <small class="ml-5"><i class="fa-solid fa-clock"></i> <?php echo $time_diff; ?></small>
                                <div class="mt-4 mb-4 content text-justify"><?php the_excerpt(); ?></div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <!-- Get post News Query -->
                    <div class="col-md-6">
                        <div class="row">
                            <!-- Get post News Query -->
                            <?php $getposts = new WP_query();
                            $getposts->query('post_status=publish&showposts=4&post_type=post&category_name=viec-lam&offset=1'); ?>
                            <?php global $wp_query;
                            $wp_query->in_the_loop = true; ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <?php
                                $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
                                $post_time = get_post_time('U', false, $post);
                                $time_diff = human_time_diff($post_time, current_time('U')) . ' trước';
                                ?>
                                <div class="col-5 col-sm-4 col-md-6 mb-2">
                                    <a href="<?php the_permalink(); ?>"><img loading="lazy" width="100%" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>"></a>
                                </div>
                                <div class="col-7 col-sm-8 col-md-6 mb-2">
                                    <h6 class="text-justify"><strong><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h6>
                                    <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><span class="category_name_button text-dark"><?php echo chuyenChuHoaThanhThuong(get_the_category()[0]->name); ?></span></a>
                                    <small class="ml-lg-2"><i class="fa-solid fa-clock"></i> <?php echo $time_diff; ?></small>
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
            <a target="_blank" href="https://coccoc.com/download/thanks?utm_source=internal&utm_campaign=40823_1703043814&utm_medium=referral"><img width="100%" src="<?php the_field('image_cococ') ?>" alt="coccoc.com"></a>
        </div>
    </div>
</div>
<!-- Footer -->
<?php get_footer(); ?>