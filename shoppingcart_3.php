<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
//如果這個階段沒有購物車，就將頁面轉到商品確認頁
// if (!isset($_SESSION['email']) || !isset($_SESSION['cart'])) {
//     header("Location: product_list_all.php");
//     exit();
// }

if (!isset($_SESSION['email']) || !isset($_SESSION['cart'])) {
    header("Location: product_list_all.php");
    exit();
}

//將表單資訊寫入 session，之後建立訂單時，一起變成訂單資訊
$_SESSION['form'] = [];
$_SESSION['form']['shipping'] = $_POST['shipping'];
$_SESSION['form']['name'] = $_POST['name'];
$_SESSION['form']['phone'] = $_POST['phone'];
$_SESSION['form']['e_mail'] = $_POST['e_mail'];
$_SESSION['form']['recipient_phone'] = $_POST['recipient_phone'];
$_SESSION['form']['recipient_address'] = $_POST['recipient_address'];
$_SESSION['form']['recipient_name'] = $_POST['recipient_name'];
$_SESSION['form']['pay'] = $_POST['pay'];
$_SESSION['form']['coupon_code'] = $_POST['coupon_code'];
// $_SESSION['form']['creditcard'] = $_POST['creditcard'];
// $_SESSION['form']['expire'] = $_POST['expire'];
$_SESSION['form']['total'] = $_POST['total'];

// echo "<pre>";
// print_r(($_SESSION));
// echo "</pre>";
// exit();


// 以下為成立訂單



//總額 與 優惠後總額
$total = 0;
$total_m = 0;
$total_qty = 0;
//計算總價
foreach ($_SESSION['cart'] as $key => $obj) {
    $total += $obj['prod_price'] * $obj['prod_qty'];
    $total_qty += $obj['prod_qty'];
}

$total_m = $total;

