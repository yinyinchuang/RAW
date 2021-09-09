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
            justify-content: center;
            align-items: center;

        }

        .fashion_info_text {
            width: 60%;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
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
            padding-top: 80px;
            margin-bottom: 80px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 400px;
        }

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
            /* position: absolute; */
            /* right: 0; */
            width: 400px;
            height: 534px;
            overflow: hidden;
        }

        .mySwiper2 .swiper-slide,
        .mySwiper2 .lookbook_photo_card_in_sw,
        .mySwiper2 .lookbook_photo_card_in_sw img {
            width: 282px;
            height: 376px;
        }

        .foto_large {
            width: 100%;
            height: 800px;
            margin-bottom: 80px;
        }

        .foto_large img {
            width: 100%;
            height: 100%;
            /* object-fit: cover; */
        }

        .fashion_info_right2 img,
        .fashion_info_right3 img {
            width: 100%;
            height: 100%;

        }

        .fashion_info2 {
            justify-content: space-between;
            /* height: 400px; */
        }

        .swiper_bt_inf_rwd {
            display: none;
        }

        @media screen and (max-width: 375px) {
            .fashion_hero {
                height: calc(100vh - 420px);
            }

            .fashion_content_box {
                margin-top: calc(100vh - 420px);
            }

            p {
                font-size: 14px;
                line-height: 24px;
            }

            .foto_large {
                width: 100%;
                height: 400px;
                margin-bottom: 32px;
            }

            .fashion_info {
                padding-top: 32px;
                margin-bottom: 32px;
                flex-direction: column;
            }

            .fashion_info_left,
            .fashion_info_right,
            .fashion_info_right2,
            .fashion_info_right3 {
                width: 100%;
                height: 300px;

            }

            .swiper_bt_inf_nrwd {
                display: none;
            }

            .fashion_info2 {
                width: 100%;
                overflow: hidden;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .fashion_info_text {
                width: 100%;
            }

            .fashion_info2 img {
                margin: 0;
            }

            .mySwiper3_box,
            .mySwiper3_box img,
            .lookbook_photo_card_in_sw,
            .lookbook_photo_card_in_sw img {
                /* position: absolute; */
                /* right: 0; */
                width: 345px;
                height: 460px;
                overflow: hidden;
            }

            .fashion_info_right2 {
                margin-bottom: 32px;
            }

            .swiper_bt_inf_rwd {
                display: block;
            }

            .swiper {
                padding-top: 32px;
                margin-bottom: 0px;
            }
        }
    </style>
</head>

<?php require_once 'tpl/head.inc.php' ?>

<!-- hero img -->
<img src="./img/fashion-11-hero.jpg" alt="" class="fashion_hero">
<!-- <img src="./img/fashion-1000-text.png" alt="" class="fashion_hero_text"> -->
<!-- breadcrumb -->
<div class="container">
    <div class="breadcrumb breadcrumb_infashion">
        <a href="./home.php">首頁</a>/<a href="./features_fashion.php">Features</a>/<a href="./features_fashion.php">Fashion</a>/<a href="./features_fashion_detail2.php">RAW X 壹加壹</a>
    </div>
</div>
<!-- content -->
<div class="fashion_content_box">
    <div class="container">
        <div class="swiper_bt_inf swiper_bt_inf_nrwd">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-5.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-6.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-7.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-8.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-9.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-10.png" alt="">
                    </div>

                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
        <div class="swiper_bt_inf swiper_bt_inf_rwd">
            <div class="swiper mySwiper3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-5.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-6.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-7.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-8.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-9.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-10.png" alt="">
                    </div>

                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
        <div class="fashion_info">
            <div class="fashion_info_text">
                <p>細數每一次旅行中各種大小劫難<br>
                    兩人苦中作樂似的；卻也享受著笑著<br>
                    這些沒有腳本的真實經歷，讓每一次的旅程都刻骨銘心</p>
            </div>
        </div>
        <div class="foto_large">
            <img src="./img/fashion-11-1.jpg" alt="">
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

        <div class="fashion_info">
            <div class="fashion_info_left">
                <p>『沒關係，再怎麼難，你的人生我都會陪著你』</p>
            </div>
            <div class=" swiper-container fashion_info_right2">
                <img src="./img/fashion-11-2.png" alt="">
            </div>
            <div class=" swiper-container fashion_info_right3">
                <img src="./img/fashion-11-3.png" alt="">
            </div>
            <div class="fashion_info_left">
                <p>『除非你不要我，不然我不會放棄你』</p>
            </div>
        </div>
        <div class="foto_large">
            <img src="./img/fashion-11-4.png" alt="">
        </div>
        <div class="fashion_info fashion_info2">
            <div class="fashion_info_text">
                <p>讀到這兩句讓人心暖暖的篤定<br>
                    相信兩人在未來也將目標的一致地，繼續並肩前行</p>
            </div>
            <div class="mySwiper3_box">
                <div class="swiper mySwiper3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/fashion-11-11.png" alt="">
                        </div>
                        <div class="swiper-slide lookbook_photo_card_in_sw">
                            <img src="./img/fashion-11-12.png" alt="">
                        </div>
                    </div>
                </div>
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
            <p class="fashion_prod_more"><a href="./product_list_new.php?series=5" target="_blank">MORE +</a></p>
        </div>
        <!-- <div class="swiper_bt_inf">
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
                        <img src="./img/fashion-11-5.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-6.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-7.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-8.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-9.png" alt="">
                    </div>
                    <div class="swiper-slide lookbook_photo_card_in_sw">
                        <img src="./img/fashion-11-10.png" alt="">
                    </div>

                </div>
            </div>
        </div> -->
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
        reset: false,
    })

    sr.reveal(`.fashion_hero_text, .lookbook_photo_card, .fashion_prod_more, .fashion_prod_title, .fashion_info_right, .fashion_info_right2, .fashion_info_right3, .fashion_info_left, .swiper_bt_inf, .foto_large, .fashion_info`, {
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