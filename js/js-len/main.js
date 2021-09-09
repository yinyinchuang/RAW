// member-member add_new_card
$('#add_my_new_card').click(function(event) {
    $('.add_new_card').addClass('open');
    $('#add_my_new_card').addClass('open');
    $('.change_myheight').removeClass('open');
    $('#change_my_height').removeClass('open');
});
$('#add_new_card_close').click(function(event) {
    $('.add_new_card').removeClass('open');
    $('#add_my_new_card').removeClass('open');
});
$('#add_new_card_save').click(function(event) {
    $('.add_new_card').removeClass('open');
    $('#add_my_new_card').removeClass('open');
});

// member-member change_myheight
$('#change_my_height').click(function(event) {
    $('.change_myheight').addClass('open');
    $('#change_my_height').addClass('open');
    $('.add_new_card').removeClass('open');
    $('#add_my_new_card').removeClass('open');
});
$('#change_my_height_close').click(function(event) {
    $('.change_myheight').removeClass('open');
    $('#change_my_height').removeClass('open');
});
$('#change_my_height_save').click(function(event) {
    $('.change_myheight').removeClass('open');
    $('#change_my_height').removeClass('open');
});


// member-member lightbox open and close
$('.add_new_card_prod').click(function(event) {
    $('.add_new_card_lightbox_container').addClass('open');
    $('.lightbox_background').addClass('open');
});
$('#add_new_lightbox_close').click(function(event) {
    $('.add_new_card_lightbox_container').removeClass('open');
    $('.lightbox_background').removeClass('open');
});
$('#add_new_lightbox_save').click(function(event) {
    $('.add_new_card_lightbox_container').removeClass('open');
    $('.lightbox_background').removeClass('open');
});
$('.lightbox_background').click(function(event) {
    $('.add_new_card_lightbox_container').removeClass('open');
    $('.lightbox_background').removeClass('open');
    // 關側拉購物車
    $(".cart_at_right").removeClass("show-cart");
    // $('#showup_box_delete_wish_list').removeClass('open');
});

