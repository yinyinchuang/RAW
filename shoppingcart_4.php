<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<?php
//如果這個階段沒有購物車，就將頁面轉到商品確認頁
if (!isset($_SESSION['email']) || !isset($_SESSION['cart'])) {
    header("Location: product_list_all.php");
    exit();
}

//將表單資訊寫入 session，之後建立訂單時，一起變成訂單資訊
// $_SESSION['form'] = [];
// $_SESSION['form']['shipping'] = $_POST['shipping'];
// $_SESSION['form']['name'] = $_POST['name'];
// $_SESSION['form']['phone'] = $_POST['phone'];
// $_SESSION['form']['e_mail'] = $_POST['e_mail'];
// $_SESSION['form']['recipient_phone'] = $_POST['recipient_phone'];
// $_SESSION['form']['recipient_address'] = $_POST['recipient_address'];
// $_SESSION['form']['recipient_name'] = $_POST['recipient_name'];
// $_SESSION['form']['pay'] = $_POST['pay'];
// $_SESSION['form']['coupon-code'] = $_POST['coupon-code'];
// $_SESSION['form']['creditcard'] = $_POST['creditcard'];
// $_SESSION['form']['expire'] = $_POST['expire'];
// $_SESSION['form']['total'] = $_POST['total'];

// echo "<pre>";
// print_r(($_SESSION));
// echo "</pre>";
// exit();



//如果這個階段沒有登入帳號，或沒有購物車，就將頁面轉到商品確認頁
// if (!isset($_SESSION['email']) || !isset($_SESSION['cart'])) {
//     header("Location: product_list_all.php");
//     exit();
// }

// 以下為成立訂單

// if (!isset($_SESSION['cart'])) {
//     header("Location: product_list_all.php");
//     exit();
// }

//總額 與 優惠後總額
// $total = 0;
// $total_m = 0;

//計算總價
// foreach ($_SESSION['cart'] as $key => $obj) {
//     $total += $obj['prod_price'] * $obj['prod_qty'];
// }

/**
 * 先讓 總額 與 優惠後總額 的值一樣, 
 * 之後看看是否使用優惠代碼，來決定實際的優惠後總額
 */

// $total_m = $total;

//判斷優惠代碼是否存在，有則計算出優惠後價格
// if ($_SESSION['form']['coupon_code'] != '') {
//     $sqlCoupon = "SELECT * FROM `coupon` WHERE `coupon_price` = '{$_SESSION['form']['coupon_code']}'";
//     $stmt = $pdo->query($sqlCoupon);
//     if ($stmt->rowCount() > 0) {
//         //取得優惠資訊
//         $obj = $stmt->fetch();

//         //計算優惠後總額
//         $total_m = ceil($total - $obj['percentage']);

//         //將優惠券設定為已使用
//         $sqlUpdate = "UPDATE `coupon` SET `isUsed` = 1 WHERE `code` = '{$_SESSION['form']['coupon_code']}'";
//         $pdo->query($sqlUpdate);
//     }
// }

//信用卡資訊不寫好像沒差..因為在第二頁第三頁沒有
// $card_number = $_POST['creditcard1'] . $_POST['creditcard2'] . $_POST['creditcard3'] . $_POST['creditcard4'];
// $card_valid_date = $_POST['expire1'] . $_POST['expire2'];
// $card_ccv = $_POST['card_ccv'];
// $card_holder = $_POST['card_holder'];

$total_fianl = $_SESSION['form']['total'] - 20;
//建立訂單
$sql = "INSERT INTO `orders`(`email`, `shipping`, `pay`, `name`, `phone`, `e_mail`, `recipient_name`, `recipient_phone`, `recipient_address`, `creditcard`, `expire`, `total`, `total_final`, `order_status`) 
VALUES ('{$_SESSION['email']}','{$_SESSION['form']['shipping']}','{$_SESSION['form']['pay']}','{$_SESSION['form']['name']}','{$_SESSION['form']['phone']}','{$_SESSION['form']['e_mail']}','{$_SESSION['form']['recipient_name']}','{$_SESSION['form']['recipient_phone']}','{$_SESSION['form']['recipient_address']}','1','1','{$_SESSION['form']['total']}','{$total_fianl}','備貨中')";

$stmt = $pdo->query($sql);

/**
 * 若訂單成立，則取得新增資料的 ID (自動編號，Auto Increment 的 ID)，
 * 透過 ID 來建立訂單資料表的訂單編號 (order_id)。
 */
