$(document).ready(function () {
    // Search form
    $("nav i.fa-magnifying-glass").click(function () {
        $("nav form").submit();
    });
    $(".detail .content .wp-caption").css('width', '100%');
    // nav mobile
    $(".fa-angle-down").click(function(){
        $(this).closest('span').next('.submenu-content').slideToggle();
        $(this).closest('i').toggleClass("fa-angle-down fa-angle-up");
    })
});
 // Nav mobile
 function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

