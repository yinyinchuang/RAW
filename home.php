<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAW</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-yin/index.css">
    <link rel="stylesheet" href="./css/css-yin/fullpage.css">
</head>

<!-- header -->
<div class="lightbox_background"></div>
<!-- header -->
<header class="header_index">
    <div class="headercontainer headerandfooter">
        <div class="hamburger">
            <div class="hamburger_box" id="nav-toggle">
                <!-- <img src="./svg/hamburger.svg" alt=""> -->
                <!-- <div class="hamburger_line"></div> -->
            </div>
        </div>
        <div class="logo">
            <a href="./home.php"><img src="./svg/white-logo.svg" alt=""></a>

        </div>
        <nav class="nav">
            <a href="./product_list_all.php">ALL</a>
            <a href="./product_list_new.php">NEW</a>
            <a href="./features_fashion.php">FEATURES</a>
        </nav>
        <div class="header_icons">
            <a href="#" id="search_in_pc"><img src="./svg/white-search.svg" alt=""></a>
            <a href="./member_account.php" id="member_account_in_pc"><img src="./svg/white-account.svg" alt=""></a>
            <a href="./wish_list_goods.php" id="member_wish_list_in_pc"><img src="./svg/white-heart.svg" alt=""></a>
            <a href="#"></a>
            <div id="open-cart-at-right"><img src="./svg/white-cart.svg" alt=""></div>
        </div>
        <div class="header_icons_rwd">
            <a href="#"><img src="./svg/rwd-search.svg" alt=""></a>
            <a href="#"></a>
            <div id="open-cart-at-right-rwd"><img src="./svg/rwd-shopping-cart.svg" alt=""></div>
        </div>
        <div class="nav_menu" id="nav-menu">
            <img src="./svg/close.svg" alt="" id="nav-close">
            <a href="./product_list_all.php">ALL</a>
            <a href="./product_list_new.php">NEW</a>
            <a href="./features_fashion.php">FEATURES</a>

            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <a href="./member_account.php">MEMBER</a>
                <a href="./wish_list_goods.php">WISH LIST</a>
                <a href="#" id="rwd_logout">LOG OUT</a>

            <?php
            } else if (!isset($_SESSION['email'])) {
            ?>
                <a href="./singup_login_switch.php">LOG IN / REGISTER</a>
            <?php
            }
            ?>

        </div>
    </div>
</header>
<div class="cart_at_right" id="cart-at-right">
    <img src="./svg/close.svg" alt="" class="lookbook_lightbox_close" id="close-cart-at-right">
    <div class="cart_at_right_card_container">
    </div>
    <a href="./shoppingcart_cart.php" class="cart_at_right_end">結帳</a>
