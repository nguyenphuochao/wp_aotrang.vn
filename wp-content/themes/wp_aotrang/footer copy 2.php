<div class="container">
    <footer class="text-dark p-2 mt-2 bg-orange">
        <div class="pt-1">
            <div class="row">
                <div class="col-md-8 pt-2 pl-lg-5">
                    <h5 style="color: #212020;"><strong><?php echo get_field('footer_left_title','option') ?></strong></h5>
                    <?php echo get_field('footer_left_content','option') ?>
                </div>
                <div class="col-md-4 pt-2 pl-lg-5">
                    <h5 style="color: #212020;"><strong><?php echo get_field('footer_right_title','option') ?></strong></h5>
                    <?php echo get_field('footer_right_content','option') ?>
                </div>
            </div>
        </div>
        <hr class="footer">
        <div class="bottom-footer">
            <?php echo get_field('footer_bottom','option') ?>
        </div>
    </footer>
</div>
<!-- End Footer -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Owl caurosel -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/owlcarousel/owl.carousel.min.js"></script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        },

    })
</script>
<script src="<?php bloginfo('template_directory') ?>/js/script.js"></script>
<?php wp_footer(); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="OvXcLpQ4"></script>
</body>

</html>