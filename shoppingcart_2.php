<?php
require_once 'db.inc.php'
?>
<?php
session_start()
?>

<?php
//如果這個階段沒有購物車，就將頁面轉到商品確認頁
if (!isset($_SESSION['email']) || !isset($_SESSION['cart'])) {
    header("Location: product_list_all.php");
    exit();
}

//如果購物車與商品索引與數量同時存在，則修改指定索引的商品數量
if (isset($_POST['index']) && isset($_POST['qty'])) {
    foreach ($_POST['index'] as $index => $value) {
        $_SESSION['cart'][$index]['prod_qty'] = $_POST['qty'][$index];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart step2</title>


    <link rel="stylesheet" href="./css/main.css">
    <script src="https://kit.fontawesome.com/f56e5ae7a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/css-emily/main-emily.css">
    <link rel="stylesheet" href="./css/css-emily/shoppingcart_try.css">

</head>
<?php require_once 'tpl/head.inc.php' ?>

<?php

$sqlinfo = "SELECT *
FROM `members`             
WHERE `email` = '{$_SESSION['email']}'";
$stmt = $pdo->query($sqlinfo);
if ($stmt->rowCount() > 0) {
    $objinfo = $stmt->fetch();
    // echo ($objinfo['email']);

?>


    <input id="info-email" type="text" style="display:none" value="<?= $objinfo['email'] ?>">


    <input id="info-name" type="text" style="display:none" value="<?= $objinfo['name'] ?>">


    <input id="info-address" type="text" style="display:none" value="<?= $objinfo['address'] ?>">


    <input id="info-phone" type="text" style="display:none" value="<?= $objinfo['phone'] ?>">


<?php
}

?>

<!-- shopping cart step by step -->

<div class="step_container">
    <div class="stepimgsize">
        <img src="./svg/shopstep2.svg" alt="">
    </div>
</div>

<!-- 運送及付款區 -->

<!-- 運送方式 -->

<div class="container">


    <form name="Form" method="post" action="shoppingcart_3.php">
        <div class="step2title">運送方式</div>
        <div class="transportway">
            <div class="collayout">

                <input id="radio-1" class="radio-custom" name="shipping" type="radio" value="超商取貨">
                <label for="radio-1" class="radio-custom-label">
                    <p>超商取貨</p>
                </label>

            </div>
            <div class="collayout_bt">

                <input id="radio-2" class="radio-custom" name="shipping" type="radio" value="宅配到府">
                <label for="radio-2" class="radio-custom-label">
                    <p>宅配到府（運費80元）</p>
                </label>

            </div>
            <div class="collayout_bt">

                <input id="radio-3" class="radio-custom" name="shipping" value="赤著門市取貨（免運費）" type="radio">
                <label for="radio-3" class="radio-custom-label">
                    <p>赤著門市取貨（免運費）</p>
                </label>

            </div>
        </div>

        <!-- 超商門市 -->
        <div id="7-11shop" class="transportway displaynone">
            <div class="step2title">超商門市</div>

            <div class="collayout">

                <div href="" class="emilyrow">

                    <div class="select-style">
                        <select>
                            <option value="" selected>點我選擇門市 ＋</option>
                            <option value="">台北市</option>
                            <option value="">基隆市</option>
                            <option value="">新北市</option>
                            <option value="">連江縣</option>
                            <option value="">宜蘭縣</option>
                            <option value="">新竹市</option>
                            <option value="">桃園市</option>
                            <option value="">苗栗縣</option>
                            <option value="">台中市</option>
                            <option value="">彰化縣</option>
                            <option value="">南投縣</option>
                            <option value="">嘉義市</option>
                            <option value="">嘉義縣</option>
                            <option value="">雲林縣</option>
                            <option value="">台南市</option>
                            <option value="">高雄市</option>
                            <option value="">澎湖縣</option>
                            <option value="">金門縣</option>
                            <option value="">屏東縣</option>
                            <option value="">台東縣</option>
                            <option value="">花蓮縣</option>
                        </select>
                    </div>

                    <!-- <select name="city-form" id="">
                        <option value="" selected>點我選擇門市<img src="./svg/plus.svg" alt=""
                                style="width: 16px;height: 16px;" class="m_16-1"></option>
                        <option value="">大安門市</option>
                        <option value="">大安門市</option>
                        <option value="">大安門市</option>
                        <option value="">大安門市</option>
                        <option value="">大安門市</option>
                        <option value="">大安門市</option>
                        <option value="">大安門市</option>
                        <option value="">大安門市</option>
                    </select> -->


                </div>

                <input id="radio-711" class="radio-custom" name="711_group" type="radio">
                <label for="radio-711" class="radio-custom-label">
                    <p>常用超商門市</p>
                </label>


            </div>

        </div>

        <!-- 訂購人資訊 -->
        <div id="buymen" class="transportway displaynone">
            <div class="step2title">訂購人資訊</div>

            <div class="collayout">
                <input id="radio-member" class="radio-custom" type="radio">

                <label for="radio-member" class="radio-custom-label">
                    <p>同會員資訊</p>
                </label>

            </div>
            <div class="collayout_L">
                <div class="consumer">訂購人</div>
                <input id="p1" class="emily_input" type="text" name="name">

            </div>
            <div class="collayout_L">
                <div class="consumer">聯絡電話</div>
                <input id="t1" class="emily_input" ype="text" name="phone">

            </div>
            <div class="collayout_L">
                <div class="consumer">Email</div>
                <input id="e1" class="emily_input" type="text" name="e_mail">

            </div>
        </div>

        <!-- 7-11收件人資訊 -->
        <div id="takemen" class="transportway displaynone">
            <div class="step2title">收件人資訊</div>

            <div class="collayout">

                <input id="radio-member-receiver" class="radio-custom" type="radio">
                <label for="radio-member-receiver" class="radio-custom-label">
                    <p>同會員資訊</p>
                </label>

            </div>
            <div class="collayout_L">
                <div class="consumer">收件人</div>
                <input id="p2" class="emily_input" type="text">

            </div>
            <div class="collayout_L">
                <div class="consumer">聯絡電話</div>
                <input id="t2" class="emily_input" type="text">

            </div>
            <div class="collayout_L">
                <div class="consumer">Email</div>
                <input id="e2" class="emily_input" type="text">

            </div>
        </div>


        <!-- 宅配收件人資訊 -->
        <div id="homemen" class="transportway displaynone">
            <div class="step2title">收件人資訊</div>

            <div class="collayout">

                <input id="radio-member-receiver3" class="radio-custom" type="radio">
                <label for="radio-member-receiver3" class="radio-custom-label">
                    <p>同會員資訊</p>
                </label>

            </div>
            <div class="collayout_L">
                <div class="consumer">收件人</div>
                <input id="p3" class="emily_input" type="text" name="recipient_name">

            </div>
            <div class="collayout_L">
                <div class="consumer">聯絡電話</div>
                <input id="t3" class="emily_input" type="text" name="recipient_phone">

            </div>

            <!-- 地址的部分怎麼取值？？？ 先用d-none檔一下-->
            <div class="homedeliver_address">
                <div class="hometile">收件人地址</div>
                <div class="homecontent">
                    <div class="homecontent-top">
                        <div class="my-selector-c">
                            <div class="select_wrap select_padding">
                                <select class="county" name="recipient_name"></select>
                            </div>

                            <div>
                                <input type="text" class="zipcode" readonly>
                            </div>

                            <div class="select_wrap select_padding1 select_border_none">

                                <select class="district"></select>

                            </div>

                        </div>
                    </div>

                    <input id="address" class="emily_input" type="text" name="recipient_address">

                </div>

            </div>


        </div>

        <!-- 優惠卷 -->
        <div id="couponway" class="transportway displaynone">
            <div class="step2title">優惠券</div>

            <div class="collayout">
                <input id="radio-coupon" class="radio-custom" type="radio">
                <label for="radio-coupon" class="radio-custom-label">
                    <p>使用優惠券</p>
                </label>
            </div>
            <div class="displaynone coupon_detail">
                <div class="collayout_L">
                    <div class="consumer">免運券</div>

                    <input id="radio-coupon-pay-1" class="radio-custom  left" name="coupon_code" type="radio" value="60">
                    <label for="radio-coupon-pay-1" class="radio-custom-label m_16" value="60">
                        <p>超商免運券</p>
                    </label>


                </div>
                <div class=" collayout_L">
                    <div class="consumer">折抵券</div>
                    <input id="radio-coupon-pay-2" class="radio-custom left" name="coupon_code" type="radio" value="100元折抵券">
                    <label for="radio-coupon-pay-2" class="radio-custom-label m_16">
                        <p>100元折抵券</p>
                    </label>
                </div>
            </div>

        </div>


        <!-- 選擇付款方式 -->
        <div id="7-11payway" class="displaynone">
            <div class="step2title">選擇付款方式</div>

            <div class="collayout">

                <input id="radio-711pay" class="radio-custom" name="711pay_group" type="radio">
                <label for="radio-711pay" class="radio-custom-label">
                    <p>超商取貨付款</p>
                </label>

            </div>
        </div>


        <div id="yourpayway" class="transportway displaynone">
            <div class="step2title">選擇付款方式</div>

            <div class="collayout">

                <input id="radio-credit" class="radio-custom" name="pay" type="radio" value="信用卡">
                <label for="radio-credit" class="radio-custom-label">
                    <p>信用卡</p>
                </label>

            </div>
            <div class="collayout_bt">

                <input id="radio-atm" class="radio-custom" name="pay" type="radio" value="ATM轉帳">
                <label for="radio-atm" class="radio-custom-label">
                    <p>ATM轉帳</p>
                </label>

            </div>
        </div>



        <!-- 信用卡資訊 -->
        <div id="creditcardinfo" class="displaynone">
            <div class="credit-outer">

                <div class="credit-outer1">
                    <div class="step2title-1">信用卡資訊</div>


                    <div class="collayout_L" style="border-top: 1px solid #BCAA9A;">
                        <div class="consumer1">持卡人姓名</div>
                        <input name="card_holder" style="border: none;" type="text" id="card-holder" value="" />

                    </div>

                    <div class="collayout_L">
                        <div class="consumer1">信用卡號</div>
                        <!-- <input class="emily_input" type="text"> -->
                        <div class="credit-between">
                            <input type="num" id="card-number" class="input-cart-number" maxlength="4" name="creditcard1" value="">
                            <input type="num" id="card-number-1" class="input-cart-number" maxlength="4" name="creditcard2" value="">
                            <input type="num" id="card-number-2" class="input-cart-number" maxlength="4" name="creditcard3" value="">
                            <input type="num" id="card-number-3" class="input-cart-number" maxlength="4" name="creditcard4" value="">
                        </div>
                    </div>

                    <div class="collayout_L">
                        <div class="consumer1">信用卡期限</div>
                        <div class="credit-flex-start">
                            <div class="select">
                                <select id="card-expiration-month" style="border: none;width: 60px;padding: 5px;background-color: transparent" name="expire1">
                                    <option>月份</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>
                            </div>
                            <div class="select">
                                <select id="card-expiration-year" style="border: none;width: 60px;padding: 5px;background-color: transparent;" name="expire2">>
                                    <option>年份</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="collayout_L">
                        <div class="consumer1">信用卡檢查碼</div>
                        <input type="text" id="card-ccv" maxlength="3" name="card_ccv" />

                    </div>
                </div>

                <!-- 信用卡翻來翻去 -->

                <div class="credit-outer1 credit-flex d-none">


                    <div class="credit-card-box">
                        <div class="flip">
                            <div class="front">
                                <div class="chip"></div>
                                <div class="logo">
                                    <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
                                        <g>
                                            <g>
                                                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                                       c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                                       c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                                       M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                                       c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                                       c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                                       l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                                       C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                                       C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                                       c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                                       h-3.888L19.153,16.8z" />
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="number"></div>
                                <div class="card-holder">
                                    <label>Card holder</label>
                                    <div></div>
                                </div>
                                <div class="card-expiration-date">
                                    <label>Expires</label>
                                    <div></div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="strip"></div>
                                <div class="logo">
                                    <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
                                        <g>
                                            <g>
                                                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                                       c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                                       c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                                       M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                                       c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                                       c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                                       l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                                       C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                                       C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                                       c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                                       h-3.888L19.153,16.8z" />
                                            </g>
                                        </g>
                                    </svg>

                                </div>
                                <div class="ccv">
                                    <label>CCV</label>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>


            </div>

        </div>

        <?php
        //購物車商品數量、小計、總計
        $count = 0;
        $total = 0;

        //判斷購物車是否存在，若存在，同時確認裡頭的商品數量
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            //更新商品數量
            $count = count($_SESSION['cart']);

            foreach ($_SESSION['cart'] as $key => $obj) {
                //計算小計
                $total += $obj['prod_price'] * $obj['prod_qty'];

        ?>
                <input style="display:none" type="text" name="total" value="<?= $total ?>">
        <?php
            }
        }
        ?>


        <div class="checkoutcontainer" style="justify-content:flex-end;">

            <div class="shopcart_btnarea">
                <a href="./shoppingcart_cart.php" class="to_step_1">
                    上一步
                </a>
                <button type="submit" id="nextto3" href="./shoppingcart_3.php" class="to_step_3">
                    下一步
                </button>
            </div>
        </div>


    </form>


</div>











</div>





<?php require_once 'tpl/foot.inc.php' ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/js-emily/shoppingcart.js"></script>


<script src="./js/main.js"></script>

<script src="./js/js-emily/tw-city-selector.js"></script>
<script>
    // new TwCitySelector();

    // new TwCitySelector({
    //     el: ".my-selector-c",
    //     elCounty: ".county", // 在 el 裡查找 dom
    //     elDistrict: ".district", // 在 el 裡查找 dom
    //     elZipcode: ".zipcode" // 在 el 裡查找 dom
    // });



    /*
              1. 取消与当前控件name 相同的所有控件的选中状态
              2. 选中当前控件
              3. 如果当前控件在点击前是选中状态，则点击后取消其选中状态
          */
    $("input:radio").click(function() {

        $(this).attr('checked', true)
        var domName = $(this).attr('name'); //获取当前单选框控件name 属性值 
        var checkedState = $(this).attr('checked'); //记录当前选中状态
        $("input:radio[name='" + domName + "']").attr('checked', false); //1.

        $(this).attr('checked', true); //2.
        if (checkedState == 'checked') {
            $(this).attr('checked', false); //3.
        }

    });






    // 選了超商取貨
    $(document).ready(function() {

        $("#radio-1").click(function() {
            $("#7-11shop").show();
        });

        $("#radio-1").click(function() {
            $("#buymen").show();
        });

        $("#radio-1").click(function() {
            $("#takemen").show();
        });


        $("#radio-1").click(function() {
            $("#couponway").show();
        });

        $("#radio-1").click(function() {
            $("#yourpayway").show();
        });

        // 選了來店取貨


        $("#radio-3").click(function() {
            $("#buymen").show();
        });

        $("#radio-3").click(function() {
            $("#takemen").show();
        });


        $("#radio-3").click(function() {
            $("#couponway").show();
        });

        $("#radio-3").click(function() {
            $("#yourpayway").show();
        });
    });


    $(document).ready(function() {

        $("#radio-credit").click(function() {
            $("#creditcardinfo").show();
        });

    });


    $(document).ready(function() {

        $("#radio-atm").click(function() {
            $("#creditcardinfo").hide();
        });

    });
    // 選了宅配
    $(document).ready(function() {
        $("#radio-2").click(function() {
            $("#buymen").show();
        });

        $("#radio-2").click(function() {
            $("#7-11shop").hide();
        });

        $("#radio-2").click(function() {
            $("#takemen").hide();
        });

        $("#radio-2").click(function() {
            $("#homemen").show();
        });

        $("#radio-2").click(function() {
            $("#couponway").show();
        });

        $("#radio-2").click(function() {
            $("#yourpayway").show();
        });

    });

    //優惠券

    $(document).ready(function() {
        $("#radio-coupon").click(function() {

            if ($('#radio-coupon').prop('checked', true)) {
                $(".coupon_detail").show();

            } else {
                $(".coupon_detail").hide();
            }

        });
    });


    //auto input

    // $('#radio-member').click(function() {
    //     console.log('hi')
    //     $('#p1').val('小童童');
    //     $('#t1').val('0999888666');
    //     $('#e1').val('helloworld@hotmail.com');
    // })

    // $('#radio-member-receiver').click(function() {
    //     console.log('yo')
    //     $('#p2').val('小童童');
    //     $('#t2').val('0999888666');
    //     $('#e2').val('helloworld@hotmail.com');

    // });

    $('#radio-member-receiver3').click(function() {
        // console.log('ho')
        // $('#p3').val('小童童');
        // $('#t3').val('0999888666');
        // $('#e3').val('helloworld@hotmail.com');
        // $('#address').val('復興南路一段390號2樓');
        // $(".county").find('option[value="台北市"]').prop("selected", true);
        // $(".district").find('option[value="大安區"]').prop("selected", true);
        tcs.setValue('台北市', '大安區');

    });

    // $('#card-holder').click(function() {
    //     console.log('creditauatoinput')
    //     $('#card-holder').val('小童童');
    //     $('#card-number').val('1234');
    //     $('#card-number-1').val('5678');
    //     $('#card-number-2').val('8765');
    //     $('#card-number-3').val('1234');

    //     // $(".county").find('option[value="台北市"]').prop("selected", true);
    //     // $(".district").find('option[value="大安區"]').prop("selected", true);


    // });

    var tcs;
    $(document).ready(function() {
        tcs = new TwCitySelector({
            el: '.my-selector-c',
            elCounty: '.county', // 在 el 裡查找 element
            elDistrict: '.district', // 在 el 裡查找 element
        });
        // new TwCitySelector({
        //     el: '.my-selector-c',
        //     countyValue: '台北市', // 注意此項為關聯參數
        //     districtValue: '中正區'
        // });
    });


    //確認優惠代碼是否可以使用
    $('input#radio-coupon-pay-2').click(function(event) {
        //避免元素的預設事件被觸發
        // event.preventDefault();



        //取得優惠代碼
        let code = $('input[name="coupon_code"]:checked').val();
        console.log($('input[name="coupon_code"]:checked').val());
        //如果代碼為空，就不往下執行
        if (code == '') {
            alert('請輸入優惠代碼');
            return false;
        }

        $.post("checkCoupon.php", {
            code: code
        }, function(obj) {
            if (obj['success']) {
                alert(`${obj['info']}`);
            } else {
                alert(`${obj['info']}`);
            }
            console.log(obj);
        }, 'json');
    });


    //auto input


    let infoEmail = $('input#info-email').attr('value');
    let infoName = $('input#info-name').attr('value');
    let infoAddress = $('input#info-address').attr('value');
    let infoPhone = $('input#info-phone').attr('value');

    $('#radio-member').click(function() {
        console.log('hi')
        $('#p1').val(infoName);
        $('#t1').val(infoPhone);
        $('#e1').val(infoEmail);

        console.log(infoEmail)
    })

    $('#radio-member-receiver').click(function() {
        console.log('yo')
        $('#p2').val(infoName);
        $('#t2').val(infoPhone);
        $('#e2').val(infoEmail);

    });

    $('#radio-member-receiver3').click(function() {
        console.log('ho')
        $('#p3').val(infoName);
        $('#t3').val(infoPhone);
        $('#e3').val(infoEmail);
        $('#address').val('復興南路一段390號2樓');
        // $(".county").find('option[value="台北市"]').prop("selected", true);
        // $(".district").find('option[value="大安區"]').prop("selected", true);
        // tcs.setValue('新北市', '板橋區');

    });

    var tcs;
    $(document).ready(function() {
        tcs = new TwCitySelector({
            el: '.my-selector-c',
            elCounty: '.county', // 在 el 裡查找 element
            elDistrict: '.district', // 在 el 裡查找 element
        });
        // new TwCitySelector({
        //     el: '.my-selector-c',
        //     countyValue: '台北市', // 注意此項為關聯參數
        //     districtValue: '中正區'
        // });
    });


    //跳出未填提示框，留在本頁


    $('.to_step_3').click(function() {

        if (
            !$('#radio-1').prop('checked') &&
            !$('#radio-2').prop('checked') &&
            !$('#radio-3').prop('checked')


        ) {
            event.preventDefault();
            // alert('資訊欄不能為空');

            $('#cantblank').addClass('open')
            $('.lightbox_background').addClass('open');

        }
    })

    $('#cantblankbtn').click(function() {
        $('#cantblank').removeClass('open')
        $('.lightbox_background').removeClass('open');
    })

    $('.lightbox_background').click(function(event) {

        $('.lightbox_background').removeClass('open');

        $('#cantblank').removeClass('open')
    });
</script>




</body>

</html>