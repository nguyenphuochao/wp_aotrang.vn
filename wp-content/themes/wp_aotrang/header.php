<!doctype html>
<html lang="en">

<head>
    <title>
        <?php
        if (is_single()) {
            single_post_title();
        } else {
            bloginfo('name');
        }
        ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/image/favicon.png" type="image/x-icon">
    <!-- Owl caurosel -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/owlcarousel/owl.theme.default.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/detail.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/category.css">
    <?php wp_head(); ?>
    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2769146024033953" crossorigin="anonymous"></script>
    <ins class="adsbygoogle testad" style="display:block" data-ad-client="ca-pub-2769146024033953" data-ad-slot="4681131052" data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script> -->
</head>

<body>
    <!-- Lấy giá trị của url cuối để check dữ liệu -->
    <?php
    $last_segment = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    //echo $last_segment;
    // Xử lí trang chủ active cồng kềnh nhất
    $home = explode(".", $last_segment);
    ?>
    <!-- Logo -->
    <div class="logo-image pl-0 pt-3 pb-3 container">
        <a href="<?php echo home_url() ?>"><img src="<?php bloginfo('template_directory') ?>/image/logoao-trang.png" alt="áo trắng"></a>
    </div>
    <!-- End Logo -->
    <!-- Navigation -->
    <div class="container" style="position: sticky;top: 0;z-index: 100000;">
        <nav class="navbar navbar-expand-lg navbar-light nav-desktop">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-2" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 pl-lg-0 pl-3 w-100 justify-content-between">
                    <?php
                    $menu_locations = get_nav_menu_locations();
                    $primary_menu_id = $menu_locations['main_nav'];
                    $menu_items = wp_get_nav_menu_items($primary_menu_id);
                    function get_submenu_items($parent_id, $menu_items)
                    {
                        $submenu_items = array();
                        foreach ($menu_items as $menu_item) {
                            if ($menu_item->menu_item_parent == $parent_id) {
                                $submenu_items[] = $menu_item;
                            }
                        }
                        return $submenu_items;
                    }
                    ?>
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa-solid fa-house bg-primary-light pl-2 pr-2 pt-1 pb-1 rounded"></i><span class="sr-only">(current)</span></a>
                    </li> -->
                    <?php
                    foreach ($menu_items as $key => $menu_item) {
                        if ($menu_item->menu_item_parent == 0) {
                            $submenu_items = get_submenu_items($menu_item->ID, $menu_items);
                            // Lấy tên slug
                            $url_parts = parse_url($menu_item->url);
                            $slug = pathinfo($url_parts['path'], PATHINFO_FILENAME);
                            // echo $slug;
                    ?>
                            <li class="nav-item <?php if ($submenu_items) echo 'dropdown ';
                                                echo ($slug == $last_segment) ? 'active' : '';
                                                ?>">
                                <a class="nav-link" href="<?php echo $menu_item->url  ?>">
                                    <?php echo $menu_item->title; ?> <?php echo $submenu_items ? '<i class="fa-solid fa-chevron-down"></i>' : '' ?>
                                </a>
                                <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div style="display: flex;">
                                        <div class="w-100">
                                            <?php foreach ($submenu_items as $key1 => $submenu_item) {
                                                if ($key1 < 6) {
                                            ?>
                                                    <a style="border-bottom: <?php echo count($submenu_items) - 1 != $key1 && $key1 != 5 ? '1px' : '0px' ?> solid #c2bbbb;" class="dropdown-item" href="<?php echo $submenu_item->url  ?>"><?php echo $submenu_item->title ?></a>
                                            <?php }
                                            } ?>
                                        </div>
                                        <div>
                                            <?php foreach ($submenu_items as $key1 => $submenu_item) {
                                                if ($key1 > 5 && $key1 < 12) {
                                            ?>
                                                    <a style="border-bottom: <?php echo count($submenu_items) - 1 != $key1 ? '1px' : '0px' ?> solid #c2bbbb;" class="dropdown-item" href="<?php echo $submenu_item->url  ?>"><?php echo $submenu_item->title ?></a>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <!-- Form -->
                    <li class="nav-item-form position-relative">
                        <form id="form_search" class="form-inline" action="<?php echo home_url('/'); ?>" method="GET">
                            <input name="s" class="form-control search w-100" type="text" placeholder="Tìm kiếm" value="<?php echo $_GET['s'] ?? '' ?>" aria-label="Search">
                            <i class="fa-solid fa-magnifying-glass position-absolute" style="top: 12px;right: 10px"></i>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <!--  -->
        <nav class="nav-mobile bg-orange">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <?php foreach ($menu_items as $key => $menu_item) {
                    if ($menu_item->menu_item_parent == 0) {
                        $submenu_items = get_submenu_items($menu_item->ID, $menu_items);
                        $url_parts = parse_url($menu_item->url);
                        $slug = pathinfo($url_parts['path'], PATHINFO_FILENAME);
                ?>
                        <span style="display: flex;justify-content: space-between;border-bottom: 1px solid #c0b6c2;
                        <?php
                        echo ($slug == $last_segment ? 'background: #0186eb' : '');
                        echo ";";
                        echo ($home[0] == $slug ? 'background: #0186eb' : '');
                        ?>">
                            <a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a>
                            <a href="#">
                                <?php if ($submenu_items) { ?>
                                    <i id="dropdown-icon" class="fa-solid fa-angle-down"></i>
                                <?php } ?>
                            </a>
                        </span>
                        <div class="submenu-content pl-3" style="display: none;">
                            <?php foreach ($submenu_items as $submenu_item) { ?>
                                <a href="<?php echo $submenu_item->url ?>"><?php echo $submenu_item->title ?></a>
                            <?php } ?>
                        </div>

                <?php }
                } ?>
            </div>
            <span class="p-2" style="font-size:30px;cursor:pointer;color:#201e1e;position: absolute;top:8px" onclick="openNav()">&#9776;</span>
            <!-- Socical -->
            <ul class="social-media" style="text-align: center;display: flex;justify-content: center;">
                <li><a href="https://www.facebook.com/www.phimtruyen.vn"><i style="color: blue;" class="fa-brands fa-facebook"></i></a></li>
                <li><a href="mailto:sale@bsmi.vn" target="_blank"><i style="color: black;" class="fa-solid fa-square-envelope"></i></a></li>
                <li><a href="https://www.youtube.com/@phimtruyenofficial"><i style="color: red;" class="fa-brands fa-youtube"></i></a></li>
                <li><a href="https://www.tiktok.com/@phimtruyen.vn?_d=secCgYIASAHKAESPgo8wQ%2FPGa4DFb11bYa%2FqEdnNFTquKnIhvaJBO2cQeyZPYTlpEqa0ba1cju7bB%2F8AFZaz7%2F0NMr8iM01VoltGgA%3D&object_id=7108639433553331202&page_open_method=scan_code&schema_type=4&sec_uid=MS4wLjABAAAAUquFsxKv-JNpRTvKcsArLULpf4_9Rw_ZpIue-uKjC2IUrbKNRyqHAT7NErA0ch9L&share_app_id=1180&share_author_id=7108639433553331202&share_uid=7108639433553331202&tt_from=scan_code&utm_campaign=client_scan_code&utm_medium=1&utm_source=scan_code&_r=1"><i style="color: white" class="fa-brands fa-tiktok"></i></a></li>
            </ul>
            <form method="GET" action="<?php bloginfo('url'); ?>" id="form-search-mobile">
                <input type="text" name="s" placeholder="Tìm kiếm" value="<?php echo $_GET['s'] ?? ''; ?>">
            </form>
        </nav>
    </div>
    <!-- End Navigation -->