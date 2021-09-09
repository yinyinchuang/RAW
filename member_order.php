<?php require_once "db.inc.php"; ?>
<?php session_start() ?>

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
    <link rel="stylesheet" href="./css/css-p/order.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
            <div class="list" style="background-color: rgba(188, 170, 154, .25)">我的訂單</div>
        </a>
        <a href="./member_iamraw.php">
            <div class="list">我在赤著</div>
        </a>
        <a href="./member_upload.php">
            <div class="list">我的穿搭</div>
        </a>
        <!-- <a href="./member_search.php">
            <div class="list">我的搜尋</div>
        </a> -->
    </div>






    <!-- 主要資料區 -->


    <div>
        <div class="mainCorner wish_h1" style="flex-direction: column;">
            <div class="orderList" style="display: flex;border-bottom: 1px solid #BCAA9A">
                <p class="" style="margin-left: 30px;margin-right: 130px">訂單編號</p>
                <p style="margin-right: 130px">訂單日期</p>
                <p style="margin-right: 130px">訂單總額</p>
                <p style="margin-right: 130px">訂單狀態</p>
                <p></p>
            </div>

            <?php
            //訂單數量
            $count_orders = 0;

            $sql = "SELECT `order_id`, `created_at`, `total_final`,`email`
                    FROM `orders` 
                    WHERE `email` = '{$_SESSION['email']}' ORDER BY `created_at` DESC, `order_id` DESC ";


            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() > 0) {
                //記錄訂單數量
                $count_orders = $stmt->rowCount();

                //取得訂單資料
                foreach ($stmt->fetchAll() as $obj1) {
            ?>

                    <div class="orderBox" style="display: flex;flex-direction: column;">
                        <div class="orderBoxInside" style="display: flex; flex-direction: row;">
                            <p style=" margin-left: 30px;margin-right: 140px"><?php
                                                                                $sourceNumber = "0";
                                                                                $newNumber = substr(strval($sourceNumber + 10000000), 1, 7);
                                                                                echo "$newNumber";
                                                                                ?><?= $obj1['order_id'] ?></p>
                            <p style="margin-right: 150px"><?= $obj1['created_at'] ?></p>
                            <div style="text-align:end;width: 50px;margin-right: 170px"><?= number_format($obj1['total_final']) ?></div>
                            <p style="margin-right: 120px">備貨中</p>
                            <p class="openDetail">
                                <img class="p_plus" id="p_plus" style="width: 60%;margin-top: 8px;cursor: pointer;" src="./svg/plus.svg" alt="">

                            </p>
                        </div>
                        <!-- 收合處-->

                        <div style="display: none;" class="CollapseOrder">
                            <div class="orderDetailList" style="display: flex; flex-direction: row;">
                                <p style="margin-left: 170px;margin-right: 130px">商品資訊</p>
                                <p style="margin-right: 128px">價格</p>
                                <p style="margin-right: 170px">數量</p>
                                <p>小計</p>
                            </div>



                            <?php
                            //訂單數量
                            $count_orders = 0;

                            $sql1 = "SELECT `orders`.`order_id`, `orders`.`created_at`, `total`, `order_status`, `shipping`, `recipient_name`, `phone`, `email`, `qty`, `color_name`, `total_final`, products.prod_name,`size`,`color_code`,`total_price`,`prod_1pic`,`products`.`prod_price`,`pay`,`shipping`,`order_status`,`recipient_address`,`prod_foto` FROM `orders_detail` INNER JOIN `orders` ON `orders`.`order_id`=`orders_detail`.`order_id` inner join products on products.prod_id = orders_detail.prod_id where `orders`.`order_id` = '{$obj1['order_id']}'";


                            $stmt = $pdo->query($sql1);

                            if ($stmt->rowCount() > 0) {
                                //記錄訂單數量
                                $count_orders = $stmt->rowCount();

                                //取得訂單資料
                                foreach ($stmt->fetchAll() as $obj) {
                            ?>

                                    <div class="orderDetailBox" style="display: flex; flex-direction: row;justify-content:start;">
                                        <div class="">
                                            <img style="width: 70px;" src="img/RAW_images/<?= $obj['prod_foto'] ?>" alt="">
                                        </div>
                                        <div class="" style="display: flex; flex-direction: column;">
                                            <div class="" style="width: 150px;margin-left: 30px;height: 20px;margin-bottom: 15px;margin-top: 15px;"><?= $obj['prod_name'] ?></div>
                                            <div class="" style="display: flex; flex-direction:row; align-items: center;margin-left: 30px;">
                                                <div class="smallColorBall" style="background-color:<?= $obj['color_code'] ?> ;border:1px solid #BCAA9A"></div>
                                                <div class=""> &emsp;<?= $obj['size'] ?></div>
                                            </div>
                                        </div>
                                        <div class="" style="width:80px;margin-left: 35px;margin-top: 30px;text-align:end"><?= number_format($obj['prod_price']) ?></div>
                                        <div class="" style="width:80px;margin-left: 70px;margin-top: 30px;text-align:end"><?= $obj['qty'] ?></div>
                                        <div class="" style="width:80px;margin-left: 135px;margin-top: 30px;text-align:end"><?= number_format($obj['prod_price'] * $obj['qty']) ?></div>
                                    </div>


                            <?php
                                }
                            }

                            ?>


                            <div class="a" style="display: flex;justify-content:flex-end;">
                                <div style="margin-right: 140px;">
                                    <p>總金額</p>
                                    <p>運費</p>
                                    <p>優惠券</p>
                                    <p>結帳金額</p>
                                </div>
                                <div class="" style="text-align: end;margin-right: 115px;margin-bottom: 30px;">
                                    <p>NT. <?= number_format($obj['total']) ?></p>
                                    <p>80</p>
                                    <p>-100</p>
                                    <p>NT. <?= number_format($obj['total_final']) ?></p>
                                </div>
                            </div>

                            <div class="b" style="display: flex;border-top: 1px solid #BCAA9A;">
                                <div class="" style="display: flex;flex-direction: column;margin-left: 30px;margin-top: 30px;">
                                    <div class="orderDetailItem">訂單編號&emsp; <?php
                                                                            $sourceNumber = "0";
                                                                            $newNumber = substr(strval($sourceNumber + 10000000), 1, 7);
                                                                            echo "$newNumber";
                                                                            ?><?= $obj['order_id'] ?></div>
                                    <div class="orderDetailItem">訂單日期&emsp; <?= $obj['created_at'] ?></div>
                                    <div class="orderDetailItem">訂單狀態&emsp; <?= $obj['order_status'] ?></div>
                                    <div class="orderDetailItem">付款方式&emsp; <?= $obj['pay'] ?></div>
                                    <div class="orderDetailItem">付款狀態&emsp; 已付款</div>
                                </div>
                                <div class="orderDetailMember" style="display: flex;flex-direction: column;margin-left: 320px;margin-top: 30px;">
                                    <div class="orderDetailItem">收件姓名&emsp; <?= $obj['recipient_name'] ?></div>
                                    <div class="orderDetailItem">連絡電話&emsp; <?= $obj['phone'] ?></div>
                                    <div class="orderDetailItem">電子信箱&emsp; <?= $obj['email'] ?></div>
                                    <div class="orderDetailItem">送貨方式&emsp; <?= $obj['shipping'] ?> &emsp;<button class="btnShipping">物流追蹤</button>
                                    </div>
                                    <div class="orderDetailItem">貨件編號&emsp; 9066658888</div>
                                    <div class="orderDetailItem">送貨地址&emsp; <?= $obj['recipient_address'] ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
            <?php
                }
            }

            ?>

        </div>
    </div>
