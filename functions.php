<?php
// Tạo menu
add_action('init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus(
        array(
            'main_nav' => 'Menu chính',
            'link_nav' => 'Liên kết',
            'info_nav' => 'Thông tin',
        )
    );
}
// Trình soạn thảo cũ
add_filter('use_block_editor_for_post', '__return_false');
// Ảnh đại diện
add_theme_support('post-thumbnails');

// Hàm chuyển tất cả chữ hoa về chữ hoa đầu mỗi từ
function chuyenChuHoaThanhThuong($name)
{
    return mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
}
