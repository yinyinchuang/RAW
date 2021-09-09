<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-p/main-p.css">
    <link rel="stylesheet" href="./css/css-p/search.css">
    <style>
    </style>
</head>


<?php require_once 'tpl/head.inc.php' ?>
<!-- content -->
<div class="container" style="display: flex;">
    <!-- 會員中心目錄 -->
    <div class="memberCenter">

        <a href="./member_account.php">
            <div class="list">我的資料</div>
        </a>
        <a href="./member_order.php">
            <div class="list">我的訂單</div>
        </a>
        <a href="./member_iamraw.php">
            <div class="list">我在赤著</div>
        </a>
        <a href="./member_upload.php">
            <div class="list">我的穿搭</div>
        </a>
        <a href="./member_search.php">
            <div class="list" style="background-color: rgba(188, 170, 154, .25)">我的搜尋</div>
        </a>
    </div>

    <!-- 主要資料區 -->
    <div class="mainCorner" style="flex-direction: column;">
        <div class="container" style="display: flex;justify-content: space-between;">
            <div class="instruction">
                <p>Step 1 進入ALL商品頁面</p>
                <p>Step 2 選擇您想要的類別</p>
                <p>Step 3 選擇您想要的搜尋篩選</p>
                <p>Step 4 點擊 儲存搜尋條件</p>
                <p>Step 5 再到 我的搜尋 就會顯示所有您儲存過的條件</p>
            </div>
            <div class="LuckyBox">吉祥物i'm here</div>
        </div>


        <div class="searchBox" style="display: flex;justify-content: space-between;">
            <div style="display: flex;justify-content: space-around;">
                <div class="searchDetail" id="" name="">
                    所有褲子
                </div>
                <div class="searchDetail" id="" name="">
                    NT.1,600
                </div>
                <div class="searchDetail" id="" name="" style="display: flex;">
                    <div style="width: 20px;height: 20px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                    <div style="width: 20px;height: 20px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px">
                    </div>
                    <div style="width: 20px;height: 20px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px">
                    </div>
                </div>
                <div class="searchDetail" id="" name="">
                    品牌BrandA
                </div>
            </div>
            <div class="" style="display: flex; flex-direction:row;justify-content: end;">

                <div>
                    <button class="searchButton">
                        <a href="">
                            <p class="" style="color: #FAFAFA; ">搜尋</p>
                        </a>
                    </button>

                </div>
                <div style="width: 16px;height: 16px;margin: 20px 30px;">
                    <a href=""><img class="" style="width: 16px;height: 16px;margin-top: 4px;" src="../RAW8171330/svg/trash.svg" alt=""></a>
                </div>

            </div>
        </div>


    </div>