if ($stmt->rowCount() > 0) {
    // 取得新增資料時的自動編號
    $lastInsertId = $pdo->lastInsertId();
    // echo $lastInsertId;
    // 建立訂單編號
    // $sqlCount = "SELECT COUNT(1) as `sn` FROM `orders`";
    // $sn = $pdo->query($sqlCount)->fetch()['sn'];
    // $order_id = date("Ymd") . sprintf('%08d', $lastInsertId);
    // echo $order_id;
    // 將訂單編號更新回 orders 資料表
    // $_id = sprintf('%08d', $lastInsertId);
    // $sqlUpdate = "UPDATE `orders` SET `order_id` ='$order_id' WHERE `order_id` = '$_id'";
    // $pdo->query($sqlUpdate);


    //處理商品明細資訊
    foreach ($_SESSION['cart'] as $key => $obj) {
        //計算小計
        $subtotal = $obj['prod_price'] * $obj['prod_qty'];

        //新增商品名細
        $sqlDetail = "INSERT INTO 
        `orders_detail`(`order_id`,`prod_id`, `prod_name`, `prod_price`, `color_code`, `color_name`, `qty`, `total_price`, `size`,`prod_foto`) 
        VALUES  ({$lastInsertId},{$obj['prod_id']}, '{$obj['prod_name']}', {$obj['prod_price']}, '{$obj['prod_colorCode']}', '{$obj['prod_colorCodeName']}', '{$obj['prod_qty']}', {$subtotal},'{$obj['prod_size']}','{$obj['prod_foto']}')";

        $pdo->query($sqlDetail);
        // 刪除購物車


    }
};





//總額 與 優惠後總額
$total = 0;
$total_m = 0;

//計算總價
foreach ($_SESSION['cart'] as $key => $obj) {
    $total += $obj['prod_price'] * $obj['prod_qty'];
}



// $total_m = $total;

//判斷優惠代碼是否存在，有則計算出優惠後價格
// if ($_SESSION['form']['coupon_code'] != '') {
//     $sqlCoupon = "SELECT * FROM `coupon` WHERE `coupon` = '{$_SESSION['form']['coupon_code']}' AND `email`='aaa@aaa'";
//     $stmt = $pdo->query($sqlCoupon);
//     if ($stmt->rowCount() > 0) {
//         //取得優惠資訊
//         $obj = $stmt->fetch();

//         //計算優惠後總額
//         $total_m = ceil($total + $obj['coupon_price']);
//         $total_t = $total_m - 80;

//         //將優惠券設定為已使用
//         $sqlUpdate = "UPDATE `coupon` SET `used` = 1 WHERE `coupon` = '{$_SESSION['form']['coupon_code']}' AND `email`='aaa@aaa'";
//         $pdo->query($sqlUpdate);
//     }
// }

// unset($_SESSION['cart'], $_SESSION['form']);
unset($_SESSION['cart']);

?>

<?php
$count_psc1 = 0;
$sql = "SELECT * FROM `orders_detail` 
                   WHERE `order_id`={$lastInsertId}";
$arr2 = $pdo->query($sql)->fetchAll();

$count_psc = count($arr2);
// echo $count_psc;

foreach ($arr2 as $objcount) {

    $count_psc1 += $objcount['qty'];

?>



<?php
};
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart step finish</title>


    <link rel="stylesheet" href="./css/css-emily/main-emily.css">
    <link rel="stylesheet" href="./css/css-emily/shoppingcart_try.css">
    <link rel="stylesheet" href="./css/main.css">

</head>

<?php require_once 'tpl/head.inc.php' ?>


<!-- shopping cart step by step -->

<div class="step_container1">


    <?php
    //     $sql = "SELECT * 
    //  FROM `orders`
    //  WHERE `e_mail`='{$_SESSION['form']['e_mail']}'";
    //     $stmt = $pdo->query($sql);
    //     if ($stmt->rowCount() > 0) {
    //         $obj = $stmt->fetch();
    ?>


    <div class="ordertext">感謝您的購買，您的訂單編號為 :<span><?= sprintf('%08d', $lastInsertId) ?></span>
        <?php
        // } 
        ?>
        <p>待商品抵達，將以簡訊通知您</p>
    </div>

</div>

<div class="step4title d-s-none">商品明細</div>



