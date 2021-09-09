<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
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



        <div class="cart_at_right_card">
            <div class="cart_at_right_card_img">
                <img src="./img/RAW_images/<?= $obj['prod_foto'] ?>" alt="">
            </div>
            <div class="cart_at_right_card_content">
                <div class="cart_at_right_name"><?= $obj['prod_name'] ?></div>
                <div class="cart_at_right_other">
                    <span class="cart_at_right_color_code" style="background-color:  <?= $obj['prod_colorCode'] ?>;"></span>
                    <div class="cart_at_right_color_name"><?= $obj['prod_colorCodeName'] ?></div>
                    <div class="cart_at_right_size"><?= $obj['prod_size'] ?></div>
                </div>
                <div class="cart_at_right_price">價格<span>NT<?= number_format($obj['prod_price']) ?></span></div>
                <div class="cart_at_right_quatity">數量<span><?= $obj['prod_qty'] ?></span></div>
                <a href="#" class="delete" data-index="<?= $key ?>">
                    <img class="cart_at_right_trash" src="./svg/trash.svg" alt="">
                </a>
            </div>
        </div>

<?php
    }
}
?>