</div>
<!-- RWD -->
<div class="mainCornerRWD" style="">
    <div class="container title_box">
        <a href="./account.html" class="title_box4"></a>
        <a href="./order.html" class="title_box4 title_box_active"></a>
        <a href="./iamRAW.html" class="title_box4"></a>
        <a href="./member.html" class="title_box4"></a>
        <a href="./search.html" class="title_box4"></a>
    </div>
    <div class="pc_dn_select">
        <select id="myselect" class="container select_title_box">
            <option value="member_search">我的搜尋</option>
            <option value="member_order">我的訂單</option>
            <option value="member_iamraw">我在赤著</option>
            <option value="member_account">我的資料</option>
            <option value="member_upload">我的穿搭</option>

        </select>
    </div>

    <div class="LuckyBoxRWD containerRWD">吉祥物i'm here</div>
    <div class="instructionRWD containerRWD">
        <p>Step 1 進入ALL商品頁面</p>
        <p>Step 2 選擇您想要的類別</p>
        <p>Step 3 選擇您想要的搜尋篩選</p>
        <p>Step 4 點擊 儲存搜尋條件</p>
        <p>Step 5 再到 我的搜尋 就會顯示所有您儲存過的條件</p>
    </div>

    <div class="" style="display: flex;flex-wrap: wrap;">
        <div class="searchBoxRWD" style="margin-left: 15px;">
            <div class="" style="">
                <div style="display: flex;margin-top: 15px;margin-left: 15px;">
                    <div class="searchDetailRWD" id="" name="" style="margin-right: 15px;">
                        所有褲子
                    </div>
                    <div class="searchDetailRWD" id="" name="">
                        NT.1,600
                    </div>
                </div>
                <div class="" id="" name="" style="display: flex; margin-left: 15px;">
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                </div>
                <div class="" id="" name="" style="display: flex;margin-top: 15px;margin-left: 15px;">
                    品牌BrandA
                </div>
            </div>
            <div class="" style="display: flex; flex-direction:row;justify-content: end;">

                <div>
                    <button class="searchButtonRWD" style="margin-left:15px;margin-top: 15px;">

                        <a href="#">
                            <p class="" style="color: #FAFAFA;font-size: 12px;">搜尋</p>
                        </a>

                    </button>

                </div>
                <div style="margin-top: 15px;margin-left: 60px;">
                    <img class="" style="width: 12px;height: 12px" src="./svg/trash.svg" alt="">
                </div>

            </div>
        </div>
        <div class="searchBoxRWD" style="margin-left: 15px;">
            <div class="" style="">
                <div style="display: flex;margin-top: 15px;margin-left: 15px;">
                    <div class="searchDetailRWD" id="" name="" style="margin-right: 15px;">
                        所有褲子
                    </div>
                    <div class="searchDetailRWD" id="" name="">
                        NT.1,600
                    </div>
                </div>
                <div class="" id="" name="" style="display: flex; margin-left: 15px;">
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                </div>
                <div class="" id="" name="" style="display: flex;margin-top: 15px;margin-left: 15px;">
                    品牌BrandA
                </div>
            </div>
            <div class="" style="display: flex; flex-direction:row;justify-content: end;">

                <div>
                    <button class="searchButtonRWD" style="margin-left:15px;margin-top: 15px;">
                        <p class="" style="color: #FAFAFA;font-size: 12px;">搜尋</p>
                    </button>

                </div>
                <div style="width: 10px;height: 10px;margin-top: 15px;margin-left: 60px;">
                    <a href=""><img class="" style="" src="./svg/trash.svg" alt=""></a>
                </div>

            </div>
        </div>
        <div class="searchBoxRWD" style="margin-left: 15px;">
            <div class="" style="">
                <div style="display: flex;margin-top: 15px;margin-left: 15px;">
                    <div class="searchDetailRWD" id="" name="" style="margin-right: 15px;">
                        所有褲子
                    </div>
                    <div class="searchDetailRWD" id="" name="">
                        NT.1,600
                    </div>
                </div>
                <div class="" id="" name="" style="display: flex; margin-left: 15px;">
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                    <div style="width: 14px;height: 14px;background-color: #BCAA9A;border-radius: 50%;margin-top: 20px;margin-right: 15px;">
                    </div>
                </div>
                <div class="" id="" name="" style="display: flex;margin-top: 15px;margin-left: 15px;">
                    品牌BrandA
                </div>
            </div>
            <div class="" style="display: flex; flex-direction:row;justify-content: end;">

                <div>
                    <button class="searchButtonRWD" style="margin-left:15px;margin-top: 15px;">
                        <p class="" style="color: #FAFAFA;font-size: 12px;">搜尋</p>
                    </button>

                </div>
                <div style="width: 10px;height: 10px;margin-top: 15px;margin-left: 60px;">
                    <a href=""><img class="" src="./svg/trash.svg" alt=""></a>
                </div>

            </div>
        </div>

    </div>
</div>

<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
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
    $('#myselect').each(function() {

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
                href: $this.children('option').eq(i).val().toLowerCase() + '.php'
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
</script>

</body>

</html>