</div>
<div class="container show_msg_box">
    <?php
    if (isset($_SESSION['email'])) {
    ?>
        <div class="showup_box_300x150" style="border:none;top: 80px;
    right: 0;transform: translate(180%, 0);" id="showup_box_member">
            <a href="./member_account.php">
                <p style="padding-top: 24px;
            padding-left: 32px;text-align: start;">會員中心</p>
            </a>

            <button class="showup_box_button_300x150" id="showup_box_member_logout">登出</button>
        </div>
    <?php
    }
    ?>


    <div class="showup_box_300x150">
        <p>已加入購物車</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>



    <div class="showup_box_300x150">
        <p>登入成功</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>



    <div class="showup_box_300x150">
        <p>已更新</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>



    <div class="showup_box_300x150">
        <p>已發送</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>



    <div class="showup_box_300x150">
        <p>註冊成功</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>



    <div class="showup_box_300x150">
        <p>已移至我再想想</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>



    <div class="showup_box_300x150">
        <p>超過現有數量</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>



    <div class="showup_box_300x150">
        <p>已移除商品</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>


    <div class="showup_box_300x150">
        <p>部分商品已售完</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>

    <div class="showup_box_300x150" id="logout_len">
        <p>登出成功</p>
        <button class="showup_box_button_300x150" id="logout_len_btn">確定</button>
    </div>

    <div class="showup_box_300x150">
        <p>上傳成功</p>
        <button class="showup_box_button_300x150">確定</button>
    </div>


    <div class="showup_box_300x150" id="showup_box_add_wish_list">
        <p>已收藏</p>
        <button class="showup_box_button_300x150" id="showup_box_add_wish_list_btn">確定</button>
    </div>
    <div class="showup_box_300x150" id="showup_box_delete_wish_list">
        <p>已從我的收藏移除</p>
        <button class="showup_box_button_300x150" id="showup_box_delete_wish_list_btn">確定</button>
    </div>

    <div class="showup_box_300x150" id="showup_box_delete_member_upload">
        <p>已從我的穿搭移除</p>
        <button class="showup_box_button_300x150" id="showup_box_delete_member_upload_btn">確定</button>
    </div>


    <div class="showup_box_300x186">
        <div class="color_bar"></div>
        <p>您確定要移除?</p>
        <button class="showup_box_button_300x186">取消</button>
        <button class="showup_box_button_300x186" id="showup_box_button_300x186_sure">確定</button>
    </div>



    <div class="showup_box_300x186">
        <div class="color_bar"></div>
        <p>是否要離開此頁面?</p>
        <button class="showup_box_button_300x186">取消</button>
        <button class="showup_box_button_300x186" id="showup_box_button_300x186_sure">確定</button>
    </div>

</div>
<div class="search_bar">
    <form action="product_list_search.php" method="get">
        <input type="text" name="keyword" class="search_content" placeholder="輸入 關鍵字">
        <button class="search_content" onclick="location.href='./product_list_search.php'">SEARCH</button>
    </form>
</div>

