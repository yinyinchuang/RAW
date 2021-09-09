<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `products` ";
if (isset($_GET['sub_cat_id'])) {
    $sqlTotal .= "WHERE `cat_id` = {$_GET['sub_cat_id']}";
}
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

//每頁幾筆
$numPerPage = 24;

// 總頁數，ceil()為無條件進位
$totalPages = ceil($totalRows / $numPerPage);

//目前第幾頁
$page = (isset($_GET['page']) && $_GET['page'] > 0) ? (int)$_GET['page'] : 1;

//計算分頁偏移量
$offset = ($page - 1) * $numPerPage;
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
    <link rel="stylesheet" href="./css/css-yin/product_list.css">
</head>

<?php require_once 'tpl/head.inc.php' ?>

<!-- breadcrumb -->
<div class="container breadcrumb">
    <!-- <a href="#">首頁</a>/<a href="#">女裝</a>/<a href="#">所有商品</a> -->
    <?php
    if (isset($_GET['sub_cat_id'])) {
        // echo $_GET['sub_cat_id'];
        $sql = "SELECT `cat1`, `cat2` FROM `products` WHERE `cat_id` = {$_GET['sub_cat_id']}";
        $stmt = $pdo->query($sql);
        if ($stmt->rowCount() > 0) {
            $obj = $stmt->fetch();
            // foreach ($arr as $obj) {
    ?>
            <a href="./home.php">首頁</a>/<a href="#"><?= $obj['cat1'] ?></a>/<a href="#"><?= $obj['cat2'] ?></a>
        <?php
            // }
        }
    } else {
        ?>
        <a href="./home.php">首頁</a>/<a href="#">所有商品</a>

    <?php

    }
    ?>
</div>