// lookbook_lightbox
$('.lookbook_photo_card_lblink').click(function(event) {
    $('.lookbook_lightbox_container').addClass('open');
    $('.lightbox_background').addClass('open');
    var imagelink = $(this).attr('data-value');
    var tag1 = $(this).attr('data-tag1');
    var tag2 = $(this).attr('data-tag2');
    var tag3 = $(this).attr('data-tag3');
    var id = $(this).attr('data-id');
    $("#lookbook-photo-img-main").attr('data-id', id);
    document.getElementById("lookbook-photo-img-main").src = "img/RAW_images/" + imagelink + "-1-2.jpg";
    document.getElementById("lookbook-photo-img-one").src = "img/RAW_images/" + imagelink + "-1-1.jpg";
    document.getElementById("lookbook-photo-img-two").src = "img/RAW_images/" + imagelink + "-1-3.jpg";
    document.getElementById("lookbook-photo-img-three").src = "img/RAW_images/" + imagelink + "-1-4.jpg";
    document.getElementById("lookbook-photo-img-one-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink, 10);
    document.getElementById("lookbook-photo-img-two-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink, 10);
    document.getElementById("lookbook-photo-img-three-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink, 10);
    document.getElementById("lightbox-tag1").innerHTML = tag1;
    document.getElementById("lightbox-tag2").innerHTML = tag2;
    document.getElementById("lightbox-tag3").innerHTML = tag3;
    // document.getElementById("lookbook-photo-img-main-heart").href = "./add_wish_list_lookbook_detail5.php?prod_id=" + id + "&page=" + page;
    // document.getElementById("lookbook-photo-img-card-heart-one").href = "./add_wish_list_lookbook_detail5_inlb.php?prod_id=" + id + "&page=" + page;
    // document.getElementById("lookbook-photo-img-card-heart-two").href = "./add_wish_list_lookbook_detail5_inlb.php?prod_id=" + id + "&page=" + page;
    // document.getElementById("lookbook-photo-img-card-heart-three").href = "./add_wish_list_lookbook_detail5_inlb.php?prod_id=" + id + "&page=" + page;


});

// 加入收藏
$('.lookbook_photo_heart_in_fashion').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    // var page = $('li.active').attr('data-page');

    var id = $(this).attr('data-id');
    $.get("add_wish_list_fashion.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('.lookbook_photo_heart_in_lookbook').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    // var page = $('li.active').attr('data-page');

    var id = $(this).attr('data-id');
    $.get("add_wish_list_lookbook.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('.lookbook_photo_heart_in_member').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    // var page = $('li.active').attr('data-page');

    var id = $(this).attr('data-id');
    $.get("add_wish_list_member.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});

// 光箱的a連結
$('#lookbook-photo-img-main-heart').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    // var page = $('li.active').attr('data-page');

    var id = $('#lookbook-photo-img-main').attr('data-id');
    $.get("add_wish_list_lookbook.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('#lookbook-photo-img-card-heart-one').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    var id = $('#lookbook-photo-img-main').attr('data-id');
    $.get("add_wish_list_goods.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('#lookbook-photo-img-card-heart-two').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    var id = $('#lookbook-photo-img-main').attr('data-id');
    $.get("add_wish_list_goods.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('#lookbook-photo-img-card-heart-three').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    var id = $('#lookbook-photo-img-main').attr('data-id');
    $.get("add_wish_list_goods.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});


// 刪除收藏
$(document).ready(function() {
    $('.lookbook_photo_delete_in_goods').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        var id = $(this).attr('data-id');
        var page = $('li.active').attr('data-page');
        console.log(id, page);
        $.get("delete_wish_list_goods.php", {
            id: id
        }, function(obj) {
            if (obj['success']) {
                $('#showup_box_delete_wish_list').addClass('open');
                $('.cards').load("wish_list_goods_new.php", {
                    page: page
                });
            } else {
                alert(`${obj['info']}`);
            }
            console.log(obj);
        }, 'json');
    });
    $('.lookbook_photo_delete_in_fashion').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        var id = $(this).attr('data-id');
        var page = $('li.active').attr('data-page');
        console.log(id, page);
        $.get("delete_wish_list_fashion.php", {
            id: id
        }, function(obj) {
            if (obj['success']) {
                $('#showup_box_delete_wish_list').addClass('open');
                $('.cards').load("wish_list_fashion_new.php", {
                    page: page
                });
            } else {
                alert(`${obj['info']}`);
            }
            console.log(obj);
        }, 'json');
    });
    $('.lookbook_photo_delete_in_lookbook').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        var id = $(this).attr('data-id');
        var page = $('li.active').attr('data-page');
        console.log(id, page);
        $.get("delete_wish_list_lookbook.php", { id: id }, function(obj) {
            if (obj['success']) {
                $('#showup_box_delete_wish_list').addClass('open');
                $('.cards').load("wish_list_lookbook_new.php", {
                    page: page
                });
            } else {
                alert(`${obj['info']}`);
            }
            console.log(obj);
        }, 'json');

    });
    $('.lookbook_photo_delete_in_member').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        var id = $(this).attr('data-id');
        var page = $('li.active').attr('data-page');
        console.log(id, page);
        $.get("delete_wish_list_member.php", {
            id: id
        }, function(obj) {
            if (obj['success']) {
                $('#showup_box_delete_wish_list').addClass('open');
                $('.cards').load("wish_list_member_new.php", {
                    page: page
                });
            } else {
                alert(`${obj['info']}`);
            }
            console.log(obj);
        }, 'json');
    });
    // member upload 刪除card
    $('.lookbook_photo_delete_in_member_upload').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        var id = $(this).attr('data-id');
        var page = $('li.active').attr('data-page');
        console.log(id, page);
        $.get("delete_member_upload.php", { id: id }, function(obj) {
            if (obj['success']) {
                $('#showup_box_delete_member_upload').addClass('open');
                $('.cards').load("member_upload_new.php", {
                    page: page
                });
            } else {
                alert(`${obj['info']}`);
            }
            console.log(obj);
        }, 'json');
    });
});

$('.lookbook_lightbox_close').click(function(event) {
    $('.lookbook_lightbox_container').removeClass('open');
    $('.lightbox_background').removeClass('open');

});
$('.lightbox_background').click(function(event) {
    $('.lookbook_lightbox_container').removeClass('open');
    // .lightbox_background沒加上消失 是因上面有寫過了 重複寫會有問題
});