//判斷優惠代碼是否存在，有則計算出優惠後價格
if ($_SESSION['form']['coupon_code'] != '') {
    $sqlCoupon = "SELECT * FROM `coupon` WHERE `coupon` = '{$_SESSION['form']['coupon_code']}' AND `email`='{$_SESSION['email']}'";
    $stmt = $pdo->query($sqlCoupon);
    if ($stmt->rowCount() > 0) {
        //取得優惠資訊
        $obj = $stmt->fetch();

        //計算優惠後總額
        $total_m = ceil($total + $obj['coupon_price']);
        $total_t = ($total_m - 80);

        //將優惠券設定為已使用
        $sqlUpdate = "UPDATE `coupon` SET `used` = 1 WHERE `coupon` = '{$_SESSION['form']['coupon_code']}' AND `email`='{$_SESSION['email']}'";
        $pdo->query($sqlUpdate);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart step3</title>


    <link rel="stylesheet" href="./css/css-emily/main-emily.css">
    <link rel="stylesheet" href="./css/css-emily/shoppingcart_try.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<?php require_once 'tpl/head.inc.php' ?>





<!-- shopping cart step by step -->

<div class="step_container">

    <div class="stepimgsize">
        <img src="./svg/shopstep3.svg" alt="">
    </div>
</div>


<div class="step4title d-s-none">商品明細</div>





<!-- 購物車欄位項目 -->
<div class="container rwdfontsize">

    <form name="form" method="post" action="shoppingcart_4.php">


        <div class="shop_content_step3-1">
            <div class="item-title rwd-none">
                <div class="block"></div>
                <div class="myitem-1">
                    <div class="item_title1 padding-l-16">商品資訊</div>
                    <div class="item_title1">價格</div>
                    <div class="item_title1">數量</div>
                    <div class="item_title1">小計</div>
                </div>
            </div>

            <!-- 開始撈購物車裡的資料 -->

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


                    // echo ($total_psc);
            ?>




                    <div class="myitem">
                        <a class="prodlink" target="_blank" href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                            <img src="./img/RAW_images/<?= $obj['prod_foto'] ?>" alt="">
                        </a>
                        <div class="rwd-direction myitem-1">
                            <div class="item-name">
                                <div class="prod_id"><?= $obj['prod_name'] ?></div>
                                <div class="other">
                                    <span class="color_code" style="background-color: <?= $obj['prod_colorCode'] ?>;"></span>
                                    <div class="color_name"><?= $obj['prod_colorCodeName'] ?></div>
                                    <div class="mysize"><?= $obj['prod_size'] ?></div>
                                </div>
                            </div>


                            <div class="price">
                                <p class="rwd-show">價錢</p>
                                <span class="rwd-size">NT.<?= number_format($obj['prod_price']) ?></span>
                            </div>
                            <div class="quatity pure-flex">
                                <p class="rwd-show">數量</p>
                                <span class="rwd-size pure-flex">
                                    <?= $obj['prod_qty'] ?>
                                </span>
                            </div>
                            <div class="price">
                                <p class="rwd-show">小計</p>
                                <span class="rwd-size">NT.<?= number_format($obj['prod_price'] * $obj['prod_qty']) ?></span>
                            </div>


                        </div>
                    </div>
            <?php

                }
            }
            ?>

        </div>
        <div class="sub-area-step3">

            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height right">總件數</div>
                    <div class="sub_height sub-left"></div>
                    <div class="sub_height sub-right left"><span>
                            <?=
                            $total_qty
                            ?>
                        </span>件</div>
                </div>
            </div>

            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height right">總金額</div>
                    <div class="sub_height sub-left"></div>
                    <div class="sub_height sub-right right">NT.<span id="total"><?= number_format($total) ?></span></div>
                </div>
            </div>


            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height right">運費</div>
                    <div class="sub_height sub-left"></div>
                    <div class="sub_height sub-right right">80</div>
                </div>
            </div>
            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height right">優惠券</div>
                    <div class="sub_height sub-left"></div>
                    <div class="sub_height sub-right right"><?= '-' . substr($_POST['coupon_code'], 0, 3) ?></div>
                </div>
            </div>

        </div>

        <div class="sub-area-step3">
            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height right">結帳金額</div>
                    <div class="sub_height sub-left"></div>
                    <div class="sub_height sub-right right">NT.<?= number_format($total - 20) ?></div>
                </div>
            </div>
        </div>



        <div class="table-wrap">


            <div class="collayout_L3 emily_col h80 ">
                <div class="step3_listtitle">運送方式</div>
                <p><?= $_POST['shipping'] ?></p>
            </div>

            <div class="collayout_L3 emily_col h80 displaynone">
                <div class="step3_listtitle">超商門市</div>
                <p>大安門市</p>
            </div>


            <div class="collayout_L3  emily_col h180 h160">
                <div class="step3_listtitle h25_">訂購人人資訊</div>
                <div class="shopcarttablerow h75_">
                    <div class="tableoutter">
                        <div class="step3_listtitle_">收件人</div>
                        <p><?= $_POST['name'] ?></p>
                    </div>
                    <div class="tableoutter">
                        <div class="step3_listtitle_">聯絡電話</div>
                        <p><?= $_POST['phone'] ?></p>
                    </div>
                    <div class="tableoutter" style="border-bottom: none;">
                        <div class="step3_listtitle_">Email</div>
                        <p><?= $_POST['e_mail'] ?></p>
                    </div>
                </div>
            </div>

            <div class="collayout_L3 emily_col h180 h200">
                <div class="step3_listtitle h20">收件人資訊</div>
                <div class="shopcarttablerow h80_">
                    <div class="tableoutter">
                        <div class="step3_listtitle_">收件人</div>
                        <p><?= $_POST['recipient_name'] ?></p>
                    </div>
                    <div class="tableoutter">
                        <div class="step3_listtitle_">聯絡電話</div>
                        <p><?= $_POST['recipient_phone'] ?></p>
                    </div>

                    <div class="tableoutter" style="border-bottom: none;">
                        <div class="step3_listtitle_" style="border-bottom: none;">收件人地址</div>
                        <p>台北市大安區<?= $_POST['recipient_address'] ?></p>
                    </div>
                </div>
            </div>

            <div class="collayout_L3 emily_col h80">
                <div class="step3_listtitle">優惠券</div>
                <p><?= $_POST['coupon_code'] ?></p>
            </div>

            <!-- <div class="collayout_L3 h120 emily_col">
                <div class="step3_listtitle  h33">訂購人資訊</div>
                <div class="shopcarttablerow2 h66">
                    <div class="tableoutter2">
                        <div class="step3_listtitle_">訂購人</div>
                        <p></p>
                    </div>
                    <div class="tableoutter2" style=" border-bottom: none;">
                        <div class="step3_listtitle_">聯絡電話</div>
                        <p></p>
                    </div>

                </div>
            </div> -->

            <div class="collayout_L3 emily_col h80">
                <div class="step3_listtitle">付款方式</div>
                <p><?= $_POST['pay'] ?></p>
            </div>

            <div class="checkoutcontainer" style="justify-content:flex-end;">
                <div class="shopcart_btnarea">
                    <a href="./shoppingcart_2.php" class="to_step_1">

                        上一步
                    </a>
                    <button type="submit" class="to_step_3">
                        送出
                    </button>
                </div>
            </div>

        </div>

    </form>
</div>

<?php require_once 'tpl/foot.inc.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/main.js"></script>


</body>

</html>