<!-- 購物車內容 -->
<div class="container rwdfontsize">




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


        <?php
        $sql = "SELECT * FROM `orders_detail` 
                   WHERE `order_id`={$lastInsertId}";

        $arr2 = $pdo->query($sql)->fetchAll();

        foreach ($arr2 as $obj2) {
        ?>



            <div class="myitem">
                <a class="prodlink" target="_blank" href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                    <img src="./img/RAW_images/<?= $obj2['prod_foto'] ?>" alt="">

                </a>
                <div class="rwd-direction myitem-1">
                    <div class="item-name">
                        <div class="prod_id"><?= $obj2['prod_name'] ?></div>
                        <div class="other">
                            <span class="color_code" style="background-color: <?= $obj2['color_code'] ?>;"></span>
                            <div class="color_name"><?= $obj2['color_name'] ?></div>
                            <div class="mysize"><?= $obj2['size'] ?></div>
                        </div>
                    </div>


                    <div class="price">
                        <p class="rwd-show">價錢</p>
                        <span class="rwd-size">NT.<?= number_format($obj2['prod_price']) ?></span>
                    </div>
                    <div class="quatity pure-flex">
                        <p class="rwd-show">數量</p>
                        <span class="rwd-size pure-flex">
                            <?= $obj2['qty'] ?>
                        </span>
                    </div>
                    <div class="price">
                        <p class="rwd-show">小計</p>
                        <span class="rwd-size">NT.<?= number_format($obj2['total_price'] * $obj2['qty']) ?></span>
                    </div>
                    <!-- </div> -->
                    <!-- </div> -->

                </div>
            </div>


        <?php
        }
        ?>




    </div>

    <?php
    //購物車商品數量、小計、總計
    // $count = 0;
    // $total = 0;

    //判斷購物車是否存在，若存在，同時確認裡頭的商品數量
    // if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    //更新商品數量
    // $count = count($_SESSION['cart']);

    // foreach ($_SESSION['cart'] as $key => $obj) {
    //計算小計
    // $total += $obj['prod_price'] * $obj['prod_qty'];

    ?>
    <?php
    $sql = "SELECT * FROM `orders_detail` 
                   WHERE `order_id`={$lastInsertId}
                   LIMIT 1";
    $arr2 = $pdo->query($sql)->fetchAll();


    // echo $count_psc;

    foreach ($arr2 as $obj2) {

    ?>


        <div class="sub-area-step3">

            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height right">總件數</div>
                    <div class="sub_height sub-left"></div>
                    <div class="sub_height sub-right left"><span>
                            <?= $count_psc1 ?>
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
                    <div class="sub_height sub-right right">NT.<?= number_format($total) ?></span></div>
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
                    <div class="sub_height sub-right right"><?= '-' . substr($_SESSION['form']['coupon_code'], 0, 3) ?></div>
                </div>
            </div>

        </div>


    <?php
    }
    ?>





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


    <?php
    //     }
    // }



    ?>


    <div class="collayout_L3 emily_col h80">
        <div class="step3_listtitle shopcar_border" style="background-color: transparent;color: #BCAA9A;">
            運送方式</div>
        <p><?= $_SESSION['form']['shipping'] ?></p>
    </div>

    <div class="collayout_L3 emily_col h80 displaynone">
        <div class="step3_listtitle shopcar_border" style="background-color: transparent;color: #BCAA9A;">
            超商門市</div>
        <p>大安門市</p>
    </div>

    <div class="collayout_L3 emily_col h180 h160">
        <div class="step3_listtitle h25_ shopcar_border" style="background-color: transparent;color: #BCAA9A;">
            訂購人資訊
        </div>
        <div class="shopcarttablerow h75_">
            <div class="tableoutter">
                <div class="step3_listtitle_ ">訂購人</div>
                <p><?= $_SESSION['form']['name'] ?></p>
            </div>
            <div class="tableoutter">
                <div class="step3_listtitle_">聯絡電話</div>
                <p><?= $_SESSION['form']['phone'] ?></p>
            </div>
            <div class="tableoutter" style="border-bottom: none;">
                <div class="step3_listtitle_">Email</div>
                <p><?= $_SESSION['form']['e_mail'] ?></p>
            </div>
        </div>
    </div>


    <div class="collayout_L3 emily_col h180 h160">
        <div class="step3_listtitle h25_ shopcar_border" style="background-color: transparent;color: #BCAA9A;">
            收件人資訊
        </div>
        <div class="shopcarttablerow h75_">
            <div class="tableoutter">
                <div class="step3_listtitle_">收件人</div>
                <p><?= $_SESSION['form']['recipient_name'] ?></p>
            </div>
            <div class="tableoutter">
                <div class="step3_listtitle_">聯絡電話</div>
                <p><?= $_SESSION['form']['recipient_phone'] ?></p>
            </div>
            <div class="tableoutter" style="border-bottom: none;">
                <div class="step3_listtitle_">收件人地址</div>
                <p>台北市大安區<?= $_SESSION['form']['recipient_address'] ?></p>
            </div>
        </div>
    </div>

    <div class="collayout_L3 emily_col h80">
        <div class="step3_listtitle shopcar_border" style="background-color: transparent;color: #BCAA9A;">
            優惠券</div>
        <p><?= $_SESSION['form']['coupon_code'] ?></p>
    </div>



    <div class="collayout_L3 emily_col h80">
        <div class="step3_listtitle shopcar_border" style="background-color: transparent;color: #BCAA9A;">
            付款方式</div>
        <p><?= $_SESSION['form']['pay'] ?></p>
    </div>

    <div class="checkoutcontainer" style="justify-content:flex-end;">

        <div class="shopcart_btnarea">
            <a href="./product_list_all.php" class="to_step_1">

                繼續購物
            </a>
            <a href="./member_order.php" class="to_step_3">
                回到我的訂單
            </a>
        </div>
    </div>




</div>


<?php require_once 'tpl/foot.inc.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/main.js"></script>

<script>


</script>
</body>

</html>