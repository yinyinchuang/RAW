<?php

require_once 'db.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAW</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <style>
        .fashion_hero {
            width: 100%;
            height: calc(100vh - 80px);
            /* object-fit: cover; */
        }

        .fashion_content_box {
            margin-top: calc(100vh - 80px);
        }

        @media screen and (max-width: 375px) {
            .fashion_hero {
                height: calc(100vh - 420px);
            }

            .fashion_content_box {
                margin-top: calc(100vh - 420px);
            }
        }
    </style>
</head>

<?php require_once 'tpl/head.inc.php' ?>

<!-- hero img -->
<img src="./img/fashion_hero.jpg" alt="" class="fashion_hero">
<!-- breadcrumb -->
<div class="container">
    <div class="breadcrumb breadcrumb_infashion">
        <a href="./home.php">首頁</a>/<a href="./features_fashion.php">Features</a>/<a href="./features_fashion.php">Fashion</a>/<a href="./features_fashion_detail3.php">RAW X CINDY</a>
    </div>
</div>
<!-- content -->
<div class="fashion_content_box">
    <div class="fashion_background">
    </div>
    <div class="fashion_background2">
    </div>
    <div class="container">
        <div class="fashion_content_imgs">
            <img src="./img/fashion_img2.jpg" alt="" class="fashion_content_img1">
            <img src="./img/fashion1.jpg" alt="" class="fashion_content_img2">
        </div>
        <div class="fashion_prod_link">
            <p class="fashion_prod_title">系列單品</p>
            <div class="cards">
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=301">
                        <img src="./img/RAW_images/301-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=301" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/301-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=302">
                        <img src="./img/RAW_images/302-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=302" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/302-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=303">
                        <img src="./img/RAW_images/303-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=303" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/303-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=304">
                        <img src="./img/RAW_images/304-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=304" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/304-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
            </div>
            <p class="fashion_prod_more"><a href="./product_list_new.php?series=5" target="_blank">MORE +</a></p>
        </div>
        <div class="fashion_content_imgs">
            <img src="./img/fashion8.jpg" alt="" class="fashion_content_img3">
            <img src="./img/fashion_img1.jpg" alt="" class="fashion_content_img4">
        </div>
        <div class="fashion_prod_link">
            <p class="fashion_prod_title">系列單品</p>
            <div class="cards">
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=305">
                        <img src="./img/RAW_images/305-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=305" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/305-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=306">
                        <img src="./img/RAW_images/306-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=306" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/306-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=307">
                        <img src="./img/RAW_images/307-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=307" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/307-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
                <div class="lookbook_photo_card">
                    <a href="./raw_goods_index.php?prod_id=308">
                        <img src="./img/RAW_images/308-1-1.jpg" alt="" class="lookbook_photo_img">
                    </a>
                    <a href="./raw_goods_index.php?prod_id=308" class="lookbook_photo_img2">
                        <img src="./img/RAW_images/308-1-5.jpg" alt="" class="lookbook_photo_img">
                    </a>
                </div>
            </div>
            <p class="fashion_prod_more"><a href="./product_list_new.php?series=5" target="_blank">MORE +</a></p>
        </div>
    </div>

</div>

<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- len -->
<script src="./js/js-len/scrollreveal.min.js"></script>
<script src="./js/js-len/main.js"></script>
<script>
    const sr = ScrollReveal({
        distance: '50px',
        duration: 3000,
        reset: false,
    })

    sr.reveal(`.lookbook_photo_card, .fashion_prod_more, .fashion_content_img1, .fashion_content_img2, .fashion_content_img3, .fashion_content_img4, .fashion_prod_title`, {
        origin: 'bottom',
        interval: 100,
    })
</script>

</body>

</html>