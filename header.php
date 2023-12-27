<!doctype html>
<html lang="en">

<head>
    <title>Áo Trắng</title>
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
    <?php wp_head(); ?>
</head>

<body>
    <!-- Logo -->
    <div class="logo-image pl-0 pt-3 pb-3 container">
        <a href="<?php echo home_url() ?>"><img src="<?php bloginfo('template_directory') ?>/image/logoao-trang.png" alt=""></a>
    </div>
    <!-- End Logo -->
    <!-- Navigation -->
    <div class="bg-orange" style="position: sticky;top: 0;z-index: 999;">
        <nav class="navbar navbar-expand-lg navbar-light nav-desktop container">
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
                    ?>
                            <li class="nav-item <?php if ($submenu_items) echo 'dropdown';
                                                echo $key == 0 ? 'active' : '' ?>">
                                <a class="nav-link" href="<?php echo $menu_item->url  ?>">
                                    <?php echo $menu_item->title; ?> <?php echo $submenu_items ? '<i class="fa-solid fa-chevron-down"></i>' : '' ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($submenu_items as $submenu_item) { ?>
                                        <a class="dropdown-item" href="<?php echo $submenu_item->url  ?>"><?php echo $submenu_item->title ?></a>
                                    <?php } ?>
                                </div>
                            </li>
                    <?php
                        }
                    }
                    ?>
                    <!-- Form -->
                    <li class="nav-item-form position-relative">
                        <form class="form-inline">
                            <input class="form-control search w-100" type="text" placeholder="Search" aria-label="Search">
                            <i class="fa-solid fa-magnifying-glass position-absolute" style="top: 12px;right: 10px"></i>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Navigation -->