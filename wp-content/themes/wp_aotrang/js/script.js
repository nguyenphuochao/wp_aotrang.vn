$(document).ready(function () {
    // Search form
    $("nav .fa-magnifying-glass").click(function (e) {
        $("#form_search").submit();
    });
    $(".detail .content .wp-caption").css('width', '100%');
    // nav mobile
    $(".fa-angle-down").click(function(){
        $(this).closest('span').next('.submenu-content').slideToggle();
        $(this).closest('i').toggleClass("fa-angle-down fa-angle-up");
    })
    // Remove class active first
    $(".nav-desktop li:first-child").removeClass('active');
});
 // Nav mobile
 function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

