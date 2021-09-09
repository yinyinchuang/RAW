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
    <link rel="stylesheet" href="./css/css-len/swiper-bundle.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <style>
        h2 {
            font-size: 24px;
            line-height: 32px;
        }

        p {
            font-size: 20px;
            line-height: 32px;
        }

        .fashion_hero {
            width: 100%;
            height: calc(100vh - 80px);
            /* object-fit: cover; */
        }

        .fashion_hero_text {
            position: absolute;
            width: 100%;
            height: calc(100vh - 80px);
            /* top: 0; */
        }

        .fashion_content_box {
            margin-top: 100vh;
        }

        .fashion_info {
            display: flex;
            margin-bottom: 80px;
            flex-wrap: wrap;
        }

        .fashion_info_left,
        .fashion_info_right,
        .fashion_info_right2,
        .fashion_info_right3 {
            width: 50%;
            height: 450px;

        }

        .fashion_info_left {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
        }




        .lookbook_photo_card_in_sw,
        .lookbook_photo_card_in_sw img {
            width: 300px;
            height: 400px;
        }

        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 400px;
        }

        /* .lookbook_photo_img2 {
            position: absolute;
            width: 100%;
            height: 100%;
        } */
        .swiper_bt_inf {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }


        .box_hide_swiper {
            position: absolute;
            height: 100%;
            width: 450px;
            background: #FAFAFA;
            right: 0;

        }

        .mySwiper3_box {
            position: absolute;
            right: 0;
            width: 300px;
            overflow: hidden;
        }

        .mySwiper2 .swiper-slide,
        .mySwiper2 .lookbook_photo_card_in_sw,
        .mySwiper2 .lookbook_photo_card_in_sw img {
            width: 282px;
            height: 376px;
        }
    </style>
</head>

<?php require_once 'tpl/head.inc.php' ?>

<!-- hero img -->
<img src="./img/fashion-1000-hero.jpg" alt="" class="fashion_hero">
<img src="./img/fashion-1000-text.png" alt="" class="fashion_hero_text">
<!-- breadcrumb -->
<div class="container">
    <div class="breadcrumb breadcrumb_infashion">
        <a href="./home.php">首頁</a>/<a href="./features_fashion.php">Features</a>/<a href="./features_fashion.php">Fashion</a>/<a href="./features_fashion_detail1.php">RAW X 美食水水千千</a>
    </div>
</div>
<!-- content -->
<div class="fashion_content_box">
    <div class="container">
        <div class="fashion_info">
            <div class="fashion_info_left">
                <h2>大家好我是美食水水千千</h2>
                <br>
                <p>『因為每一天的自己都跟過去的自己不太一樣，<br>
                    所以沒有特別預設應該成為什麼樣子。』</p>

            </div>
            <div class="fashion_info_right swiper-container">
                <div class="fashion_info_right_imgs swiper-wrapper">
                    <div class="swiper-slide"><img src="./img/fashion-1000-1.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="./img/fashion-1000-2.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="./img/fashion-1000-3.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="./img/fashion-1000-4.jpg" alt=""></div>
                </div>
            </div>
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
            <p class="fashion_prod_more"><a href="#">MORE +</a></p>
        </div>
        <div class="fashion_info">
            <div class="fashion_info_left">
                <p>『只要可以好好的活過這一天、<br>
                    每天可以讓自己有些改變，就是最好的自己。』<br><br>
                    千千說，『我不像要讓自己只是停留在原地』</p>
            </div>
            <div class=" swiper-container fashion_info_right2">
                <div class="fashion_info_right_imgs swiper-wrapper">
                    <div class="swiper-slide"><img src="./img/fashion-1000-5.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="./img/fashion-1000-6.jpg" alt=""></div>
                </div>
            </div>
            <div class=" swiper-container fashion_info_right3">
                <div class="fashion_info_right_imgs swiper-wrapper">
                    <div class="swiper-slide"><img src="./img/fashion-1000-7.jpg" alt=""></div>
                    <div class="swiper-slide"><img src="./img/fashion-1000-8.jpg" alt=""></div>
                </div>
            </div>
            <div class="fashion_info_left">
                <p>無視旁人目光—<br>
                    人生的樣子，自己決定吧！
                </p>
            </div>
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
            <p class="fashion_prod_more"><a href="#">MORE +</a></p>
        </div>
        <div class="swiper_bt_inf">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-1.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-5.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-4.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-3.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-2.jpg" alt="">
                    </div>
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
            <div class="box_hide_swiper">

            </div>
            <div class="mySwiper3_box">
                <div class="swiper mySwiper3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/308-1-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/308-1-2.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/308-1-3.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/308-1-4.jpg" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/RAW_images/308-1-5.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper_bt_inf">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-1.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-2.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-3.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-4.jpg" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/RAW_images/308-1-5.jpg" alt="">
                    </div>
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    </div>

</div>

<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- len -->
<script src="./js/js-len/scrollreveal.min.js"></script>
<script src="./js/js-len/swiper-bundle.min.js"></script>
<script src="./js/js-len/main.js"></script>
<script>
    var swiper = new Swiper(".fashion_info_right", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper2 = new Swiper(".fashion_info_right2", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper3 = new Swiper(".fashion_info_right3", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    const sr = ScrollReveal({
        distance: '50px',
        duration: 3000,
        reset: true,
    })

    sr.reveal(`.fashion_hero_text, .lookbook_photo_card, .fashion_prod_more, .fashion_prod_title, .fashion_info_right, .fashion_info_right2, .fashion_info_right3, .fashion_info_left, .swiper_bt_inf`, {
        origin: 'bottom',
        interval: 100,
    })
    var swiper4 = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 80,
            depth: 200,
            modifier: 1,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
    var swiper5 = new Swiper(".mySwiper2", {
        slidesPerView: 4,
        spaceBetween: 24,
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
    var swiper6 = new Swiper(".mySwiper3", {
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>
</body>

</html>