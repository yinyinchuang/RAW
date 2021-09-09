<!-- footer -->
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
<script>
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
    $('#open-cart-at-right-rwd').click(function(event) {
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
    $('#open-cart-at-right').mouseover(function(event) {
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