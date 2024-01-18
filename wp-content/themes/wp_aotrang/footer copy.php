<div class="container">
    <footer class="text-dark p-2 mt-2 bg-orange">
        <div class="pt-1">
            <div class="row">
                <div class="col-md-8 pt-2 pl-lg-5">
                    <h5 class="d-none d-md-block" style="color: #212020;"><strong>CÔNG TY CP ĐẦU TƯ BRIGHT STAR</strong></h5>
                    <div>Địa chỉ: 4/6B Văn Chung, Phường 13, Quận Tân Bình, Thành phố Hồ Chí Minh</div>
                    <div>Điện thoại/Fax: 028.62966189</div>
                    <div>Chịu trách nhiệm nội dung: Ông Đoàn Lê Khang</div>
                </div>
                <div class="col-md-4 pt-2 pl-lg-5">
                    <h5 style="color: #212020;"><strong>LIÊN HỆ HỢP TÁC</strong></h5>
                    <div>Hotline: 0908 942 789</div>
                    <div>Email: brightstar24h@gmail.com</div>
                </div>
            </div>
        </div>
        <hr class="footer">
        <div class="bottom-footer">
            <div>Giấy phép số 18/GP-STTTT do Sở Thông Tin và Truyền Thông TP.HCM cấp ngày 08/03/2021</div>
            <div><a href="https://aotrang.vn/dieu-khoan-va-chinh-sach.html">Điều khoản và chính sách</a></div>
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