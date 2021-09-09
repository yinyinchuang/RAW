<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<?php if (!isset($_SESSION['email'])) {
    header("Location: singup_login_switch.php");
    exit();
}
?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `wish_list`
INNER JOIN`products`
ON `wish_list`.`prod_id`=`products`.`prod_id`
WHERE `email`='{$_SESSION['email']}' && `wish_list`.`class`='goods';";
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

//每頁幾筆
$numPerPage = 16;

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
</head>

<?php require_once 'tpl/head.inc.php' ?>
<!-- breadcrumb -->
<div class="container breadcrumb">
    <a href="./home.php">首頁</a>/<a href="./wish_list_goods.php">我的收藏</a>/<a href="./wish_list_goods.php">Goods</a>
</div>
<!-- title_box -->
<div class="container title_box">
    <a href="./wish_list_goods.php" class="title_box4 title_box_active">Goods</a>
    <a href="./wish_list_fashion.php" class="title_box4">Fashion</a>
    <a href="./wish_list_lookbook.php" class="title_box4">Lookbook</a>
    <a href="./wish_list_member.php" class="title_box4">Member</a>
</div>
<div class="pc_dn_select">
    <select class="container select_title_box">
        <option value="wish_list_goods">Goods</option>
        <option value="wish_list_fashion">Fashion</option>
        <option value="wish_list_lookbook">Lookbook</option>
        <option value="wish_list_member">Member</option>
    </select>
</div>
<!-- cards -->
<div class="container cards wish_h">
    <?php

    $sql = "SELECT * 
    FROM `wish_list`
    INNER JOIN`products`
    ON `wish_list`.`prod_id`=`products`.`prod_id`
    WHERE `email`='{$_SESSION['email']}' && `wish_list`.`class`='goods'
    LIMIT {$offset}, {$numPerPage}";
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        /**
         * 如果查詢結果很多筆
         * $stmt->fetchAll()
         * 
         * 如果查詢只有一筆
         * $stmt->fetch()
         */
        $arr = $stmt->fetchAll();
        foreach ($arr as $obj) {
    ?>
            <div class="lookbook_photo_card_good">
                <a href="./raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                    <img src="./img/RAW_images/<?= $obj['prod_1pic'] ?>" alt="" class="lookbook_photo_img">
                </a>
                <a href="./raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>" class="lookbook_photo_img2">
                    <img src="./img/RAW_images/<?= $obj['prod_5pic'] ?>" alt="" class="lookbook_photo_img">
                </a>

                <a href="#" class="lookbook_photo_delete_in_goods" data-id="<?= $obj['id'] ?>">
                    <img src="./svg/delete.svg" alt="" class="lookbook_photo_delete">
                </a>
                <div class="card_content_box">
                    <a href="./raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
                        <p class="card_content"><?= $obj['prod_name'] ?></p>
                        <p class="card_content">NT.<?= number_format($obj['prod_price']) ?></p>
                    </a>
                </div>
            </div>
    <?php
        }
    }
    ?>
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
                    <a class="page-link" href="wish_list_goods.php?page=<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- len -->
<script src="./js/js-len/main.js"></script>
</body>

</html>