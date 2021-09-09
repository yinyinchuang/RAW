$(".sidebar_title h2").click(function (event) {
    $(this).toggleClass("active");
    $(this).siblings(".sidebar_content").slideToggle();
    $(this).toggleClass("sidebar_sort_close");
    $(this).toggleClass("sidebar_category_close");
});

// // 男女裝收合
// $(".gender_title").click(function (event) {
//     // 麵包屑改字
//     // console.log('h2 text', $(this).text());
//     // $('.breadcrumb').find('a').eq(1).text($(this).text());
//     $(this).toggleClass("active");
//     $(this).slideToggle();
//     $(this).parent().find(".sidebar_title").slideToggle();
//     $(this).parent().siblings().find(".gender_title").slideDown();
//     $(this).parent().siblings().find(".sidebar_title").slideUp();
//     // $(".women_title_show").css("color", "yellow");
//     $(".women_title_show").toggleClass("show");
//     $(".men_title_show").toggleClass("show");
// });


$(".color_circle").click(function () {
    $(this).addClass("color_selected");
    $(this).siblings().removeClass("color_selected");
})

// 選分類再選顏色
$("a.color_link").click(function (event) {
    event.preventDefault();
    let a = $(this);
    // alert(location.search);
    let urlParams = new URLSearchParams(location.search);
    let url = `?`;
    if (urlParams.has('cat_id')) url += `cat_id=${urlParams.get('cat_id')}&`;
    if (urlParams.has('sub_cat_id')) url += `sub_cat_id=${urlParams.get('sub_cat_id')}&`;
    url += `color=${a.attr('data-color')}`;
    location.href = url;
})



// RWD 篩選欄
$(".mobile_title").click(function (event) {
    $(this).toggleClass("active");
    $(this).siblings(".product_sidebar").slideToggle();
    $(this).toggleClass("mobile_title_close");
    // $(this).toggleClass("sidebar_underline");

});

// 加入收藏
$(".product_list_heart").click(function (event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    var id = $(this).attr('data-id');

    $.get("add_wish_list_goods.php", {
        id
    });
    $('#showup_box_add_wish_list').addClass('open');
});

$('#showup_box_add_wish_list_btn').click(function (event) {
    $('#showup_box_add_wish_list').removeClass('open');
});


