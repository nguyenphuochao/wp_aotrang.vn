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
// Ảnh đại diện trong quản trị
add_theme_support('post-thumbnails');

// Hàm chuyển tất cả chữ hoa về chữ hoa đầu mỗi từ
function chuyenChuHoaThanhThuong($name)
{
    $text = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    $text_modified = str_replace("&Amp;", "&", $text);
    return $text_modified;
}

// Hàm tính views
function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    if ($count > 1000) {
        return round($count / 1000, 1) . 'K lượt xem';
    } else {
        return $count . ' lượt xem';
    }
}
// Hiển thị cột views trong trang quản trị
function add_post_views_column($defaults)
{
    $defaults['post_views'] = __('Lượt xem');
    return $defaults;
}
add_filter('manage_posts_columns', 'add_post_views_column');
function get_post_views($column_name, $id)
{
    if ($column_name === 'post_views') {
        echo getPostViews(get_the_ID());
    }
}
add_action('manage_posts_custom_column', 'get_post_views', 10, 2);

// Code đếm số dòng trong văn bản
function count_paragraph($insertion, $paragraph_id, $content)
{
    $closing_p = '</p>';
    $paragraphs = explode($closing_p, $content);
    foreach ($paragraphs as $index => $paragraph) {
        if (trim($paragraph)) {
            $paragraphs[$index] .= $closing_p;
        }
        if ($paragraph_id == $index + 1) {
            $paragraphs[$index] .= $insertion;
        }
    }

    return implode('', $paragraphs);
}
//Chèn bài liên quan vào giữa nội dung

add_filter('the_content', 'prefix_insert_post_ads');

function prefix_insert_post_ads($content)
{

    $related_posts = "<div class='meta-related'>" . do_shortcode('[related_posts_by_tax title=""]') . "</div>";

    if (is_single()) {
        return count_paragraph($related_posts, 1, $content);
    }

    return $content;
}
// Chèn quảng cáo google ads
function hook_javascript()
{
?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2769146024033953" crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1X1PJ5VQ0L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1X1PJ5VQ0L');
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11316483462"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-11316483462');
    </script>

<?php
}
add_action('wp_head', 'hook_javascript');

add_filter('the_content', 'ad_adsen');

function ad_adsen($content)
{

    $ad_code = '<div>
                            <ins class="adsbygoogle"
                           style="display:block"
                           data-ad-client="ca-pub-2769146024033953"
                           data-ad-slot="4681131052"
                           data-ad-format="auto"
                           data-full-width-responsive="true"></ins>
                      <script>  
                          (adsbygoogle = window.adsbygoogle || []).push({});
                      </script>
                    </div>';

    if (is_single() && !is_admin()) {
        return prefix_insert_after_paragraph($ad_code, 2, $content);
    }

    return $content;
}
// Parent Function that makes the magic happen

function prefix_insert_after_paragraph($insertion, $paragraph_id, $content)
{
    $closing_p = '</p>';
    $paragraphs = explode($closing_p, $content);
    foreach ($paragraphs as $index => $paragraph) {

        if (trim($paragraph)) {
            $paragraphs[$index] .= $closing_p;
        }

        if ($paragraph_id == $index + 1) {
            $paragraphs[$index] .= $insertion;
        }
    }

    return implode('', $paragraphs);
}
