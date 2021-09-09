<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
if (!isset($_SESSION['email'])) {
    header("Location: singup_login_switch.php");
    exit();
}

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


    <form name="myForm" method="post" action="shoppingcart_2.php">
        <div class="tab_container">
            <a class="shopcart" href="./shoppingcart_cart.php">
                購物車
            </a>
            <a class="thinkmore" href="./shoppingcart_think.php">
                我再想想
            </a>
        </div>
        <div class="shop_content">
            <div class="item-title rwd-none">
                <div class="block"></div>
                <div class="myitem-1">
                    <div class="item_title1 padding-l-16">商品資訊</div>
                    <div class="item_title1">價格</div>
                    <div class="item_title1">數量</div>
                    <div class="item_title1">小計</div>
                    <div class="item_title1">變更</div>
                </div>
            </div>


            <!-- php商品生肉區 -->


            <?php
            //購物車商品數量、小計、總計
            $count = 0;
            $total = 0;
            $format_total = 0;

            //判斷購物車是否存在，若存在，同時確認裡頭的商品數量
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                //更新商品數量
                $count = count($_SESSION['cart']);

                foreach ($_SESSION['cart'] as $key => $obj) {
                    //計算小計
                    $total += $obj['prod_price'] * $obj['prod_qty'];
                    $format_total = number_format($obj['prod_price'] * $obj['prod_qty']);


            ?>


                    <div class="myitem">
                        <a class="prodlink" target="_blank" href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                            <img src="./img/RAW_images/<?= $obj['prod_foto'] ?>" alt="">
                        </a>
                        <div class="rwd-direction myitem-1">
                            <div class="item-name">
                                <div class="prod_id"><?= $obj['prod_name'] ?></div>
                                <div class="other">
                                    <span class="color_code" style="background-color: <?= $obj['prod_colorCode'] ?>"></span>
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

                                    <input type="hidden" name="index[]" value="<?= $key ?>">

                                    <div class="btn_minus" data-index="<?= $key ?>" data-prod-price="<?= $obj['prod_price'] ?>">
                                        -
                                    </div>

                                    <input class="shopcart_qty qty" name="qty[]" type="text" data-index="<?= $key ?>" data-prod-price="<?= $obj['prod_price'] ?>" value="<?= $obj['prod_qty'] ?>" style="padding-left:0;" readonly />

                                    <div class="btn_plus" data-index="<?= $key ?>" data-prod-price="<?= $obj['prod_price'] ?>">
                                        +
                                    </div>
                                </span>


                            </div>
                            <div class="s_count">
                                <p class="rwd-show">小計</p>
                                <!-- <span class="rwd-size">NT.</span> -->
                                <span class="rwd-size s nt" data-index="<?= $key ?>">
                                    <?= $format_total ?></span>
                            </div>

                            <div class="change">
                                <a class="ithinkthink" href="pending.php?prod_id=<?= $obj['prod_id'] ?>">我再想想</a>
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
            <!-- php商品生肉區結束 -->

        </div>

        <div class="sub-area">

            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height sub-left">總件數</div>
                    <div class="sub_height sub-right right">
                        <span id="countAll">

                            <!-- 依照現有的數量做件數的更改 -->
                            <?php
                            // if (isset($_SESSION['cart']))
                            //     echo $totalQ;
                            // else
                            //     echo '0';
                            ?>

                        </span>件
                    </div>
                </div>
            </div>
            <div class="sub-item-title">
                <div class="sub-block rwd-none"></div>
                <div class="sub_myitem">
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height rwd-none"></div>
                    <div class="sub_height sub-left">總金額</div>
                    <div class="sub_height sub-right right">


                        NT.<span id="total"><?= number_format($total) ?></span>
                    </div>
                </div>
            </div>


        </div>


        <!-- 繼續購物 / 結帳 按鈕 -->


        <div class="checkoutcontainer emily_zindex" style="justify-content:flex-end;">
            <div class="shopcart_btnarea shopcartfont">
                <a href="./product_list_all.php" class="keepshopping">

                    繼續購物
                </a>
                <button type="submit" href="./shoppingcart_3.php" class="checkout">
                    結帳
                </button>
            </div>
        </div>
    </form>
</div>





















<?php require_once 'tpl/foot.inc.php' ?>


<script src="./js/alert.js"></script>
<!-- JQ link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/js-emily/shoppingcart.js"></script>
<script src="./js/main.js"></script>



<script>
    //增加商品數量
    // $('#btn_plus').click(function(event) {
    //     let input_qty = $('input#number');
    //     input_qty.val(parseInt(input_qty.val()) + 1);
    // });

    //減少商品數量
    // $('#btn_minus').click(function(event) {
    //     let input_qty = $('input#number');
    //     if (parseInt(input_qty.val()) - 1 < 1) return false;
    //     input_qty.val(parseInt(input_qty.val()) - 1);
    // });



    $('.btn_plus').click(function(event) {
        console.log('btnplus');
        let btn = $(this);
        let index = btn.attr('data-index');
        let prod_price = btn.attr('data-prod-price');
        let input_qty = $(`input.qty[data-index="${index}"]`);
        console.log('input_qty', input_qty.val());
        console.log('parseInt(input_qty.val()', parseInt(input_qty.val()));
        input_qty.val(parseInt(input_qty.val()) + 1);


        function toThousands(num) {
            var num = (num || 0).toString(),
                result = '';
            while (num.length > 3) {
                result = ',' + num.slice(-3) + result;
                num = num.slice(0, num.length - 3);
            }
            if (num) {
                result = num + result;
            }
            return result;
        }

        let showprice = input_qty.val() * prod_price;
        let showaccurateprice = toThousands(showprice);
        console.log(showaccurateprice)

        //修改商品金額
        $(`span.s[data-index="${index}"]`).text(showaccurateprice);

        //更新總計
        let total = 0;
        let newtotal = 0;
        $(`input.qty`).each(function(index, element) {
            function commafyback(num) {
                var x = num.split(',');
                return parseFloat(x.join(""));
            }

            $(element).val()
            let totalnocomma = commafyback($(element).val());

            total += (parseInt(totalnocomma) * parseInt($(element).attr('data-prod-price')));

            newtotal = toThousands(total);

        });
        $('span#total').text(newtotal);
        updateCount();
    });

    //減少商品數量
    $('.btn_minus').click(function(event) {
        let btn = $(this);
        let index = btn.attr('data-index');
        let prod_price = btn.attr('data-prod-price');
        let input_qty = $(`input.qty[data-index="${index}"]`);
        if (parseInt(input_qty.val()) - 1 < 1) return false;
        input_qty.val(parseInt(input_qty.val()) - 1);


        function toThousands(num) {
            var num = (num || 0).toString(),
                result = '';
            while (num.length > 3) {
                result = ',' + num.slice(-3) + result;
                num = num.slice(0, num.length - 3);
            }
            if (num) {
                result = num + result;
            }
            return result;
        }

        let showprice = input_qty.val() * prod_price;
        let showaccurateprice = toThousands(showprice);
        console.log(showaccurateprice)

        //修改商品金額
        $(`span.s[data-index="${index}"]`).text(showaccurateprice);

        //更新總計
        let total = 0;
        let newtotal = 0;
        $(`input.qty`).each(function(index, element) {

            function commafyback(num) {
                var x = num.split(',');
                return parseFloat(x.join(""));
            }

            $(element).val()
            let totalnocomma = commafyback($(element).val());

            total += (parseInt(totalnocomma) * parseInt($(element).attr('data-prod-price')));

            newtotal = toThousands(total);
        });
        $('span#total').text(newtotal);

        updateCount();
    });

    // 把所有的qty加起來當總件數，如何抓到全部？

    function updateCount() {
        let countAll = 0;

        $('input.qty').each(function() {
            countAll = +countAll + +$(this).val();
        });

        console.log('i am countAll:', countAll);
        $('span#countAll').text(countAll);
    }

    updateCount();

    //刪除購物車內商品
    $('a.delete').click(function(event) {
        //避免元素的預設事件被觸發
        event.preventDefault();
        //取得選定刪除的購物車索引
        let index = $(this).attr('data-index');
        let deleteItem = confirm('您確定刪除？');


        if (deleteItem) {

            $.get("delete.php", {
                index: index
            }, function(obj) {
                if (obj['success']) {
                    location.reload();
                } else {
                    alert(`${obj['info']}`);
                }
                console.log(obj);
            }, 'json');


        } else {
            return false;

        }

    });



    //我再想想
    // $('a.ithinkthink').click(function(event) {
    //     //避免元素的預設事件被觸發
    //     event.preventDefault();
    //     //取得選定的購物車索引
    //     //如何取得此data-index的prod_id
    //     let index = $(this).attr('data-index');

    //     $.get("think.php", {
    //         index: index
    //     }, function(obj) {
    //         if (obj['success']) {
    //             location.reload();
    //         } else {
    //             alert(`${obj['info']}`);
    //         }
    //         console.log(obj);
    //     }, 'json');
    // });

    $('.ithinkthink').click(function() {

        $(this).closest('.myitem').remove();
    })
</script>
</body>

</html>