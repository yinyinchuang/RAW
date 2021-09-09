<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php

$sqlTotal = "SELECT count(1) AS `count` FROM `products`";
if (isset($_GET['keyword'])) {
    $sqlTotal .= "WHERE `prod_name` LIKE '%{$_GET['keyword']}%'";
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
    <?php
    if (isset($_GET['keyword'])) {
    ?>
        <a href="#">目前搜尋：<?= $_GET['keyword'] ?></a>
    <?php
    }
    ?>

</div>


<div class="container twosides_container">
    <div class="product_sidebar_title">
        <h2 class="mobile_title">篩選</h2>
        <div class="product_sidebar">
            <div class="sidebar_sort">
                <div class="sidebar_title">
                    <h2>顯示順序</h2>
                    <div class="sidebar_content">
                        <?php
                        if (isset($_GET['keyword'])) {
                        ?>
                            <a href="?keyword=<?= $_GET['keyword'] ?>&orderby=price&order=asc">價格由低到高</a>
                            <a href="?keyword=<?= $_GET['keyword'] ?>&orderby=price&order=desc">價格由高到低</a>
                            <a href="?keyword=<?= $_GET['keyword'] ?>&orderby=date&order=desc">最新上架</a>
                            <a href="?keyword=<?= $_GET['keyword'] ?>&orderby=date&order=asc">最早上架</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product_list cards">

        <?php
        // 所有商品
        // $sql = "SELECT `prod_id`, `prod_name`, `prod_price`, `prod_1pic`, `prod_5pic` FROM `products` LIMIT {$offset}, {$numPerPage}";

        // 顯示順序
        if (isset($_GET['orderby']) && isset($_GET['order']) && isset($_GET['keyword'])) {
            // 價格低到高
            if ($_GET['orderby'] === 'price' && $_GET['order'] == 'asc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_name` LIKE '%{$_GET['keyword']}%'  
                ORDER BY `products`.`prod_price` ASC LIMIT {$offset}, {$numPerPage}";
            }
            // 價格高到低
            if ($_GET['orderby'] === 'price' && $_GET['order'] == 'desc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_name` LIKE '%{$_GET['keyword']}%'
                ORDER BY `products`.`prod_price` DESC LIMIT {$offset}, {$numPerPage}";
            }
            // 最新上架
            if ($_GET['orderby'] === 'date' && $_GET['order'] == 'desc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_name` LIKE '%{$_GET['keyword']}%' 
                ORDER BY `products`.`prod_id` DESC LIMIT {$offset}, {$numPerPage}";
            }
            // 最早上架
            if ($_GET['orderby'] === 'date' && $_GET['order'] == 'asc') {
                $sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_name` LIKE '%{$_GET['keyword']}%'
                ORDER BY `products`.`prod_id` ASC LIMIT {$offset}, {$numPerPage}";
            }
        } elseif (isset($_GET['keyword'])) {
            $sql = "SELECT `prod_id`, `prod_name`, `prod_price`, `prod_1pic`, `prod_5pic` FROM `products` WHERE `prod_name` LIKE '%{$_GET['keyword']}%'";
        } else {
            $sql = "SELECT `prod_id`, `prod_name`, `prod_price`, `prod_1pic`, `prod_5pic` FROM `products` ORDER BY `products`.`prod_name` ASC LIMIT {$offset}, {$numPerPage}";
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
                    <li class="page-item <?= $strClass; ?>">
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
</body>

</html>