<?php
require_once 'db.inc.php'
?>

<?php session_start() ?>
<?php
// echo "<pre>";
// print_r(($_SESSION));
// echo "</pre>";
// exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>



    <link rel="stylesheet" href="./css/css-emily/main-emily.css">
    <link rel="stylesheet" href="./css/css-emily/shoppingcart_try.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/awesome.all.min.css">
</head>

<?php require_once 'tpl/head.inc.php' ?>

<!-- shopping cart step by step -->

<div class="step_container">
    <div class="stepimgsize">
        <img src="./svg/shopstep1.svg" alt="">
    </div>
</div>

<!-- 以下為購物車 -->


<div class="container rwdfontsize">



    <div class="tab_container">
        <a class="thinkmore" href="./shoppingcart_cart.php">
            購物車
        </a>
        <a class="shopcart" href="./shoppingcart_think.php">
            我再想想
        </a>
    </div>
    <div class="shop_content">
        <div class="item-title rwd-none">
            <div class="block"></div>
            <div class="myitem-1">
                <div class="item_title1 padding-l-16">商品資訊</div>
                <div class="item_title1">價格</div>
                <div class="item_title1">庫存</div>
                <div class="item_title1">變更</div>
            </div>
        </div>

        <!-- 再pending裡面的物件怎麼做處理 -->
        <?php
        if (isset($_SESSION['pending'])) {
            foreach ($_SESSION['pending'] as $key => $obj) {
        ?>

                <div class="myitem">
                    <a class="prodlink" href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
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
                            <span class="rwd-size">NT.<?= $obj['prod_price'] ?></span>
                        </div>
                        <div class="quatity pure-flex">
                            <p class="rwd-show">庫存</p>
                            <span class="rwd-size pure-flex">
                                有
                            </span>


                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                        <div class="change">
                            <a class="ithinkthink" href="pendingback.php?prod_id=<?= $obj['prod_id'] ?>">加至購物車</a>

                            <!-- 加了data-index -->
                            <a href="#" class="delete" data-index="<?= $key ?>">
                                <img class="trash" src="./svg/trash.svg" alt="">
                            </a>

                        </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>

    </div>
    <!-- 繼續購物 / 結帳 按鈕 -->
    <div class="checkoutcontainer emily_zindex" style="justify-content:flex-end;">
        <div class="shopcart_btnarea shopcartfont">
            <a href="./product_list_all.php" class="keepshopping">

                繼續購物
            </a>
            <a href="./shoppingcart_2.php" class="checkout">
                結帳
            </a>
        </div>
    </div>



</div>

















<?php require_once 'tpl/foot.inc.php' ?>






<!-- JQ link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/js-emily/shoppingcart.js"></script>
<script src="./js/main.js"></script>

<script>
    $('.delete').click(function() {
        $(this).closest('.myitem').remove();
    })


    //刪除想想內商品
    $('.delete').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();
        //取得選定刪除的購物車索引
        let index = $(this).attr('data-index');
        let deleteItem = confirm('您確定刪除？');


        if (deleteItem) {

            $.get("delete_think.php", {
                index: index
            }, function(obj) {
                if (obj['success']) {
                    location.reload();
                } else {
                    // alert(`${obj['info']}`);
                }
                console.log(obj);
            }, 'json');


        } else {
            return false;

        }

    });
</script>
</body>

</html>