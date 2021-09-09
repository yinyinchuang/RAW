<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<?php
//如果這個階段沒有登入帳號，或沒有購物車，就將頁面轉到商品確認頁
// if (!isset($_SESSION['email']) || !isset($_SESSION['cart'])) {
//     header("Location: product_list_all.php");
//     exit();
// }

if (!isset($_SESSION['cart'])) {
    header("Location: product_list_all.php");
    exit();
}

//總額 與 優惠後總額
$total = 0;
$total_m = 0;

//計算總價
foreach ($_SESSION['cart'] as $key => $obj) {
    $total += $obj['prod_price'] * $obj['prod_qty'];
}

/**
 * 先讓 總額 與 優惠後總額 的值一樣, 
 * 之後看看是否使用優惠代碼，來決定實際的優惠後總額
 */

$total_m = $total;

//判斷優惠代碼是否存在，有則計算出優惠後價格
if ($_SESSION['form']['coupon_code'] != '') {
    $sqlCoupon = "SELECT * FROM `coupon` WHERE `coupon_price` = '{$_SESSION['form']['coupon_code']}'";
    $stmt = $pdo->query($sqlCoupon);
    if ($stmt->rowCount() > 0) {
        //取得優惠資訊
        $obj = $stmt->fetch();

        //計算優惠後總額
        $total_m = ceil($total - $obj['percentage']);

        //將優惠券設定為已使用
        $sqlUpdate = "UPDATE `coupon` SET `isUsed` = 1 WHERE `code` = '{$_SESSION['form']['coupon_code']}'";
        $pdo->query($sqlUpdate);
    }
}

//信用卡資訊不寫好像沒差..因為在第二頁第三頁沒有
$card_number = $_POST['creditcard1'] . $_POST['creditcard2'] . $_POST['creditcard3'] . $_POST['creditcard4'];
$card_valid_date = $_POST['expire1'] . $_POST['expire2'];
$card_ccv = $_POST['card_ccv'];
$card_holder = $_POST['card_holder'];


//建立訂單(email還未加入)
$sql = "INSERT INTO `orders`(`shipping`, `pay`, `name`, `phone`, 
`e_mail`, `recipient_name`, `recipient_phone`, `recipient_address`,`total`, `total_final`) 
VALUES
        ( '{$_SESSION['form']['shipping']}', '{$_SESSION['form']['pay']}', 
         '{$_SESSION['form']['name']}', '{$_SESSION['form']['phone']}', '{$_SESSION['form']['e_email']}', 
         '{$_SESSION['form']['recipient_name']}', '{$_SESSION['form']['recipient_phone']}', '{$_SESSION['form']['recipient_address']}','{$_SESSION['form']['total']}', '{$total_m}')";



$stmt = $pdo->query($sql);

/**
 * 若訂單成立，則取得新增資料的 ID (自動編號，Auto Increment 的 ID)，
 * 透過 ID 來建立訂單資料表的訂單編號 (order_id)。
 */
if ($stmt->rowCount() > 0) {
    //取得新增資料時的自動編號
    $lastInsertId = $pdo->lastInsertId();

    //建立訂單編號
    $sqlCount = "SELECT COUNT(1) as `sn` FROM `orders`";
    $sn = $pdo->query($sqlCount)->fetch()['sn'];
    $order_id = date("Ymd") . sprintf('%05d', $sn);

    //將訂單編號更新回 orders 資料表
    $sqlUpdate = "UPDATE `orders` SET `order_id` ='{$order_id}' WHERE `id` = {$lastInsertId}";
    $pdo->query($sqlUpdate);



    //處理商品明細資訊
    foreach ($_SESSION['cart'] as $key => $obj) {
        //計算小計
        $subtotal = $obj['prod_price'] * $obj['prod_qty'];

        //新增商品名細
        $sqlDetail = "INSERT INTO `orders_detail`(`order_id`, `prod_id`, `prod_name`, `prod_price`, `color_code`, `color_name`, `qty`, `total_price`, `size`) VALUES  ('{$order_id}', {$obj['prod_id']}, '{$obj['prod_name']}', '{$obj['prod_price']}', {$obj['prod_colorCode']}, '{$obj['prod_colorCodeName']}', {$obj['prod_qty']}, {$subtotal},{$obj['prod_size']})";

        $pdo->query($sqlDetail);
    }

    //刪除購物車
    unset($_SESSION['cart'], $_SESSION['form']);
}
?>
