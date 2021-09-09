<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `products` WHERE `prod_id`>50 && `prod_id`<100;";
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
    <a href="./home.php">首頁</a>/<a href="./features_fashion.php">Features</a>/<a href="./features_lookbook.php">Lookbook</a>/<a href="./features_lookbook_detail2.php">Lookbook內頁</a>
</div>
<!-- title_box -->
<div class="container title_box title_box_rwd_show">
    <a href="./features_fashion.php" class="title_box3">Fashion</a>
    <a href="./features_lookbook.php" class="title_box3 title_box_active">Lookbook</a>
    <a href="./features_member.php" class="title_box3 ">Member</a>
</div>
<!-- cards -->
<div class="container cards">
    <?php
    $sql = "SELECT * FROM `products` WHERE `prod_id`>50 && `prod_id`<100 LIMIT {$offset}, {$numPerPage}";
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
            // $img_link=
    ?>
            <div class="lookbook_photo_card">
                <img src="img/RAW_images/<?= str_pad($obj['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-2.jpg" alt="" class="lookbook_photo_img lookbook_photo_card_lblink" data-value="<?= str_pad($obj['prod_id'], 3, "0", STR_PAD_LEFT) ?>" data-tag1="<?= $obj['tag1'] ?>" data-tag2="<?= $obj['tag2'] ?>" data-tag3="<?= $obj['tag3'] ?>" data-id="<?= $obj['prod_id'] ?>">
                <a href="#" class="lookbook_photo_heart_in_lookbook" data-id="<?= $obj['prod_id'] ?>">
                    <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                </a>
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
                    <a class="page-link" href="features_lookbook_detail2.php?page=<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
        <?php
            }
        }
        ?>
        <!-- <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">></a> -->
    </div>
</div>
<!-- 彈出光箱 -->
<div class="lookbook_lightbox_container">
    <img src="./svg/close.svg" alt="" class="lookbook_lightbox_close">
    <div class="lookbook_lightbox_content">
        <div class="lookbook_lightbox_product">
            <div class="lookbook_photo_card_lb">
                <img src="./img/fashion2.jpg" alt="" class="lookbook_photo_img" id="lookbook-photo-img-main">
                <a href="#" id="lookbook-photo-img-main-heart">
                    <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                </a>
            </div>
        </div>
        <div class="lookbook_lightbox_right">

            <div class="lookbook_lightbox_title">搭配服飾</div>
            <div class="lookbook_lightbox_photo">

                <div class="lookbook_lightbox_photo_card">
                    <a href="#" id="lookbook-photo-img-one-a">
                        <img src="./img/fashion2.jpg" alt="" class="lookbook_lightbox_photo_img" id="lookbook-photo-img-one">
                    </a>
                    <a href="#" id="lookbook-photo-img-card-heart-one">
                        <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                    </a>
                </div>
                <div class="lookbook_lightbox_photo_card">
                    <a href="#" id="lookbook-photo-img-two-a">
                        <img src="./img/fashion2.jpg" alt="" class="lookbook_lightbox_photo_img" id="lookbook-photo-img-two">
                    </a>
                    <a href="#" id="lookbook-photo-img-card-heart-two">
                        <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                    </a>
                </div>
                <div class="lookbook_lightbox_photo_card">
                    <a href="#" id="lookbook-photo-img-three-a">
                        <img src="./img/fashion2.jpg" alt="" class="lookbook_lightbox_photo_img" id="lookbook-photo-img-three">
                    </a>
                    <a href="#" id="lookbook-photo-img-card-heart-three">
                        <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                    </a>
                </div>
            </div>
            <div class="lookbook_lightbox_tag">
                <a href="#" class="lightbox_tag" id="lightbox-tag1">#tag</a>
                <a href="#" class="lightbox_tag" id="lightbox-tag2">#tag</a>
                <a href="#" class="lightbox_tag" id="lightbox-tag3">#tag</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- len -->
<script src="./js/js-len/main.js"></script>
</body>

</html>