</div>


<!-- RWD -->
<!-- 主要資料區 -->
<div class="mainCornerRWD wish_h1" style="flex-direction: column;">

    <div class="pc_dn_select">
        <select id="myselect" class="container select_title_box">

            <option value="member_order">我的訂單</option>
            <option value="member_iamraw">我在赤著</option>
            <option value="member_account">我的資料</option>
            <option value="member_upload">我的穿搭</option>

        </select>
    </div>

    <div class="orderListRWD" style="display: flex;margin-top: 15px;">
        <p class="" style="margin-left: 20px;margin-right: 20px;">訂單編號</p>
        <p style="margin-right: 20px">訂單日期</p>
        <p style="margin-right: 20px">訂單總額</p>
        <p style="margin-right: 20px">訂單狀態</p>
        <p></p>
    </div>
    <?php
    //訂單數量
    $count_orders = 0;

    $sql = "SELECT `order_id`, `created_at`, `total_final`
            FROM `orders` 
            WHERE `email` = '{$_SESSION['email']}' ORDER BY `created_at` DESC, `order_id` DESC ";


    $stmt = $pdo->query($sql);

    if ($stmt->rowCount() > 0) {
        //記錄訂單數量
        $count_orders = $stmt->rowCount();

        //取得訂單資料
        foreach ($stmt->fetchAll() as $obj1) {
    ?>





            <div>
                <div class="orderBoxRWD" style="display: flex;flex-direction: column;border:1px solid #BCAA9A;margin: 15px;">

                    <div class="orderBoxInside" style="display: flex; flex-direction: row;">
                        <p class="" style="margin-left: 15px;margin-right: 25px"><?php
                                                                                    $sourceNumber = "0";
                                                                                    $newNumber = substr(strval($sourceNumber + 10000000), 1, 7);
                                                                                    echo "$newNumber";
                                                                                    ?><?= $obj1['order_id'] ?></p>
                        </p>
                        <p style="margin-right: 35px"><?= $obj1['created_at'] ?></p>
                        <p style="margin-right: 40px"><?= number_format($obj1['total_final']) ?></p>
                        <p style="margin-right: 15px">備貨中</p>
                        <p class="openDetailRWD"><img class="p_plus" style="width: 50%;margin-top: 8px;cursor: pointer;margin-left:8px" src="./svg/plus.svg" alt=""></p>
                    </div>
                    <!-- 收合處-->
                    <!-- RWD收合處 -->






                    <div class="CollapseOrderRWD" style="display: none;">


                        <?php
                        //訂單數量
                        $count_orders = 0;

                        $sql1 = "SELECT `orders`.`order_id`, `orders`.`created_at`, `total`, `order_status`, `shipping`, `recipient_name`, `phone`, `email`, `qty`, `color_name`, `total_final`, products.prod_name,`size`,`color_code`,`total_price`,`prod_1pic`,`products`.`prod_price`,`pay`,`shipping`,`order_status`,`recipient_address`,`prod_foto` FROM `orders_detail` INNER JOIN `orders` ON `orders`.`order_id`=`orders_detail`.`order_id` inner join products on products.prod_id = orders_detail.prod_id where `orders`.`order_id` =" . $obj1['order_id'];


                        $stmt = $pdo->query($sql1);

                        if ($stmt->rowCount() > 0) {
                            //記錄訂單數量
                            $count_orders = $stmt->rowCount();

                            //取得訂單資料
                            foreach ($stmt->fetchAll() as $obj) {
                        ?>


                                <div class="orderDetailBoxRWD" style="display: flex; flex-direction: row;justify-content:start;">
                                    <div class="" style="margin-left: 15px;margin-top: 15px;">
                                        <img style="width: 163px;height: 220px;" src="img/RAW_images/<?= $obj['prod_foto'] ?>" alt="">
                                    </div>
                                    <div class="" style="display: flex;flex-direction: column;">
                                        <div class="" style="margin-left: 30px;margin-top: 15px;">
                                            <?= $obj['prod_name'] ?></div>
                                        <div class="" style="margin-left: 30px;margin-top: 8px;">NT. <?= number_format($obj['prod_price']) ?></div>
                                        <div class="" style="display: flex; flex-direction:row; align-items: center;margin-left: 30px;margin-top: 8px;">
                                            顏色
                                            <div class="smallColorBall" style="margin-left: 8px;border:1px solid #BCAA9A;background-color:<?= $obj['color_code'] ?>"></div>
                                            <div class="" style="margin-left: 8px;"><?= $obj['color_name'] ?></div>
                                        </div>

                                        <div class="" style="margin-left: 30px;margin-top: 8px;">尺寸&emsp;<?= $obj['size'] ?></div>
                                        <div class="" style="margin-left: 30px;margin-top: 8px;">數量&emsp;<?= $obj['qty'] ?></div>
                                        <div class="" style="margin-left: 30px;margin-top: 8px;">小計&emsp;NT. <?= number_format($obj['prod_price'] * $obj['qty']) ?></div>
                                    </div>
                                </div>
                        <?php
                            }
                        }

                        ?>

                        <div class="aRWD" style="display: flex;margin-top: 30px;margin-left: 15px;">
                            <div style="margin-right: 190px;">
                                <p>總金額</p>
                                <p>運費</p>
                                <p>優惠券</p>
                                <p style="font-size: 16px;">結帳金額</p>
                            </div>
                            <div class="" style="text-align: end;margin-bottom: 30px;">
                                <p>NT. <?= number_format($obj['total']) ?></p>
                                <p>80</p>
                                <p>-100</p>
                                <p style="font-size: 16px;">NT. <?= number_format($obj['total_final']) ?></p>
                            </div>
                        </div>

                        <div class=" bRWD">
                            <hr>
                            <div class="" style="display: flex;flex-direction: column;margin-left: 15px;margin-top: 30px;">
                                <div class="orderDetailItemRWD">訂單編號&emsp; <?php
                                                                            $sourceNumber = "0";
                                                                            $newNumber = substr(strval($sourceNumber + 10000000), 1, 7);
                                                                            echo "$newNumber";
                                                                            ?><?= $obj['order_id'] ?></div>
                                <div class="orderDetailItemRWD">訂單日期&emsp; <?= $obj['created_at'] ?></div>
                                <div class="orderDetailItemRWD">訂單狀態&emsp; <?= $obj['order_status'] ?></div>
                                <div class="orderDetailItemRWD">付款方式&emsp; <?= $obj['pay'] ?></div>
                                <div class="orderDetailItemRWD">付款狀態&emsp; 已付款</div>
                            </div>
                            <div class="orderDetailMemberRWD" style="display: flex;flex-direction: column;margin-left: 15px;margin-top: 25px;">
                                <div class="orderDetailItemRWD">收件姓名&emsp; <?= $obj['recipient_name'] ?></div>
                                <div class="orderDetailItemRWD">連絡電話&emsp; <?= $obj['phone'] ?></div>
                                <div class="orderDetailItemRWD">電子信箱&emsp; <?= $obj['email'] ?></div>
                                <div style="display: flex;align-items: center;">
                                    <div class="orderDetailItemRWD"><?= $obj['shipping'] ?>&emsp; 宅配 &emsp;</div>
                                    <button class="btnShippingRWD" style="margin-left: 125px;">物流追蹤</button>

                                </div>
                                <div class="orderDetailItemRWD">貨件編號&emsp; 9066658888</div>
                                <div class="orderDetailItemRWD">送貨地址&emsp; <?= $obj['recipient_address'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    }

    ?>

</div>

<script>
    $(".openDetail").click(function() {
        $(this).parent().next().toggle();
        console.log($(this).parent().next().is(":hidden"));
        if ($(this).parent().next().is(":hidden")) {
            $(this).children().attr("src", "./svg/plus.svg"); //如果元素為隱藏,則將它顯現
        } else {
            $(this).children().attr("src", "./svg/minus.svg").css("height:1px"); //如果元素為顯現,則將其隱藏
        }
    })

    $(".openDetailRWD").click(function() {
        $(this).parent().next().toggle();
        console.log($(this).parent().next().is(":hidden"));
        if ($(this).parent().next().is(":hidden")) {
            $(this).children().attr("src", "./svg/plus.svg"); //如果元素為隱藏,則將它顯現
        } else {
            $(this).children().attr("src", "./svg/minus.svg").css("height:1px"); //如果元素為顯現,則將其隱藏
        }
    })
</script>

<?php require_once 'tpl/foot.inc.php' ?>


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

<!-- 加減號更換 -->
<script>
    // $("img#p_plus").click(function() {
    //     $(this).parent().next().hide();
    //     $("img#p_close").parent().next().show();
    // })
</script>



</body>

</html>