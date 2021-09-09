// member-member add_new_card
$('#add_my_new_card').click(function(event) {
    $('.add_new_card').toggleClass('open');
    $('#add_my_new_card').toggleClass('open');
});
$('#add_new_card_close').click(function(event) {
    $('.add_new_card').toggleClass('open');
    $('#add_my_new_card').toggleClass('open');
});
$('#add_new_card_save').click(function(event) {
    $('.add_new_card').toggleClass('open');
    $('#add_my_new_card').toggleClass('open');
});

// member-member change_myheight
$('#change_my_height').click(function(event) {
    $('.change_myheight').toggleClass('open');
    $('#change_my_height').toggleClass('open');
});
$('#change_my_height_close').click(function(event) {
    $('.change_myheight').toggleClass('open');
    $('#change_my_height').toggleClass('open');
});
$('#change_my_height_save').click(function(event) {
    $('.change_myheight').toggleClass('open');
    $('#change_my_height').toggleClass('open');
});


// member-member lightbox open and close
$('.add_new_card_prod').click(function(event) {
    $('.add_new_card_lightbox_container').toggleClass('open');
    $('.lightbox_background').toggleClass('open');
});
$('#add_new_lightbox_close').click(function(event) {
    $('.add_new_card_lightbox_container').toggleClass('open');
    $('.lightbox_background').toggleClass('open');
});
$('#add_new_lightbox_save').click(function(event) {
    $('.add_new_card_lightbox_container').toggleClass('open');
    $('.lightbox_background').toggleClass('open');
});
$('.lightbox_background').click(function(event) {
    $('.add_new_card_lightbox_container').toggleClass('open');
    $('.lightbox_background').toggleClass('open');
});

// lookbook_lightbox
$('.lookbook_photo_card').click(function(event) {
    $('.lookbook_lightbox_container').toggleClass('open');
    $('.lightbox_background').toggleClass('open');
});
$('.lookbook_lightbox_close').click(function(event) {
    $('.lookbook_lightbox_container').toggleClass('open');
    $('.lightbox_background').toggleClass('open');
});
$('.lightbox_background').click(function(event) {
    $('.lookbook_lightbox_container').toggleClass('open');
    // .lightbox_background沒加上消失 是因上面有寫過了 重複寫會有問題
});

// member_photo
$('.member_photo_card').click(function(event) {
    $('.lookbook_lightbox_container').toggleClass('open');
    $('.lightbox_background').toggleClass('open');
});

//select_title_box
// Iterate over each select element
$('select').each(function() {

    // Cache the number of options
    var $this = $(this),
        numberOfOptions = $(this).children('option').length;

    // Hides the select element
    $this.addClass('s-hidden');

    // Wrap the select element in a div
    $this.wrap('<div class="select"></div>');

    // Insert a styled div to sit over the top of the hidden select element
    $this.after('<div class="styledSelect"</div>');

    // Cache the styled div
    var $styledSelect = $this.next('div.styledSelect');

    // Show the first select option in the styled div
    $styledSelect.text($this.children('option').eq(0).text());

    // Insert an unordered list after the styled div and also cache the list
    var $list = $('<ul/>', {
        'class': 'options'
    }).insertAfter($styledSelect);

    // Insert a list item into the unordered list for each select option
    for (var i = 0; i < numberOfOptions; i++) {
        // $('<li />', {
        //     text: $this.children('option').eq(i).text(),
        //     rel: $this.children('option').eq(i).val()
        // }).appendTo($list);
        $('<a />', {
            text: $this.children('option').eq(i).text(),
            href: $this.children('option').eq(i).val().toLowerCase() + '.html'
        }).appendTo($list);
    }

    // Cache the list items
    var $listItems = $list.children('li');

    // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.styledSelect.active').each(function() {
            $(this).removeClass('active').next('ul.options').hide();
        });
        $(this).toggleClass('active').next('ul.options').toggle();
    });

    // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
    // Updates the select element to have the value of the equivalent option
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        /* alert($this.val()); Uncomment this for demonstration! */
    });

    // Hides the unordered list when clicking outside of it
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});

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

// if (navClose) {
//     navClose.addEventListener('click', () => {
//         navMenu.classList.remove('show-menu')
//     })
// }

// footer plus show and hide
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