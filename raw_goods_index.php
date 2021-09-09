<?php require_once 'db.inc.php' ?>
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
    <title>goods</title>


    <link rel="stylesheet" href="./css/css-emily/swiper-bundle.min.css">
    <link rel="stylesheet" href="./css/css-emily/main-emily.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-emily/good.css">

    <style>
        .showup_box_button_300x150 {
            cursor: pointer;
        }

        .color_code {
            width: 20px;
            height: 20px;
            margin-right: 16px;
            cursor: pointer;
            border: 1px solid #BCAA9A;
            border-radius: 50%;
            position: relative;
        }
    </style>

</head>

<body>

    <?php require_once 'tpl/head.inc.php' ?>


    <div class="sizechart d-none none">
        <img src="./img/sizechart.png" alt="">
    </div>

    <div class="moreinfo d-none none">
        <img src="./img/moreinfo.png" alt="">
    </div>
    <!-- 
    <div class="rwd-sizechart rwd-show rwd-none">
        <img src="./img/rwd_sizechart.png" alt="">
    </div>

    <div class="rwd-moreinfo rwd-show rwd-none">
        <img src="./img/rwd_moreinfo.png" alt="">
    </div> -->

    <div class="bread">

        <?php
        if (isset($_GET['prod_id'])) {
            $sql = "SELECT * 
                FROM `products` INNER JOIN `products_detail`
                ON `products`.`prod_id`=`products_detail`.`prod_id`
                WHERE `products`.`prod_id`={$_GET['prod_id']}";
            $stmt = $pdo->query($sql);
            if ($stmt->rowCount() > 0) {
                $obj = $stmt->fetch();
        ?>

                <a href="">首頁 /</a>
                <a href=""><?= $obj['cat1'] ?> /</a>
                <a href=""><?= $obj['cat2'] ?> /</a>
    </div>


    <div class="outter-container">
        <div class="top-container">
            <div class="g-left">

                <p class="hiddenId" data-id="<?= $obj['prod_id'] ?>" style="display: none;">我是產品編號</p>


                <div class="carousel">
                    <ul class="carousel__list">

                        <!-- 呼叫圖片資料 -->
                        <?php
                        $sql = "SELECT * FROM `products_img` WHERE `prod_id`={$_GET['prod_id']} LIMIT 1";
                        $arr = $pdo->query($sql)->fetchAll();
                        foreach ($arr as $objImg) {
                        ?>

                            <li class="carousel__item a" data-pos="-2" style="background-image: url(./img/RAW_images/<?= str_pad($objImg['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-1.jpg);">
                            </li>

                            <li class="carousel__item b" data-pos="-1" style="background-image: url(./img/RAW_images/<?= str_pad($objImg['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-2.jpg);">
                            </li>

                            <li class="carousel__item c" data-pos="0" style="background-image: url(./img/RAW_images/<?= str_pad($objImg['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-3.jpg);"> -->

                            </li>
                            <li class="carousel__item d" data-pos="1" style="background-image: url(./img/RAW_images/<?= str_pad($objImg['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-4.jpg);">
                            </li>

                            <li class="carousel__item e" data-pos="2" style="background-image: url(./img/RAW_images/<?= str_pad($objImg['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-5.jpg);">
                            </li>

                <?php
                        }
                    }
                }

                ?>

                    </ul>
                </div>


            </div>
            <div class="g-right">
                <div class="brand"><?= $obj['prod_brand'] ?></div>
                <div class="g-item">
                    <div class="prod-name">
                        <?= $obj['prod_name'] ?>
                    </div>
                    <div class="collection">
                        <a href="#" data-id="<?= $obj['prod_id'] ?>" class="raw_goods_index_add_goods_to_wish_list">
                            <img src="./svg/heart.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="prod_price">
                    NT.<?= number_format($obj['prod_price']) ?>
                </div>
                <div class="g-color">

                    <?php
                    if (isset($_GET['prod_id'])) {
                        $sql = "SELECT * FROM `products_detail` WHERE `prod_id`={$_GET['prod_id']}";
                        $arr_products_detail = $pdo->query($sql)->fetchAll();
                        foreach ($arr_products_detail as $objCode) {

                    ?>

                            <span class="color_code" data-prod-colorcode="<?= $objCode['color_code'] ?>" data-colormatch1="<?= $objCode['color_match1'] ?>" data-colormatch2="<?= $objCode['color_match2'] ?>" style="background-color:<?= $objCode['color_code'] ?>"></span>

                    <?php

                        }
                    }
                    ?>
                    <span class="g-colorname">

                        <span id="color_name" data-colorCodeName="
                    <?= $arr_products_detail[0]['color_name'] ?>">

                            <?= $arr_products_detail[0]['color_name'] ?>
                        </span>


                    </span>

                    <?php
                    // $sql = "SELECT * FROM `products_detail` WHERE `prod_id`=1";
                    // $arr_products_detail = $pdo->query($sql)->fetchAll();
                    foreach ($arr_products_detail as $objCodeName) {
                    ?>
                        <p class="colorbook" style="display:none"><?= $objCodeName['color_name'] ?></p>

                    <?php
                    }
                    ?>

                </div>
                <div class="title">尺寸</div>
                <div class="size-group">
                    <div class="g-size sizebtn" id="size1" data-value="<?= $obj['size1'] ?>"><?= $obj['size1'] ?></div>
                    <div class="g-size sizebtn" id="size2" data-value="<?= $obj['size2'] ?>"><?= $obj['size2'] ?></div>
                    <div class="g-size  sizebtn" id="size3" data-value="<?= $obj['size3'] ?>"><?= $obj['size3'] ?></div>
                </div>


                <div class="title">數量</div>
                <div class="g-qty">
                    <div class="minus" id="cart_minus">-</div>
                    <input id="cart_qty" type="text" value="1">
                    <div class="plus" id="cart_plus">+</div>
                </div>

                <!-- <button type="button" id="btn_set_cart" class="add-to-cart" data-prod-id="<?= $obj['prod_id'] ?>" data-prod-name="<?= $obj['prod_name'] ?>" data-prod-brand="<?= $obj['prod_brand'] ?>" data-prod-price="<?= $obj['prod_price'] ?>" data-prod-colorcode="<?= $objCode['color_code'] ?>" data-colorCodeName="<?= $objCodeName['color_name'] ?>" data-prod-size="<?= $obj['size2'] ?>" data-prod-foto="<?= $objImg['foto'] ?>">加入購物車</button> -->

                <button type="button" id="btn_set_cart" class="add-to-cart" data-prod-id="<?= $obj['prod_id'] ?>" data-prod-name="<?= $obj['prod_name'] ?>" data-prod-brand="<?= $obj['prod_brand'] ?>" data-prod-price="<?= $obj['prod_price'] ?>" data-prod-colorcode="" data-colorCodeName="<?= $objCodeName['color_name'] ?>" data-prod-size="" data-prod-foto="<?= $objImg['foto'] ?>">加入購物車</button>

                <div class="lb-box-area">

                    <div class="tryon">尺寸/試穿報告</div>
                    <div class="g-detail">詳細資訊</div>

                </div>

                <div class="tag-area">

                    <?php
                    if (isset($_GET['prod_id'])) {
                        $sql = "SELECT * 
                        FROM `products_detail`
                        WHERE `prod_id`={$_GET['prod_id']}";
                        $stmt = $pdo->query($sql);
                        if ($stmt->rowCount() > 0) {
                            $obj = $stmt->fetch();

                    ?>
                            <span class="tag1area"><?= $obj['tag1'] ?></span>
                            <span><?= $obj['tag2'] ?></span>
                            <span><?= $obj['tag3'] ?></span>


                    <?php
                        }
                    }  ?>

                    <?php
                    $sql = "SELECT * FROM products_detail WHERE `prod_id`={$_GET['prod_id']}";
                    $arr = $pdo->query($sql)->fetchAll();
                    foreach ($arr as $objTag) {
                    ?>


                        <small class="tagBook" style="display:none"><?= $objTag['tag1'] ?></small>



                    <?php
                    }
                    ?>



                </div>

            </div>
        </div>

        <div class="bottom-container">

            <div class="sub-area">
                <span>你選擇了</span>


                <span id="match_ball" class="match_ball" data-value="<?= $obj[0]['color_code'] ?>" style="background-color:<?= $arr_products_detail[0]['color_code'] ?>;border:1px solid #BCAA9A;border-radius: 50%;"></span>

                <span id="match_color" class="match_color" data-matchColor="">
                    <?= $arr_products_detail[0]['color_name'] ?></span>


                <span>推薦以下單品</span>
            </div>

            <div class="sub-recommend">
                <div id="ss">


                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">

                            <?php
                            $colormatch1 = $objCode['color_match1'];
                            $colormatch2 = $objCode['color_match2'];

                            // echo ($colormatch1);
                            // echo ($colormatch2);

                            $sql = "SELECT DISTINCT `products_detail`.`prod_id`,`prod_1pic`
                                FROM `products` 
                                INNER JOIN `products_detail`
                                ON `products`.`prod_id`=`products_detail`.`prod_id`
                                WHERE `products_detail`.`color_code`='$colormatch1'
                                OR `products_detail`.`color_code`='$colormatch2'";
                            $arr_recomment = $pdo->query($sql)->fetchAll();
                            shuffle($arr_recomment);
                            foreach ($arr_recomment as $obj) {

                            ?>

                                <div class="swiper-slide lookbook_photo_card_in_sw">
                                    <a href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>"> <img src="./img/RAW_images/<?= $obj['prod_1pic'] ?>" alt="">
                                    </a>
                                </div>


                            <?php
                            }

                            ?>
                            <!-- <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-2.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-3.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-4.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-5.jpg" alt="">
                        </div> -->





                        </div>
                        <!-- <div class="swiper-pagination"></div> -->
                        <div class="swiper-button-next"><img src="./svg/chevron-right.svg" alt=""></div>
                        <div class="swiper-button-prev"><img src="./svg/chevron-left.svg" alt=""></div>


                    </div>

                </div>

                <div class="stone"></div>


            </div>
            <div class="sub-recommend-rwd">

                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-2.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-3.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-4.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/108-1-5.jpg" alt="">
                        </div>

                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-next none"><img src="./svg/chevron-right.svg" alt=""></div>
                    <div class="swiper-button-prev none"><img src="./svg/chevron-left.svg" alt=""></div>
                </div>



                <div class="stone"></div>


            </div>


        </div>


    </div>
    </div>
    <?php require_once 'tpl/foot.inc.php' ?>


    <script src="./js/js-emily/good.js"></script>
    <script src="./js/js-emily/custom.js"></script>
    <script src="./js/main.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

    <script src="./js/js-emily/swiper-bundle.min.js"></script>
    <script>
        //加入商品至購物車
        $('button#btn_set_cart').click(function(event) {
            //取得 button 的 jQuery 物件
            let btn = $(this);

            let a = $(this).attr('data-prod-colorcode');
            let b = $(this).attr('data-prod-size');


            if (!a) {
                event.preventDefault();
                // alert('請輸入正確商品資訊')

                $('#infola').addClass('open')
                $('.lightbox_background').addClass('open');

            } else if (!b) {
                event.preventDefault();
                // alert('請輸入正確商品資訊')
                $('#infosizela').addClass('open');
                $('.lightbox_background').addClass('open');
            } else {

                //送出 post 請求，加入購物車
                let objProduct = {
                    prod_id: btn.attr('data-prod-id'),
                    prod_name: btn.attr('data-prod-name'),
                    prod_brand: btn.attr('data-prod-brand'),
                    prod_price: btn.attr('data-prod-price'),
                    prod_colorCode: btn.attr('data-prod-colorcode'),
                    prod_colorCodeName: btn.attr('data-colorCodeName'),
                    prod_size: btn.attr('data-prod-size'),
                    prod_foto: btn.attr('data-prod-foto'),
                    prod_qty: $('#cart_qty').val(),
                };

                // console.log(objProduct);

                $.post("setCart.php", objProduct, function(obj) {
                    if (obj['success']) {
                        //成功訊息


                        $('#addcartframe').addClass('open');
                        $('.lightbox_background').addClass('open');
                        // alert('加入購物車成功');

                        //將網頁上的購物車商品數量更新
                        $('span#count_products').text(obj['count_products']);
                    }
                    // console.log(obj);
                }, 'json');
            }

        });


        // 尺寸和試穿表光箱
        $('.tryon').click(function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            $('.sizechart').removeClass('d-none');
            $('.lightbox_background').addClass('open');

            $('.rwd-sizechart').removeClass('rwd-none');
        });

        $('.g-detail').click(function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            $('.moreinfo').removeClass('d-none');
            $('.lightbox_background').addClass('open');

            $('.rwd-moreinfo').removeClass('rwd-none');
        });


        $('.lightbox_background').click(function(event) {

            $('.lightbox_background').removeClass('open');
            $('.sizechart').addClass('d-none');
            $('.moreinfo').addClass('d-none');
            $('#infosizela').removeClass('open');
            $('#infola').removeClass('open');
            $('#addcartframe').removeClass('open');


            $('.rwd-sizechart').addClass('rwd-none');
            $('.rwd-moreinfo').addClass('rwd-none');
        });


        // 輪播照片


        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 40,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });


        var swiper2 = new Swiper(".mySwiper2", {
            slidesPerView: 2,
            spaceBetween: 15,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });



        // 點擊顏色觸發事件


        $('.color_code').click(function() {


            // console.log($(this).index());
            // console.log('this.data.value', $(this).data('prod-colorcode'));

            // $('#btn_set_cart').attr('data-prod-foto', '')


            // 從隱藏的東西抓產品ＩＤ的值
            let hiddenId = $('.hiddenId').data('id');
            // console.log($('.hiddenId').data('id'));
            // console.log('test my hidden id:', hiddenId);

            function padding(num, exp_length) {
                for (let len = (num + '').length; len < exp_length; len = num.length) {
                    num = '0' + num;
                }
                return num;
            }

            hiddenId = padding(hiddenId, 3);

            // 為何不行
            $('#btn_set_cart').attr('data-prod-colorcode', $(this).data('prod-colorcode'))

            // 用串的方式拼成prod-foto

            let prod_foto = `${hiddenId}-${$(this).index()+1}-5.jpg`;
            $('#btn_set_cart').attr('data-prod-foto', prod_foto)


            $('#match_color').attr('data-matchColor', $(this).data('value'))

            $('.a').attr('style', `
                background-image: url(./img/RAW_images/${hiddenId}-${$(this).index() + 1}-1.jpg`);
            $('.b').attr('style', `
                background-image: url(./img/RAW_images/${hiddenId}-${$(this).index() + 1}-2.jpg`);
            $('.c').attr('style', `
                background-image: url(./img/RAW_images/${hiddenId}-${$(this).index() + 1}-3.jpg`);
            $('.d').attr('style', `
                background-image: url(./img/RAW_images/${hiddenId}-${$(this).index() + 1}-4.jpg`);
            $('.e').attr('style', `
                background-image: url(./img/RAW_images/${hiddenId}-${$(this).index() + 1}-5.jpg`);

            // console.log('colorbook:', $('.colorbook').eq($(this).index()).text().trim());

            let colorname = $('.colorbook').eq($(this).index()).text().trim();

            $('#color_name').text($('.colorbook').eq($(this).index()).text().trim());
            $('#btn_set_cart').attr('data-colorcodename', colorname)
            $('#match_color').text($('.colorbook').eq($(this).index()).text().trim());

            $('#match_ball').css('background-color', `${$(this).attr('data-prod-colorcode')}`)

            // console.log('mymatchcolor:', $('#match_color').text($('.colorbook').eq($(this).index()).text().trim()));

            $('.tag1area').text($('.tagBook').eq($(this).index()).text());
        })

        // 數量計算


        $(function() {
            var t = $("#cart_qty");
            $("#cart_plus").click(function() {
                t.val(parseInt(t.val()) + 1)
            });
            $("#cart_minus").click(function() {
                if (parseInt(t.val()) - 1 < 1) return false;
                t.val(parseInt(t.val()) - 1)
            });

        });






        // recommend



        $(document).on('click', '.color_code', function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();
            var colormatch1 = $(this).attr('data-colormatch1'),
                colormatch2 = $(this).attr('data-colormatch2');
            // alert(colormatch1 + colormatch2);
            $('div#ss').html('');
            $('div#ss').append('<div class="swiper mySwiper"><div class="swiper-wrapper"></div><div class="swiper-button-next"><img src="./svg/chevron-right.svg" alt=""></div><div class="swiper-button-prev"><img src="./svg/chevron-left.svg" alt=""></div></div>');

            $('.swiper-wrapper').load("recommend_goods.php", {
                colormatch1: colormatch1,
                colormatch2: colormatch2


            }, function(data) {
                // console.log(data)

                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 4,
                    spaceBetween: 40,
                    slidesPerGroup: 1,
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                });

            });

        });

        $('.raw_goods_index_add_goods_to_wish_list').click(function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            var id = $('.raw_goods_index_add_goods_to_wish_list').attr('data-id');
            $.get("add_wish_list_goods.php", {
                id
            });


            $('#showup_box_add_wish_list').addClass('open');
        });


        $('#showup_box_add_wish_list_btn').click(function(event) {
            $('#showup_box_add_wish_list').removeClass('open');
        });

        $('.g-size').click(function() {

            $(this).css('background', '#BCAA9A')
            $(this).css('color', 'white')
            $(this).siblings().css('background', 'transparent')
            $(this).siblings().css('color', '#BCAA9A')
        })


        $('.color_code').click(function() {

            $(this).css('border', '3px solid #BCAA9A')
            $(this).css('width', '22px')
            $(this).css('height', '22px')

            $(this).siblings().css('border', '1px solid #BCAA9A')
            $(this).siblings().css('width', '20px')
            $(this).siblings().css('height', '20px')
            // $(this).css('height', '20px')
            $('.g-colorname').attr('style', '')
        })

        $('#addcartframebtn').click(function() {
            $('#addcartframe').removeClass('open');
            $('.lightbox_background').removeClass('open');
        })

        $('#infolabtn').click(function() {
            $('#infola').removeClass('open');
            $('.lightbox_background').removeClass('open');

        })



        $('#infosizelabtn').click(function() {

            console.log('oooooo')
            $('#infosizela').removeClass('open');
            $('.lightbox_background').removeClass('open');

        })
    </script>
</body>

</html>