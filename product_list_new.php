<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `products` ";
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

//每頁幾筆
$numPerPage = 18;

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
    <a href="./home.php">首頁</a>/<a href="＃">新品</a>
</div>


<div class="container twosides_container">
    <div class="product_sidebar_title">
        <h2 class="mobile_title">篩選</h2>
        <div class="product_sidebar">
            <div class="sidebar_sort sidebar_underline">
                <div class="sidebar_title">
                    <h2>顯示順序</h2>
                    <div class="sidebar_content">
                        <a href="?orderby=price&order=asc">價格由低到高</a>
                        <a href="?orderby=price&order=desc">價格由高到低</a>
                        <a href="?orderby=date&order=desc">最新上架</a>
                        <a href="?orderby=date&order=asc">最早上架</a>
                    </div>
                </div>
            </div>

            <div class="sidebar_category">
                <!-- <div class="sidebar_title"> -->
                <!-- <h2>系列</h2> -->
                <div class="sidebar_content_new">
                    <a href="?series=5">
                        <h3>RAW X 美食水水千千</h3>
                    </a>
                    <a href="?series=1">
                        <h3>關於台北系列</h3>
                    </a>
                    <a href="?series=2">
                        <h3>Fall is coming</h3>
                    </a>
                    <a href="?series=3">
                        <h3>Basic T-shirt Collection</h3>
                    </a>
                    <a href="?series=4">
                        <h3>大人的暑假</h3>
                    </a>
                </div>
                <!-- </div> -->

            </div>

        </div>
    </div>


    <div class="product_list cards">

        <?php

        if (isset($_GET['series'])) {
            if ($_GET['series'] && $_GET['series'] == '1') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` >= '151' && `prod_id` <= '168'";
            }
            if ($_GET['series'] && $_GET['series'] == '2') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` >= '201' && `prod_id` <= '218'";
            }
            if ($_GET['series'] && $_GET['series'] == '3') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` >= '219' && `prod_id` <= '236'";
            }
            if ($_GET['series'] && $_GET['series'] == '4') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` >= '251' && `prod_id` <= '268'";
            }
            if ($_GET['series'] && $_GET['series'] == '5') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` >= '301' && `prod_id` <= '308'";
            }
        } elseif (isset($_GET['orderby']) && isset($_GET['order'])) {
            // 價格低到高
            if ($_GET['orderby'] === 'price' && $_GET['order'] == 'asc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` BETWEEN 151 AND 268 AND `prod_id` NOT BETWEEN 169 AND 176 ORDER BY `products`.`prod_price` ASC LIMIT {$offset}, {$numPerPage}";
            }
            // 價格高到低
            if ($_GET['orderby'] === 'price' && $_GET['order'] == 'desc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` BETWEEN 151 AND 268 AND `prod_id` NOT BETWEEN 169 AND 176 ORDER BY `products`.`prod_price` DESC LIMIT {$offset}, {$numPerPage}";
            }
            // 最新上架
            if ($_GET['orderby'] === 'date' && $_GET['order'] == 'desc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` BETWEEN 151 AND 268 AND `prod_id` NOT BETWEEN 169 AND 176 ORDER BY `products`.`prod_id` DESC LIMIT {$offset}, {$numPerPage}";
            }
            // 最早上架
            if ($_GET['orderby'] === 'date' && $_GET['order'] == 'asc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` BETWEEN 151 AND 268 AND `prod_id` NOT BETWEEN 169 AND 176 ORDER BY `products`.`prod_id` ASC LIMIT {$offset}, {$numPerPage}";
            }
        } else {
            $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_id` BETWEEN 151 AND 268 AND `prod_id` NOT BETWEEN 169 AND 176 LIMIT {$offset}, {$numPerPage}";
        }

        $stmt = $pdo->query($sql);
        if ($stmt->rowCount() > 0) {
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
        }
        ?>



    </div>
</div>



<?php require_once 'tpl/foot.inc.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/js-yin/product_list.js"></script>
<script src="./js/js-yin/filter_price.js"></script>
</body>

</html>