<div id="fullpage">
    <!-- herosection -->
    <div class="section active" id="section0">
        <div class="herosection">
            <p class="herosection_title">
                RAW</br>
                x</br>
                美食水水千千</br>
                Like Nobody's Watching</br>
            </p>
        </div>
    </div>

    <!-- index_features -->
    <div class="section" id="section1">
        <div class="index_features">
            <p class="index_features_title">沒關係，再怎麼難，你的人生我都會陪著你</p>
            <a href="./features_fashion_detail2.php" target="_blank">
                <img class="index_features_img1" src="./img/home_features01.jpg" alt="">
            </a>
            <a href="./features_fashion_detail2.php" target="_blank">
                <img class="index_features_img2" src="./img/home_features02.jpg" alt="">
            </a>
            <div class="index_features_white"></div>
            <p class="index_features_img_text">除非你不要我，不然我不會放棄你</p>
        </div>
    </div>

    <div class="section" id="section2">
        <div class="index_features">
            <p class="index_features_content">讀到這兩句讓人心暖暖的篤定</br>
                相信兩人在未來也將目標的一致地，繼續並肩前行</br>
                細數每一次旅行中各種大小劫難</br>
                兩人苦中作樂似的；卻也享受著笑著</br>
                這些沒有腳本的真實經歷，讓每一次的旅程都刻骨銘心</p>
            <div class="more features_more">
                <a href="./features_fashion.php" target="_blank">MORE+</a>
            </div>
            <h2 class="index_features_series_title">系列單品</h2>

            <div class="index_features_series">
                <a href="./raw_goods_index.php?prod_id=203" target="_blank">
                    <img class="series_img" src="./img/home_features_series01.jpg" alt="">
                </a>
                <a href="./raw_goods_index.php?prod_id=205" target="_blank">
                    <img class="series_img" src="./img/home_features_series02.jpg" alt="">
                </a>
                <a href="./raw_goods_index.php?prod_id=236" target="_blank">
                    <img class="series_img" src="./img/home_features_series03.jpg" alt="">
                </a>
                <a href="./raw_goods_index.php?prod_id=207" target="_blank">
                    <img class="series_img" src="./img/home_features_series04.jpg" alt="">
                </a>
            </div>
            <div class="more series_more">
                <a href="./product_list_new.php?series=2" target="_blank">MORE+</a>
            </div>
        </div>
    </div>

    <!-- index_new -->
    <div class="section" id="section3">
        <div class="index_new">
            <h2>NEW 2021 SS</h2>
            <div class="index_new_img">
                <a href="#" target="_blank">
                    <img src="./img/home_new01.jpg" alt="">
                </a>
                <div class="index_new_content">
                    <p>看著</br>
                        那片秋葉</br>
                        從這棵大樹頂端的枯枝落下</br>
                        </br>
                        陽光斜射下來的光暈</br>
                        葉片背後的大山</br>
                        殘存的綠意</br>
                        鬆軟的土壤</br>
                        </br>
                        我赤著雙腳</br>
                        站在這裡</br>
                        感受</br>
                        自然給我最赤裸的</br>
                        每一幕</p>
                    <div class="index_new_content_color">
                        <button type="button" class="new_color new_color1"></button>
                        <button type="button" class="new_color new_color2"></button>
                        <button type="button" class="new_color new_color3"></button>
                        <button type="button" class="new_color new_color4"></button>
                    </div>
                </div>
            </div>
            <div class="index_new_item">
                <a href="#" target="_blank"><img src="./img/home_new02.jpg" alt="" class="new_item_img_1"></a>
                <a href="#" target="_blank"><img src="./img/home_new03.jpg" alt="" class="new_item_img_2"></a>
                <a href="#" target="_blank"><img src="./img/home_new04.jpg" alt="" class="new_item_img_3"></a>
                <a href="#" target="_blank"><img src="./img/home_new05.jpg" alt="" class="new_item_img_4"></a>
            </div>
            <div class="index_new_item">

            </div>
            <div class="new_more">
                <a href="./product_list_new.php" target="_blank">MORE+</a>
            </div>
        </div>
    </div>

    <!-- category -->
    <div class="section" id="section4">
        <div class="slide active">
            <div class="index_category">
                <div class="index_category_img">
                    <div class="index_category_img_content">
                        <h3>New Collection 2021</h3>
                        <h2>前開釦A字短裙</h2>
                        <div class="category_more">
                            <a href="./product_list_all.php" target="_blank">MORE+</a>
                        </div>
                    </div>
                    <a href="./raw_goods_index.php?prod_id=164" target="_blank"><img src="./img/home_cat_women01.png" alt=""></a>
                    <div class="index_category_title">
                        <h2 class="current">WOMEN</h2>
                        <h2>MEN</h2>
                        <h2>SELECT</h2>
                    </div>
                </div>
                <div class="index_category_item">
                    <a href="./raw_goods_index.php?prod_id=174" target="_blank"><img src="./img/home_cat_women02.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=210" target="_blank"><img src="./img/home_cat_women03.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=155" target="_blank"><img src="./img/home_cat_women04.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=009" target="_blank"><img src="./img/home_cat_women05.png" alt=""></a>
                </div>
                <div class="rwd_category_more">
                    <a href="./product_list_all.php" target="_blank">MORE+</a>
                </div>
            </div>
        </div>

        <div class="slide">
            <div class="index_category">
                <div class="index_category_img">
                    <div class="index_category_img_content">
                        <h3>New Collection 2021</h3>
                        <h2>純麻鬆身上衣</h2>
                        <div class="category_more">
                            <a href="./product_list_all.php" target="_blank">MORE+</a>
                        </div>
                    </div>
                    <a href="./raw_goods_index.php?prod_id=255" target="_blank"><img src="./img/home_cat_men01.png" alt=""></a>
                    <div class="index_category_title">
                        <h2>WOMEN</h2>
                        <h2 class="current">MEN</h2>
                        <h2>SELECT</h2>
                    </div>
                </div>
                <div class="index_category_item">
                    <a href="./raw_goods_index.php?prod_id=260" target="_blank"><img src="./img/home_cat_men02.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=264" target="_blank"><img src="./img/home_cat_men03.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=071" target="_blank"><img src="./img/home_cat_men04.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=053" target="_blank"><img src="./img/home_cat_men05.png" alt=""></a>
                </div>
                <div class="rwd_category_more">
                    <a href="./product_list_all.php" target="_blank">MORE+</a>
                </div>
            </div>
        </div>

        <div class="slide">
            <div class="index_category">
                <div class="index_category_img">
                    <div class="index_category_img_content">
                        <h3>New Collection 2021</h3>
                        <h2>小立領針織上衣</h2>
                        <div class="category_more">
                            <a href="./product_list_all.php" target="_blank">MORE+</a>
                        </div>
                    </div>
                    <a href="./raw_goods_index.php?prod_id=109" target="_blank"><img src="./img/home_cat_select01.png" alt=""></a>
                    <div class="index_category_title">
                        <h2>WOMEN</h2>
                        <h2>MEN</h2>
                        <h2 class="current">SELECT</h2>
                    </div>
                </div>
                <div class="index_category_item">
                    <a href="./raw_goods_index.php?prod_id=129" target="_blank"><img src="./img/home_cat_select02.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=115" target="_blank"><img src="./img/home_cat_select03.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=122" target="_blank"><img src="./img/home_cat_select04.png" alt=""></a>
                    <a href="./raw_goods_index.php?prod_id=118" target="_blank"><img src="./img/home_cat_select05.png" alt=""></a>
                </div>
                <div class="rwd_category_more">
                    <a href="./product_list_all.php" target="_blank">MORE+</a>
                </div>
            </div>
        </div>
    </div>

    <!-- intro -->
    <div class="section" id="section5">
        <div class="index_intro">
            <div class="intro_card intro1">
                <div class="intro_content">
                    <h2>品質</h2>
                    <p>色票的參考</br>
                        讓您避免</br>
                        想要小麥色</br>
                        卻買到枯萎色的困擾</p>
                </div>
                <div class="intro_img intro_img1">
                    <img src="./img/home_intro01.png" alt="">
                </div>
            </div>
            <div class="intro_card intro2">
                <div class="intro_img intro_img2">
                    <img src="./img/home_intro02.jpg" alt="">
                </div>
                <div class="intro_content">
                    <h2>穿搭</h2>
                    <p>赤著提供穿搭上的建議</br>
                        和色彩搭配的建議</br>
                        如果你已經很會穿了</br>
                        你會變得更會穿</p>
                </div>
            </div>
            <div class="intro_card intro3">
                <div class="intro_content">
                    <h2>會員</h2>
                    <p>赤著會員</br>
                        有屬於自己的衣櫃</br>
                        藉由堆疊來累積</br>
                        屬於自己的大地色</p>
                </div>
                <div class="intro_img intro_img3">
                    <img src="./img/home_intro03.jpeg" alt="">
                </div>
            </div>
            <div class="intro_card intro4">
                <div class="intro_img intro_img4">
                    <img src="./img/home_intro04.jpeg" alt="">
                </div>
                <div class="intro_content">
                    <h2>選物</h2>
                    <p>除了自我品牌外</br>
                        我們也從眾多品牌中</br>
                        挑選了</br>
                        符合赤著品味的單品</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="section6">
        <div class="index_intro">
            <div class="intro_card intro3">
                <div class="intro_content">
                    <h2>會員</h2>
                    <p>赤著會員</br>
                        有屬於自己的衣櫃</br>
                        藉由堆疊來累積</br>
                        屬於自己的大地色</p>
                </div>
                <div class="intro_img intro_img3">
                    <img src="./img/home_intro03.jpeg" alt="">
                </div>
            </div>
            <div class="intro_card intro4">
                <div class="intro_img intro_img4">
                    <img src="./img/home_intro04.jpeg" alt="">
                </div>
                <div class="intro_content">
                    <h2>選物</h2>
                    <p>除了自我品牌外</br>
                        我們也從眾多品牌中</br>
                        挑選了</br>
                        符合赤著品味的單品</p>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <div class="section fp-auto-height" id="section7">
        <div class="intro">
            <footer class="footer">
                <div class="footercontainer headerandfooter">
                    <div class="footer_column">
                        <div class="footer_box">
                            <div class="footer_content_box">
                                <div class="footer_content_column">
                                    <div class="footer_title">
                                        <a href="./footer_aboutus.php">ABOUT US</a>
                                        <div class="footer_aboutus_img">
                                            <img src="./svg/plus.svg" alt="" id="footer-aboutus">
                                            <img src="./svg/minus.svg" alt="" id="footer-aboutus-close">
                                        </div>
                                    </div>
                                    <div class="footer_rwd_hide footer_aboutus">
                                        <a href="./footer_aboutus.php">
                                            <p class="footer_content">關於赤著</p>
                                        </a>
                                        <a href="./footer_aboutus.php">
                                            <p class="footer_content">隱私權保護</p>
                                        </a>
                                        <a href="./footer_aboutus.php">
                                            <p class="footer_content">服務條款</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer_box mt_normal footer_rwd_none">
                            <p class="footer_title">STORE</p>
                            <a href="#">
                                <p class="footer_content">106台北市大安區復興南路一段390號2樓</p>
                            </a>
                            <p class="footer_content">02 6631 6666</p>
                            <p class="footer_content">mon.~sun. 10:00-21:00</p>
                        </div>
                    </div>
                    <div class="footer_column">
                        <div class="footer_box">
                            <div class="footer_content_box">
                                <div class="footer_content_column">
                                    <div class="footer_title">
                                        <a href="./footer_info.php">INFO</a>
                                        <div class="footer_info_img">
                                            <img src="./svg/plus.svg" alt="" id="footer-info">
                                            <img src="./svg/minus.svg" alt="" id="footer-info-close">
                                        </div>
                                    </div>
                                    <div class="footer_rwd_hide footer_info">
                                        <a href="./footer_info.php">
                                            <p class="footer_content">赤著會員</p>
                                        </a>
                                        <a href="./footer_info.php">
                                            <p class="footer_content">購物流程</p>
                                        </a>
                                        <a href="./footer_info.php">
                                            <p class="footer_content">退換貨政策</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_column">
                        <div class="footer_box">

                            <div class="footer_content_box">
                                <div class="footer_content_column">
                                    <div class="footer_title">
                                        <a href="./footer_faq.php">FAQ</a>
                                        <img src="./svg/plus.svg" alt="" id="">
                                        <div class="footer_faq_img">
                                            <img src="./svg/plus.svg" alt="" id="footer-faq">
                                            <img src="./svg/minus.svg" alt="" id="footer-faq-close">
                                        </div>
                                    </div>
                                    <div class="footer_rwd_hide footer_faq">
                                        <a href="./footer_faq.php">
                                            <p class="footer_content">上傳穿搭</p>
                                        </a>
                                        <a href="./footer_faq.php">
                                            <p class="footer_content">修改訂單</p>
                                        </a>
                                        <a href="./footer_faq.php">
                                            <p class="footer_content">運送方式</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="footer_content_column">
                                    <div class="footer_rwd_hide footer_faq">
                                        <p class="footer_title">&nbsp</p>

                                        <a href="./footer_faq.php">
                                            <p class="footer_content">付款方式</p>
                                        </a>
                                        <a href="./footer_faq.php">
                                            <p class="footer_content">退換貨方式</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer_box mt_normal">
                            <p class="footer_title footer_rwd_none">CONTACT US</p>
                            <p class="footer_content">客服信箱 service@raw.com.tw</p>
                            <p class="footer_content">mon.~fri. 09:00-12:00 / 13:00-18:00</p>
                            <div class="footer_content footer_icons">
                                <a href="# "><img src="./svg/facebook.svg " alt=""></a>
                                <a href="# "><img src="./svg/instagram.svg " alt=""></a>
                                <a href="# "><img src="./svg/line.svg " alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer_column">
                        <div class="footer_box">
                            <p class="footer_title footer_rwd_none">NEWS LETTER</p>
                            <div class="footer_content_box">
                                <input type="text" class="footer_content" placeholder="輸入 E-MAIL 訂閱電子報">
                                <button class="footer_content">ENTER</button>
                            </div>
                        </div>
                        <div class="footer_box">
                            <p class="footer_content">COPYRIGHT@2021 ©RAW CO.LTD. ALL RIGHTS RESERVED.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/js-yin/fullpage.js"></script>
