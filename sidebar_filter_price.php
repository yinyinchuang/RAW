<?php

require_once 'db.inc.php';
session_start();

if ($_POST['price_input1']) {
    $price_input1 = $_POST['price_input1'];
} else {
    $price_input1 = 390;
}
if ($_POST['price_input2']) {
    $price_input2 = $_POST['price_input2'];
} else {
    $price_input2 = 5000;
}

$sqlTotal = "SELECT count(1) AS `count` FROM `products` WHERE `prod_price`>=$price_input1 && `prod_price`<= $price_input2 ";
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

<?php
$sql = "SELECT `prod_id`, `prod_name`, `prod_price` FROM `products` WHERE `prod_price`>=$price_input1 && `prod_price`<= $price_input2 LIMIT {$offset}, {$numPerPage}";
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