<div class="container twosides_container">
    <div class="product_sidebar_title">
        <h2 class="mobile_title">篩選</h2>
        <div class="product_sidebar">
            <div class="sidebar_sort sidebar_underline">
                <div class="sidebar_title">
                    <h2>顯示順序</h2>
                    <div class="sidebar_content">
                        <a href="?orderby=price&order=asc" data-low-id="lowtohigh">價格由低到高</a>
                        <a href="?orderby=price&order=desc" data-high-id="hightolow">價格由高到低</a>
                        <a href="?orderby=date&order=desc" data-new-id="lastest">最新上架</a>
                        <a href="?orderby=date&order=asc" data-old-id="oldest">最早上架</a>
                    </div>
                </div>
            </div>
            <div class="sidebar_category">
                <!-- 女裝 -->
                <div class="category_women sidebar_underline">
                    <h3 class="women_title_show">女裝</h3>
                    <h2 class="gender_title women_title">女裝</h2>
                    <?php
                    $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `parent_id` = 1 ";
                    $stmt = $pdo->query($sql);
                    if ($stmt->rowCount() > 0) {

                        // 如果查詢結果很多筆
                        // $stmt->fetchAll()

                        // 如果查詢只有一筆
                        // $stmt->fetch()

                        $arr = $stmt->fetchAll();
                        foreach ($arr as $obj) {
                    ?>
                            <div class="sidebar_title">
                                <h2><?= $obj['cat_name'] ?></h2>
                                <?php
                                $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `parent_id` = {$obj['cat_id']} ";
                                $stmt = $pdo->query($sql);
                                if ($stmt->rowCount() > 0) {
                                    $arr = $stmt->fetchAll();
                                    foreach ($arr as $obj) {
                                ?>
                                        <div class="sidebar_content">
                                            <a href="?cat_id=<?= $obj['cat_id'] ?>&sub_cat_id=<?= $obj['cat_id'] ?>" ?><?= $obj['cat_name'] ?></a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <!-- 男裝 -->
                <div class="category_women sidebar_underline">
                    <h3 class="women_title_show">男裝</h3>
                    <h2 class="gender_title women_title">男裝</h2>
                    <?php
                    $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `parent_id` = 17 ";
                    $stmt = $pdo->query($sql);
                    if ($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll();
                        foreach ($arr as $obj) {
                    ?>
                            <div class="sidebar_title">
                                <h2><?= $obj['cat_name'] ?></h2>
                                <?php
                                $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `parent_id` = {$obj['cat_id']} ";
                                $stmt = $pdo->query($sql);
                                if ($stmt->rowCount() > 0) {
                                    $arr = $stmt->fetchAll();
                                    foreach ($arr as $obj) {
                                ?>
                                        <div class="sidebar_content">
                                            <a href="?cat_id=<?= $obj['cat_id'] ?>&sub_cat_id=<?= $obj['cat_id'] ?>" ?><?= $obj['cat_name'] ?></a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <!-- 配件 -->
                <div class="sidebar_title sidebar_underline">
                    <?php
                    $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `cat_id` = 29 ";
                    $stmt = $pdo->query($sql);
                    if ($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll();
                        foreach ($arr as $obj) {
                    ?>
                            <h2><?= $obj['cat_name'] ?></h2>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `parent_id` = 29 ";
                    $stmt = $pdo->query($sql);
                    if ($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll();
                        foreach ($arr as $obj) {
                    ?>
                            <div class="sidebar_content">
                                <a href="?sub_cat_id=<?= $obj['cat_id'] ?>"><?= $obj['cat_name'] ?></a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <!-- 選物 -->
                <div class="sidebar_title sidebar_underline">
                    <?php
                    $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `cat_id` = 32 ";
                    $stmt = $pdo->query($sql);
                    if ($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll();
                        foreach ($arr as $obj) {
                    ?>
                            <h2><?= $obj['cat_name'] ?></h2>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    $sql = "SELECT `cat_name`, `cat_id` FROM `category` WHERE `parent_id` = 32 ";
                    $stmt = $pdo->query($sql);
                    if ($stmt->rowCount() > 0) {
                        $arr = $stmt->fetchAll();
                        foreach ($arr as $obj) {
                    ?>
                            <div class="sidebar_content">
                                <a href="?sub_cat_id=<?= $obj['cat_id'] ?>"><?= $obj['cat_name'] ?></a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="sidebar_filter">
                <div class="sidebar_title">
                    <h2>價格</h2>
                    <div class="filter_price">
                        <div class="range-slider">
                            <input value="390" min="390" max="5000" step="10" type="range" />
                            <input value="5000" min="390" max="5000" step="10" type="range" />

                            <div class="price_input" onchange="myPrice()">
                                <input type="number" value="390" min="390" max="5000" id="price_input1" />
                                <input type="number" value="5000" min="390" max="5000" id="price_input2" />
                            </div>
                        </div>
                    </div>

                    <!-- <a href="?pricelow=1000&pricehigh=3000" class="fake_price_a">
                        <div class="fake_price"></div>
                    </a> -->

                </div>
                <div class="sidebar_title">
                    <h2>顏色</h2>
                    <div class="filter_color">
                        <a href="?color=1" data-color="ACA394" class="color_link">
                            <div class="color_circle color_circle1"></div>
                        </a>
                        <a href="?color=2" data-color="BCAA9A" class="color_link">
                            <div class="color_circle color_circle2"></div>
                        </a>
                        <a href="?color=3" data-color="C29779" class="color_link">
                            <div class="color_circle color_circle3"></div>
                        </a>
                        <a href="?color=4" data-color="A76350" class="color_link">
                            <div class="color_circle color_circle4"></div>
                        </a>
                        <a href="?color=5" data-color="C19280" class="color_link">
                            <div class="color_circle color_circle5"></div>
                        </a>
                        <a href="?color=6" data-color="9A514A" class="color_link">
                            <div class="color_circle color_circle6"></div>
                        </a>
                        <a href="?color=7" data-color="F0E5CF" class="color_link">
                            <div class="color_circle color_circle7"></div>
                        </a>
                        <a href="?color=8" data-color="EDDDC3" class="color_link">
                            <div class="color_circle color_circle8"></div>
                        </a>
                        <a href="?color=9" data-color="D9C6A5" class="color_link">
                            <div class="color_circle color_circle9"></div>
                        </a>
                        <a href="?color=10" data-color="946D46" class="color_link">
                            <div class="color_circle color_circle10"></div>
                        </a>
                        <a href="?color=11" data-color="E7C48A" class="color_link">
                            <div class="color_circle color_circle11"></div>
                        </a>
                        <a href="?color=12" data-color="AAA57F" class="color_link">
                            <div class="color_circle color_circle12"></div>
                        </a>
                        <a href="?color=13" data-color="AC9762" class="color_link">
                            <div class="color_circle color_circle13"></div>
                        </a>
                        <a href="?color=14" data-color="3F4F45" class="color_link">
                            <div class="color_circle color_circle14"></div>
                        </a>
                        <a href="?color=15" data-color="6C817C" class="color_link">
                            <div class="color_circle color_circle15"></div>
                        </a>
                        <a href="?color=16" data-color="DEE1C4" class="color_link">
                            <div class="color_circle color_circle16"></div>
                        </a>
                        <a href="?color=17" data-color="0A5D75" class="color_link">
                            <div class="color_circle color_circle17"></div>
                        </a>
                        <a href="?color=18" data-color="5D6186" class="color_link">
                            <div class="color_circle color_circle18"></div>
                        </a>
                        <a href="?color=19" data-color="000000" class="color_link">
                            <div class="color_circle color_circle19"></div>
                        </a>
                        <a href="?color=20" data-color="FFFFFF" class="color_link">
                            <div class="color_circle color_circle20"></div>
                        </a>
                    </div>
                </div>

                <!-- <div class="sidebar_title">
                    <h2>品牌</h2>
                    <div class="filter_brand">
                        <p>
                            <input type="radio" id="radio-brand1" name="radio-brand" value="RAW">
                            <label for="radio-brand1">RAW</label>
                        </p>
                        <p>
                            <input type="radio" id="radio-brand2" name="radio-brand" value="Planet">
                            <label for="radio-brand2">Planet</label>
                        </p>
                        <p>
                            <input type="radio" id="radio-brand3" name="radio-brand" value="Raven Studio">
                            <label for="radio-brand3">Raven Studio</label>
                        </p>
                        <p>
                            <input type="radio" id="radio-brand4" name="radio-brand" value="92pleats">
                            <label for="radio-brand4">92pleats</label>
                        </p>

                    </div>

                </div> -->
            </div>

            <!-- <button type="button" class="product_sidebar_button">儲存搜尋條件</button> -->
            <button type="button" class="product_sidebar_button" onclick="history.back();">清除篩選</button>
        </div>
    </div>



    <div class="product_list cards">
        <?php
        if (isset($_GET['sub_cat_id'])) {
            // 選分類後選顏色
            if (isset($_GET['cat_id']) && isset($_GET['color'])) {
                // print_r($_GET);
                $sql = "SELECT `products`.`prod_id`, `prod_name`, `prod_price` FROM `products` INNER JOIN `products_detail` ON `products_detail`.`prod_id` = `products`.`prod_id` WHERE `cat_id` = {$_GET['sub_cat_id']} AND `color_code` = '#{$_GET['color']}' LIMIT {$offset}, {$numPerPage}";
                // echo $sql;
            } else {
                // 顯示配件、選物
                $sql = "SELECT * FROM `products` WHERE `cat_id` = {$_GET['sub_cat_id']} LIMIT {$offset}, {$numPerPage}";
            }
        } elseif (isset($_GET['orderby']) && isset($_GET['order'])) {
            // 價格低到高
            if ($_GET['orderby'] === 'price' && $_GET['order'] == 'asc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` ORDER BY `products`.`prod_price` ASC LIMIT {$offset}, {$numPerPage}";
            }
            // 價格高到低
            if ($_GET['orderby'] === 'price' && $_GET['order'] == 'desc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` ORDER BY `products`.`prod_price` DESC LIMIT {$offset}, {$numPerPage}";
            }
            // 最新上架
            if ($_GET['orderby'] === 'date' && $_GET['order'] == 'desc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` ORDER BY `products`.`prod_id` DESC LIMIT {$offset}, {$numPerPage}";
            }
            // 最早上架
            if ($_GET['orderby'] === 'date' && $_GET['order'] == 'asc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` ORDER BY `products`.`prod_id` ASC LIMIT {$offset}, {$numPerPage}";
            }
        } elseif (isset($_GET['color'])) {
            // 顏色篩選
            $sql = "SELECT `products`.`prod_id`, `prod_name`, `prod_price` FROM `products` INNER JOIN `products_detail` ON `products_detail`.`prod_id` = `products`.`prod_id` WHERE `color_code` = '#{$_GET['color']}' LIMIT {$offset}, {$numPerPage}";
        } elseif (isset($_GET['pricelow'])) {
            // 假的篩價錢
            $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_price` BETWEEN '1000' AND '3000' LIMIT {$offset}, {$numPerPage}";
        } else {
            // 顯示全部
            $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` ORDER BY `products`.`tag2` ASC LIMIT {$offset}, {$numPerPage}";
        }

        $stmt = $pdo->query($sql);
        // if ($stmt->rowCount() > 0) {
        $arr = $stmt->fetchAll();
        foreach ($arr as $obj) {
        ?>
            <div class="product_card">
                <a href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                    <img src="img/RAW_images/<?= str_pad($obj['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-1.jpg" alt="" class="product_img">
                </a>
                <a href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>" class="product_img2">
                    <img src="img/RAW_images/<?= str_pad($obj['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-5.jpg" alt="" class="product_img">
                </a>
                <div class="product_card_content_box">
                    <div class="product_card_content_box_title">
                        <a href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                            <p class="product_card_content"><?= $obj['prod_name'] ?></p>
                        </a>
                        <a href="#" data-id="<?= $obj['prod_id'] ?>" class="product_list_heart">
                            <img src="./svg/heart.svg" alt="">
                        </a>
                    </div>
                    <a href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                        <p class="product_card_content">NT.<?= number_format($obj['prod_price']) ?></p>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- page -->
        <div class="product_pagination">
            <?php
            //列出所有分頁連結
            for ($i = 1; $i <= $totalPages; $i++) {

                //當「目前第幾頁」($page)等於準備顯示在網頁上的分頁號碼($i)，以加上 class
                $strClass = '';
                if ($page === $i) $strClass = 'active';

                //$i 列出的數字範圍，會大於「目前第幾頁」($page) 減 5，以及小於「目前第幾頁」($page) 加 5
                if ($i > $page - 3 && $i < $page + 3) {
            ?>
                    <li class="page-item <?= $strClass; ?>" data-page="<?= $i ?>">
                        <a class="page-link" href="product_list_all.php?page=<?= $i ?>">
                            <?= $i ?>
                        </a>
                    </li>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>



<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/js-yin/product_list.js"></script>
<script src="./js/js-yin/filter_price.js"></script>
<script>
    $('.filter_price').click(function(event) {
        var price_input1 = $('#price_input1').val(),
            price_input2 = $('#price_input2').val(),
            page = $('li.active').attr('data-page');

        console.log(price_input1 + price_input2);
        $('.product_list.cards').load("sidebar_filter_price.php", {
            price_input1: price_input1,
            price_input2: price_input2,
            page: page
        });
    });
</script>
</body>


</html>