<script src="./js/js-yin/examples.js"></script>


<script type="text/javascript">
    var myFullpage = new fullpage('#fullpage', {
        // sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE']
    });


    // $(window).scroll(function () {
    //     var scrollTop = $(this).scrollTop();
    //     if (scrollTop > 1080) {
    //         $(".header_index").addClass("header_index_scroll");
    //     } else {
    //         $(".header_index_scroll").removeClass("header_index_scroll");
    //     }
    // });

    // $(window).scroll(function() {
    //     console.log('window scroll');
    //     var currentscrollTop = $(window).scrollTop();
    //     if (currentscrollTop >= 1000) {
    //         $(".header_index").addClass("header");
    //     } else {
    //         $(".header_index").removeClass("header");
    //     }
    // });

    // 下滑更改 header 底色
    $('body').on('transitionend', function() {
        $(".header_index").addClass("header");
        $(".nav a").addClass("navcolor");
        $(".logo img").attr('src', './svg/logo.svg');
        $('.header_icons').find('img').eq(0).attr('src', './svg/search.svg');
        $('.header_icons').find('img').eq(1).attr('src', './svg/account.svg');
        $('.header_icons').find('img').eq(2).attr('src', './svg/heart.svg');
        $('.header_icons').find('img').eq(3).attr('src', './svg/cart.svg');
    })

    // RWD 隱藏最後一個 section
    $(window).resize(function() {
        if ($(window).width() < 400) {
            $('#section6').remove();
        }
    })

    // 新品點顏色更換圖片
    $('.new_color1').click(function() {
        $('.new_item_img_1').attr('src', './img/home_new_1-1.jpg');
        $('.index_new_item').find('a').eq(0).attr('href', 'raw_goods_index.php?prod_id=122');
        $('.new_item_img_2').attr('src', './img/home_new_1-2.jpg');
        $('.index_new_item').find('a').eq(1).attr('href', 'raw_goods_index.php?prod_id=230');
        $('.new_item_img_3').attr('src', './img/home_new_1-3.jpg');
        $('.index_new_item').find('a').eq(2).attr('href', 'raw_goods_index.php?prod_id=257');
        $('.new_item_img_4').attr('src', './img/home_new_1-4.jpg');
        $('.index_new_item').find('a').eq(3).attr('href', 'raw_goods_index.php?prod_id=270');
    });

    $('.new_color2').click(function() {
        $('.new_item_img_1').attr('src', './img/home_new_2-1.jpg');
        $('.index_new_item').find('a').eq(0).attr('href', 'raw_goods_index.php?prod_id=035');
        $('.new_item_img_2').attr('src', './img/home_new_2-2.jpg');
        $('.index_new_item').find('a').eq(1).attr('href', 'raw_goods_index.php?prod_id=151');
        $('.new_item_img_3').attr('src', './img/home_new_2-3.jpg');
        $('.index_new_item').find('a').eq(2).attr('href', 'raw_goods_index.php?prod_id=155');
        $('.new_item_img_4').attr('src', './img/home_new_2-4.jpg');
        $('.index_new_item').find('a').eq(3).attr('href', 'raw_goods_index.php?prod_id=236');
    });

    $('.new_color3').click(function() {
        $('.new_item_img_1').attr('src', './img/home_new_3-1.jpg');
        $('.index_new_item').find('a').eq(0).attr('href', 'raw_goods_index.php?prod_id=023');
        $('.new_item_img_2').attr('src', './img/home_new_3-2.jpg');
        $('.index_new_item').find('a').eq(1).attr('href', 'raw_goods_index.php?prod_id=204');
        $('.new_item_img_3').attr('src', './img/home_new_3-3.jpg');
        $('.index_new_item').find('a').eq(2).attr('href', 'raw_goods_index.php?prod_id=210');
        $('.new_item_img_4').attr('src', './img/home_new_3-4.jpg');
        $('.index_new_item').find('a').eq(3).attr('href', 'raw_goods_index.php?prod_id=008');
    });

    $('.new_color4').click(function() {
        $('.new_item_img_1').attr('src', './img/home_new_4-1.jpg');
        $('.index_new_item').find('a').eq(0).attr('href', 'raw_goods_index.php?prod_id=220');
        $('.new_item_img_2').attr('src', './img/home_new_4-2.jpg');
        $('.index_new_item').find('a').eq(1).attr('href', 'raw_goods_index.php?prod_id=134');
        $('.new_item_img_3').attr('src', './img/home_new_4-3.jpg');
        $('.index_new_item').find('a').eq(2).attr('href', 'raw_goods_index.php?prod_id=264');
        $('.new_item_img_4').attr('src', './img/home_new_4-4.jpg');
        $('.index_new_item').find('a').eq(3).attr('href', 'raw_goods_index.php?prod_id=128');
    });


    // tpl footer 的 js
    $('.cart_at_right_card_container').on('click', '.delete', function(event) {

        console.log('i want to delete it')
        //避免元素的預設事件被觸發
        event.preventDefault();
        //取得選定刪除的購物車索引
        // let index = $(this).attr('data-index');

        //取得選定刪除的購物車索引
        let index = $(this).attr('data-index');
        let deleteItem = confirm('您確定刪除？');


        if (deleteItem) {

            $.get("delete.php", {
                index: index
            }, function(obj) {
                if (obj['success']) {
                    // location.reload();
                } else {
                    alert(`${obj['info']}`);
                }
                console.log(obj);
            }, 'json');


        } else {
            return false;

        }

        $(this).closest('.cart_at_right_card').remove();

        // $.get("delete.php", {
        //     index: index
        // }, function(obj) {
        //     if (obj['success']) {
        //         location.reload();
        //     } else {
        //         alert(`${obj['info']}`);
        //     }
        //     console.log(obj);
        // }, 'json');


    });
    $('#search_in_pc').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        $('.search_bar').addClass('show_search');
        $('.lightbox_background').addClass('open');
    });
    $('#open-cart-at-right').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        $('.cart_at_right_card_container').load("cart_at_right.php");
    });
    // 光箱
    $('.lightbox_background').click(function(event) {
        $('.add_new_card_lightbox_container').removeClass('open');
        $('.lightbox_background').removeClass('open');
        // 關側拉購物車
        $('.cart_at_right').removeClass('show-cart');
        $('.search_bar').removeClass('show_search');
    });
    $('#member_account_in_pc').mouseover(function(event) {
        $('#showup_box_member').addClass('open');
    });
    $('#member_wish_list_in_pc').mouseover(function(event) {
        $('#showup_box_member').removeClass('open');
    });
    $('#search_in_pc').mouseover(function(event) {
        $('#showup_box_member').removeClass('open');
    });
    //登出
    $('button#showup_box_member_logout').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        $.get('logout.php', function(obj) {
            if (obj['success']) {
                // alert('登出成功');
                $('#logout_len').addClass('open');
                setTimeout(function() {
                    location.href = 'home.php';
                }, 2000);
            }
            console.log(obj);
        }, 'json');
    });
    $('a#rwd_logout').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();

        $.get('logout.php', function(obj) {
            if (obj['success']) {
                // alert('登出成功');
                $('#logout_len').addClass('open');
                setTimeout(function() {
                    location.href = 'home.php';
                }, 2000);
            }
            console.log(obj);
        }, 'json');
    });
    $('#logout_len_btn').click(function(event) {
        $('#logout_len').removeClass('open');
    });
</script>


</body>

</html>