// rwd 側拉nav
const navMenu = document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle')
    // navClose = document.getElementById('nav-close'),
    // hamburger = document.getElementsByClassName('hamburger_box')
    // hamburger.onclick = function() {
    //     hamburger.classList.toggle('active');
    // }
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.toggle('show-menu'),
            navToggle.classList.toggle('active');
    })
}

// footer +-開關
$("#footer-aboutus").click(function() {
    $(".footer_aboutus").slideToggle("footer_show");
    $(".footer_info").slideUp("footer_show");
    $(".footer_faq").slideUp("footer_show");
    $("#footer-aboutus").slideUp("footer_plus_none");
    $("#footer-aboutus-close").slideDown("footer_show");
    $("#footer-info").slideDown("footer_plus_none");
    $("#footer-info-close").slideUp("footer_show");
    $("#footer-faq").slideDown("footer_plus_none");
    $("#footer-faq-close").slideUp("footer_show");
});
$("#footer-aboutus-close").click(function() {
    $(".footer_aboutus").slideUp("footer_show");
    $("#footer-aboutus").slideDown("footer_plus_none");
    $("#footer-aboutus-close").slideUp("footer_show");
});
$("#footer-info").click(function() {
    $(".footer_aboutus").slideUp("footer_show");
    $(".footer_info").slideDown("footer_show");
    $(".footer_faq").slideUp("footer_show");
    $("#footer-aboutus").slideDown("footer_plus_none");
    $("#footer-aboutus-close").slideUp("footer_show");
    $("#footer-info").slideUp("footer_plus_none");
    $("#footer-info-close").slideDown("footer_show");
    $("#footer-faq").slideDown("footer_plus_none");
    $("#footer-faq-close").slideUp("footer_show");
});
$("#footer-info-close").click(function() {
    $(".footer_info").slideUp("footer_show");
    $("#footer-info").slideDown("footer_plus_none");
    $("#footer-info-close").slideUp("footer_show");
});
$("#footer-faq").click(function() {
    $(".footer_aboutus").slideUp("footer_show");
    $(".footer_info").slideUp("footer_show");
    $(".footer_faq").slideDown("footer_show");
    $("#footer-aboutus").slideDown("footer_plus_none");
    $("#footer-aboutus-close").slideUp("footer_show");
    $("#footer-info").slideDown("footer_plus_none");
    $("#footer-info-close").slideUp("footer_show");
    $("#footer-faq").slideUp("footer_plus_none");
    $("#footer-faq-close").slideDown("footer_show");
});
$("#footer-faq-close").click(function() {
    $(".footer_faq").slideUp("footer_show");
    $("#footer-faq").slideDown("footer_plus_none");
    $("#footer-faq-close").slideUp("footer_show");
});

// 右側拉購物車
$("#open-cart-at-right").click(function() {
    $(".cart_at_right").addClass("show-cart");
    $('.lightbox_background').addClass('open');
});
$("#close-cart-at-right").click(function() {
    $(".cart_at_right").removeClass("show-cart");
    $('.lightbox_background').removeClass('open');
});
$("#open-cart-at-right-rwd").click(function() {
    $(".cart_at_right").addClass("show-cart");
    $('.lightbox_background').addClass('open');
});