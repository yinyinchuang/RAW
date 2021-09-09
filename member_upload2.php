<?php require_once "db.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAW</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <style>
        .the_add_photo,
        .the_add_photo img {
            position: relative;
            width: 100%;
            height: 100%;
            object-fit: cover;
            overflow: hidden;
        }

        .add_upload_box {
            position: absolute;

        }

        .add_upload_box label,
        .add_upload_box input[type="file"] {
            width: 100px;
            height: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .add_upload_box input[type="file"] {
            opacity: 0;
        }

        .add_upload_box label {
            cursor: pointer;
            text-align: center;
            display: table;
            margin: auto;
            font-size: 16px;
            color: #fafafa;
        }
    </style>
</head>

<?php require_once 'tpl/head.inc.php' ?>
<!-- content -->
<div class="container twosides_container">
    <div class="select_sidebar">
        <a href="./member_account.php">
            <div class="select_sidebar_box select_sidebar_box_top">我的資料</div>
        </a>
        <a href="./member_order.php">
            <div class="select_sidebar_box">我的訂單</div>
        </a>
        <a href="./member_iamraw.php">
            <div class="select_sidebar_box">我在赤著</div>
        </a>
        <a href="./member_upload.php">
            <div class="select_sidebar_box select_sidebar_box_active">我的穿搭</div>
        </a>
        <!-- <a href="./member_search.php">
            <div class="select_sidebar_box">我的搜尋</div>
        </a> -->

    </div>
    <div class="pc_dn_select">
        <select class="container select_title_box">
            <option value="member_upload">我的穿搭</option>
            <option value="member_account">我的資料</option>
            <option value="member_order">我的訂單</option>
            <option value="member_iamraw">我在赤著</option>
            <!-- <option value="member_search">我的搜尋</option> -->
        </select>
    </div>

    <div class="member_right_sidebar">
        <div class="member_right_btn" id="add_my_new_card">
            新增我的穿搭
        </div>
        <div class="member_right_btn" id="change_my_height">
            我的身型
        </div>
        <div class="add_new_card">
            <div class="add_new_card_photo">
                <div class="the_add_photo">
                    <img src="./img/fashion2.jpg" id="add-upload-img">
                </div>
                <div class="add_upload_box">
                    <label for="fileupload">上傳照片</label>
                    <input type="file" name="my_file" id="add-upload-img-input">
                </div>
            </div>
            <div class="add_new_card_right">
                <!-- <div class="add_new_card_title">搭配服飾</div> -->
                <!-- <div class="add_new_card_prod_box">
                        <div class="add_new_card_prod">+</div>
                        <div class="add_new_card_prod">+</div>
                        <div class="add_new_card_prod">+</div>
                    </div> -->
                <div class="add_new_card_title">穿搭心得</div>
                <textarea type="text" class="add_new_card_content" id="cardContent"></textarea>
                <div class="add_new_card_title">*同意分享至Lookbook</div>
                <div class="add_new_card_btns">
                    <button class="add_new_card_left_btn" id="add_new_card_close">取消</button>
                    <button class="add_new_card_right_btn" id="add_new_card_save">儲存</button>
                </div>
            </div>

        </div>
        <div class="change_myheight">
            <div class="change_myheight_input_box">
                請輸入 :<input type="text" id="change_myheight_input" class="change_myheight_input" placeholder="身高">cm
            </div>
            <div class="add_new_card_btns">
                <button class="add_new_card_left_btn" id="change_my_height_close">取消</button>
                <button class="add_new_card_right_btn" id="change_my_height_save">儲存</button>
            </div>
        </div>
        <!-- cards -->
        <div class="cards right_cards">
            <?php
            //預設訊息
            // $obj['success'] = false;
            // $obj['info'] = "Insert User Default Data 失敗";
            $account = 'haha@raw.com';
            $path = './upload/' . $account . '/';

            // if (!isset($_SESSION['email'])) { //確認登入與否
            //     $obj['info'] = '請先登入';
            // } else { //確認前端請求資料是否完整
            //新增商品追蹤的 SQL 語法
            $sql = "SELECT `photo`,`created_at`
            FROM `member_upload`             
            WHERE `email` = '" . $account . "'";

            //執行 SQL 語法
            $stmt = $pdo->query($sql);

            //判斷是否寫入資料
            if ($stmt->rowCount() > 0) {

                foreach ($stmt->fetchAll() as $obj1) {

            ?>
                    <div class="member_photo_card_in_member">
                        <img src=<?= $path . $obj1['photo'] ?> alt="" class="lookbook_photo_img">
                        <div class="card_content_box">
                            <p class="card_content"><?= $obj1['created_at'] ?></p>
                            <div class="member_heart_count">
                                <img src="./svg/heart.svg" alt="">
                                <p>99</p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>



            <!-- <div class="member_photo_card_in_member">
                <img src="./img/fashion2.jpg" alt="" class="lookbook_photo_img">
                <div class="card_content_box">
                    <p class="card_content">2021/08/06</p>
                    <div class="member_heart_count">
                        <img src="./svg/heart.svg" alt="">
                        <p>99</p>
                    </div>
                </div>
            </div>
            <div class="member_photo_card_in_member">
                <img src="./img/fashion2.jpg" alt="" class="lookbook_photo_img">
                <div class="card_content_box">
                    <p class="card_content">2021/08/06</p>
                    <div class="member_heart_count">
                        <img src="./svg/heart.svg" alt="">
                        <p>99</p>
                    </div>
                </div>
            </div>
            <div class="member_photo_card_in_member">
                <img src="./img/fashion2.jpg" alt="" class="lookbook_photo_img">
                <div class="card_content_box">
                    <p class="card_content">2021/08/06</p>
                    <div class="member_heart_count">
                        <img src="./svg/heart.svg" alt="">
                        <p>99</p>
                    </div>
                </div>
            </div>
            <div class="member_photo_card_in_member">
                <img src="./img/fashion2.jpg" alt="" class="lookbook_photo_img">
                <div class="card_content_box">
                    <p class="card_content">2021/08/06</p>
                    <div class="member_heart_count">
                        <img src="./svg/heart.svg" alt="">
                        <p>99</p>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>
<!-- 彈出視窗 -->
<div class="add_new_card_lightbox_container">
    <div class="add_new_card_photo"></div>
    <div class="add_new_card_lightbox_right">
        <!-- <div class="add_new_card_title">選擇服飾</div> -->
        <div class="add_new_card_lightbox_content">
            <div class="add_new_card_title">類別</div>
            <!-- <div class="add_new_card_lightbox_select"></div> -->
            <select class="container select_title_box add_new_card_lightbox_select">
                <option value="#">全部</option>
                <option value="#">上衣</option>
                <option value="#">下身</option>
                <option value="#">配件</option>
            </select>
            <div class="add_new_card_title">紀錄</div>
            <!-- <div class="add_new_card_lightbox_select"></div> -->
            <select class="container select_title_box add_new_card_lightbox_select">
                <option value="#">購買記錄</option>
                <option value="#">購買記錄1</option>
                <option value="#">購買記錄2</option>
                <option value="#">購買記錄3</option>
                <option value="#">購買記錄4</option>
                <option value="#">購買記錄5</option>
                <option value="#">購買記錄6</option>
            </select>
        </div>
        <div class="add_new_card_btns">
            <button class="add_new_card_left_btn" id="add_new_lightbox_close">取消</button>
            <button class="add_new_card_right_btn" id="add_new_lightbox_save">儲存</button>
        </div>
    </div>
</div>


<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- len -->
<!-- <script src="./js/main.js"></script> -->
<script>
    $(function() {
        $("#add-upload-img-input").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#add-upload-img").attr("src", x);
            console.log(event);
        });
    })





    // 儲存身高

    $("button#change_my_height_save").click(function() {
        console.log("hi");
        let changeheight = $('input#change_myheight_input');
        console.log(changeheight.val());
        let objUser = {
            changeheight: changeheight.val()
        };

        $.post("changeheight.php", objUser, function(obj) {
            if (obj['success']) {

                setTimeout(function() {
                    location.reload();
                }, 1000);

            } else {
                alert(`${obj['info']}`);
            }

            console.log(obj);
        }, 'json')
    });


    // 儲存我的穿搭
    $('button#add_new_card_save').click(function() {
        //避免元素的預設事件被觸發

        event.preventDefault();
        //各自將 input 帶入變數中
        let text_cardContent = $('#cardContent');
        let my_file = $("input#add-upload-img-input").get(0).files[0];

        console.log(text_cardContent.val());
        console.log(my_file);


        var form_data = new FormData();
        form_data.append('cardContent', text_cardContent.val());
        form_data.append('my_file', my_file);


        // 傳入後端儲存
        $.ajax({
            url: "uploadNewCard.php",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data, //data只能指定單一物件                 
            type: 'post',
            success: function(obj) {
                // var prodImgs = obj['aryImgs'];
                // alert("arryImsg:" + prodImgs);

                // var arrImg = $('.colorCloth');
                // //alert("img.length" + arrImg.length);
                // for (var i = 0; i < arrImg.length; i++) {
                //     //arrImg[i].src = prodImgs[i];
                //     alert("arrImg[i].src" + arrImg[i].innerHTML);
                //     arrImg[i].innerHTML = "<img src='RAW_images/" + prodImgs[i] + "' alt='' style='width: 145px;margin:0 auto;align-items:center'>";
                // }
                //alert('success');
                location.reload();
            },
            error: function() {
                alert('error');
            }
        });

    });
</script>
<script>
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
    });

    // lookbook_lightbox
    $('.lookbook_photo_card').click(function(event) {
        $('.lookbook_lightbox_container').addClass('open');
        $('.lightbox_background').addClass('open');
        var imagelink = $(this).attr('data-value');
        document.getElementById("lookbook-photo-img-main").src = "img/RAW_images/" + imagelink + "-1-2.jpg";
        document.getElementById("lookbook-photo-img-one").src = "img/RAW_images/" + imagelink + "-1-1.jpg";
        document.getElementById("lookbook-photo-img-two").src = "img/RAW_images/" + imagelink + "-1-3.jpg";
        document.getElementById("lookbook-photo-img-three").src = "img/RAW_images/" + imagelink + "-1-4.jpg";
        document.getElementById("lookbook-photo-img-one-a").href = "./raw_goods_index.php?pord_id=" + parseInt(imagelink, 10);
        document.getElementById("lookbook-photo-img-two-a").href = "./raw_goods_index.php?pord_id=" + parseInt(imagelink, 10);
        document.getElementById("lookbook-photo-img-three-a").href = "./raw_goods_index.php?pord_id=" + parseInt(imagelink, 10);
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
    $('.member_photo_card').click(function(event) {
        $('.lookbook_lightbox_container').addClass('open');
        $('.lightbox_background').addClass('open');
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
</script>
</body>

</html>