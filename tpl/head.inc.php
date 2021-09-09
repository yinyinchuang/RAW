<?php require_once 'db.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>

<body>

    <div class="lightbox_background"></div>
    <!-- header -->
    <header class="header">
        <div class="headercontainer headerandfooter">
            <div class="hamburger">
                <div class="hamburger_box" id="nav-toggle">
                    <!-- <img src="./svg/hamburger.svg" alt=""> -->
                    <!-- <div class="hamburger_line"></div> -->
                </div>
            </div>
            <div class="logo">
                <a href="./home.php"><img src="./svg/logo.svg" alt=""></a>

            </div>
            <nav class="nav">
                <a href="./product_list_all.php">ALL</a>
                <a href="./product_list_new.php">NEW</a>
                <a href="./features_fashion.php">FEATURES</a>
            </nav>
            <div class="header_icons">
                <a href="#" id="search_in_pc"><img src="./svg/search.svg" alt=""></a>
                <a href="./member_account.php" id="member_account_in_pc"><img src="./svg/account.svg" alt=""></a>
                <a href="./wish_list_goods.php" id="member_wish_list_in_pc"><img src="./svg/heart.svg" alt=""></a>
                <a href="#"></a>
                <div id="open-cart-at-right"><img src="./svg/cart.svg" alt=""></div>
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
    <div class="fake_header"></div>
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


        <div class="showup_box_300x150" id="forget_password_send_mail_len">
            <p>已發送驗證信！</p>
            <button class="showup_box_button_300x150" id="forget_password_send_mail_len_btn">確定</button>
        </div>

        <div class="showup_box_300x150">
            <p>已加入購物車</p>
            <button class="showup_box_button_300x150">確定</button>
        </div>

        <div class="showup_box_300x150" id="logout_len">
            <p>登出成功</p>
            <button class="showup_box_button_300x150" id="logout_len_btn">確定</button>
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

        <div class="showup_box_300x150" id="infola">
            <p>請選擇商品顏色</p>
            <button class="showup_box_button_300x150" id="infolabtn">確定</button>
        </div>

        <div class="showup_box_300x150" id="infosizela">
            <p>請選擇商品尺寸</p>
            <button class="showup_box_button_300x150" id="infosizelabtn">確定</button>
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

        <div class="showup_box_300x150" id="cantblank">
            <p>請選擇運送方式</p>
            <button class="showup_box_button_300x150" id="cantblankbtn">確定</button>
        </div>

        <div class="showup_box_300x150" id="addcartframe">
            <p>已加入購物車</p>
            <button class="showup_box_button_300x150" id="addcartframebtn">確定</button>
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