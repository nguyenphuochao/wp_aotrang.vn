<!-- Get post News Query -->
<?php $getposts = new WP_query();
$getposts->query('post_status=publish&showposts=8&post_type=post'); ?>
<?php global $wp_query;
$wp_query->in_the_loop = true; ?>
<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
    <div class="title text-justify"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <hr class="line-title">
<?php endwhile;
wp_reset_postdata(); ?>
<!-- Get post News Query -->
<!-- Quảng cáo -->
<div class="coccoc">
    <a target="_blank" href="https://coccoc.com/download/thanks?utm_source=internal&utm_campaign=40823_1703043906&utm_medium=referral"><img width="100%" src="<?php echo get_field('logo_coccoc', 'option') ?>" alt="Cốc Cốc"></a>
</div>
<div class="phatnguoi24h mt-2">
    <a target="_blank" href="https://phatnguoi24h.com/"><img width="100%" src="<?php echo get_field('logo_phatnguoi', 'option') ?>" alt="Phạt Nguội 24h"></a>
</div>
<div class="xuphat mt-2">
    <a target="_blank" href="https://xuphat.com/"><img width="100%" src="<?php echo get_field('logo_xuphat', 'option') ?>" alt="Xử Phạt"></a>
</div>
<div class="tieuthuyet mt-2">
    <a target="_blank" href="https://tieuthuyet.vn/"><img width="100%" src="<?php echo get_field('logo_tieuthuyet', 'option') ?>" alt="Tiểu thuyết"></a>
</div>