// member_photo
$('.member_photo_card_lblink').click(function(event) {
    $('.lookbook_lightbox_container').addClass('open');
    $('.lightbox_background').addClass('open');
    var imagelink = $(this).attr('data-value-main');
    var imagelink1 = $(this).attr('data-value1');
    var imagelink2 = $(this).attr('data-value2');
    var imagelink3 = $(this).attr('data-value3');
    var content = $(this).attr('data-content');
    var height = $(this).attr('data-height');
    var name = $(this).attr('data-name');
    var heart = $(this).attr('data-heart');
    var email = $(this).attr('data-email');

    document.getElementById("lookbook-photo-img-main").src = "img/RAW_images/" + imagelink;
    document.getElementById("lookbook-photo-img-one").src = "img/RAW_images/" + imagelink1 + "-1-1.jpg";
    document.getElementById("lookbook-photo-img-two").src = "img/RAW_images/" + imagelink2 + "-1-1.jpg";
    document.getElementById("lookbook-photo-img-three").src = "img/RAW_images/" + imagelink3 + "-1-1.jpg";
    document.getElementById("lookbook-photo-img-one-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink1, 10);
    document.getElementById("lookbook-photo-img-two-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink2, 10);
    document.getElementById("lookbook-photo-img-three-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink3, 10);

    var tag1 = $(this).attr('data-tag1');
    var tag2 = $(this).attr('data-tag2');
    var tag3 = $(this).attr('data-tag3');
    document.getElementById("lightbox-tag1").innerHTML = tag1;
    document.getElementById("lightbox-tag2").innerHTML = tag2;
    document.getElementById("lightbox-tag3").innerHTML = tag3;

    var id = $(this).attr('data-id');
    $("#lookbook_photo_heart_in_member_in_lb").attr('data-id', id);
    var id1 = $(this).attr('data-id1');
    var id2 = $(this).attr('data-id2');
    var id3 = $(this).attr('data-id3');
    $("#lookbook_photo_heart_in_member_in_lb-1").attr('data-id', id1);
    $("#lookbook_photo_heart_in_member_in_lb-2").attr('data-id', id2);
    $("#lookbook_photo_heart_in_member_in_lb-3").attr('data-id', id3);
    // alert($("#lookbook_photo_heart_in_member_in_lb").attr('data-id'));
    document.getElementById("lookbook-lightbox-description").innerHTML = content;
    document.getElementById("member-height").innerHTML = height;
    document.getElementById("member-name").innerHTML = name;
    document.getElementById("member-heart").innerHTML = heart;
    document.getElementById("member_detail-btn").href = "./features_member_detail.php?email=" + email;
    // $("#member_detail-btn").attr('data-email', email);
    document.getElementById("member_person_link_main_photo").src = "img/RAW_images/member_" + email + ".jpg";
});
$('#lookbook_photo_heart_in_member_in_lb').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    // var page = $('li.active').attr('data-page');

    var id = $(this).attr('data-id');
    // alert(id);
    $.get("add_wish_list_member.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('#lookbook_photo_heart_in_member_in_lb-1').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    var id = $(this).attr('data-id');
    $.get("add_wish_list_goods.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('#lookbook_photo_heart_in_member_in_lb-2').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    var id = $(this).attr('data-id');
    // alert(id);
    $.get("add_wish_list_goods.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});
$('#lookbook_photo_heart_in_member_in_lb-3').click(function(event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    var id = $(this).attr('data-id');

    $.get("add_wish_list_goods.php", { id });
    $('#showup_box_add_wish_list').addClass('open');
});

// member lightbox 查看
// $('#member_detail-btn').click(function(event) {

//     var email = $(this).attr('data-email');

//     $.get("features_member_detail.php", { email });
// });



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
            href: $this.children('option').eq(i).val() + '.php'
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

// cart_at_right 側拉
// const cartAtRight = document.getElementById('cart-at-right'),
//     openCartAtRight = document.getElementById('open-cart-at-right')


// if (openCartAtRight) {
//     openCartAtRight.addEventListener('click', () => {
//         cartAtRight.classList.toggle('show-cart')
//             // openCartAtRight.classList.toggle('active');
//     });
// }
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

//身高
// function myHeight() {
//     var height_input1 = $('#height_input1').val(),
//         height_input2 = $('#height_input2').val();
//     $.ajax({
//         type: 'POST',
//         url: 'features_member'
//     });
// }

// showup_box
// $('.fake_content').click(function(event) {
//     $('#showup_box_delete_wish_list').addClass('open');
// });
$('#showup_box_delete_wish_list_btn').click(function(event) {
    $('#showup_box_delete_wish_list').removeClass('open');
});

$('.sidebar_filter').click(function(event) {
    var height_input1 = $('#height_input1').val(),
        height_input2 = $('#height_input2').val(),
        page = $('li.active').attr('data-page');

    console.log(height_input1 + height_input2);
    $('.right_cards').load("sidebar_filter_height.php", {
        height_input1: height_input1,
        height_input2: height_input2,
        page: page
    });
});
// $('.fake_content').click(function(event) {
//     $('#showup_box_add_wish_list').addClass('open');
// });
$('#showup_box_add_wish_list_btn').click(function(event) {
    $('#showup_box_add_wish_list').removeClass('open');
});