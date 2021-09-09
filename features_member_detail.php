<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `member_upload` INNER JOIN `products` ON `member_upload`.`prod_id1`=`products`.`prod_id` WHERE `email`='{$_GET['email']}';";
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

//每頁幾筆
$numPerPage = 12;

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
<?php

$sql = "SELECT *
            FROM`members` 
            WHERE `email`='{$_GET['email']}'; ";
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
        <div class="container breadcrumb">
            <a href="./home.php">首頁</a>/<a href="./features_fashion.php">Features</a>/<a href="./features_member.php">Member</a>/<a href="./features_member_detail.php?email=<?= $_GET['email'] ?>"><?= $obj['name'] ?></a>
        </div>
        <!-- title_box -->
        <div class="container title_box">
            <a href="./features_fashion.php" class="title_box3">Fashion</a>
            <a href="./features_lookbook.php" class="title_box3">Lookbook</a>
            <a href="./features_member.php" class="title_box3 title_box_active">Member</a>
        </div>
        <div class="container twosides_container">
            <div class="fashion_card member_detail_box">

                <img src="./img/RAW_images/member_<?= $_GET['email'] ?>.jpg" alt="" class="fashion_img">
                <div class="card_content_box member_person_card">

                    <p class="card_content"><?= $obj['name'] ?></p>
                    <p class="card_content"><?= $obj['height'] ?>cm</p>
                    <div class="card_content_box">
                        <p class="card_content"><?= $obj['heart'] ?>次</p>
                        <img src="./svg/heart.svg" alt="" class="member_person_card_heart">
                    </div>

                </div>
        <?php
    }
}
        ?>
            </div>
            <!-- cards -->
            <div class="cards right_cards">
                <?php
                $sql = "SELECT *
        FROM `member_upload` 
        LEFT JOIN `members` 
        ON `member_upload`.`email`=`members`.`email` 
        LEFT JOIN `products`
        ON`member_upload`.`prod_id1`=`products`.`prod_id`
        WHERE `member_upload`.`email`='{$_GET['email']}'
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

                        <div class="member_photo_card">
                            <img src="./img/RAW_images/<?= $obj['photo'] ?>" alt="" class="lookbook_photo_img member_photo_card_lblink" data-value-main="<?= $obj['photo'] ?>" data-value1="<?= str_pad($obj['prod_id1'], 3, "0", STR_PAD_LEFT) ?>" data-value2="<?= str_pad($obj['prod_id2'], 3, "0", STR_PAD_LEFT) ?>" data-value3="<?= str_pad($obj['prod_id3'], 3, "0", STR_PAD_LEFT) ?>" data-tag1="<?= $obj['tag1'] ?>" data-tag2="<?= $obj['tag2'] ?>" data-tag3="<?= $obj['tag3'] ?>" data-tag4="<?= $obj['tag3'] ?>" data-content="<?= $obj['member_content'] ?>" data-height="<?= $obj['height'] ?>" data-name="<?= $obj['name'] ?>" data-heart="<?= $obj['heart'] ?>" data-email="<?= $obj['email'] ?>" data-id="<?= $obj['upload_id'] ?>" data-id1="<?= $obj['prod_id1'] ?>" data-id2="<?= $obj['prod_id2'] ?>" data-id3="<?= $obj['prod_id3'] ?>">
                            <a href="#" class="lookbook_photo_heart_in_member" data-id="<?= $obj['upload_id'] ?>">
                                <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                            </a>
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
                            <li class="page-item <?= $strClass; ?>">
                                <a class="page-link" href="features_member_detail.php?page=<?= $i ?>">
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

        <!-- 彈出光箱 -->
        <div class="lookbook_lightbox_container">
            <img src="./svg/close.svg" alt="" class="lookbook_lightbox_close">
            <div class="lookbook_lightbox_content">
                <div class="lookbook_lightbox_product">
                    <div class="lookbook_photo_card_lb">
                        <img src="./img/fashion2.jpg" alt="" class="lookbook_photo_img" id="lookbook-photo-img-main">
                        <a href="#" id="lookbook_photo_heart_in_member_in_lb">
                            <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                        </a>
                    </div>
                </div>
                <div class="lookbook_lightbox_right">
                    <!-- <div class="member_person_link">
                <img src="./img/fashion7.jpg" alt="" class="member_person_link_main_photo">
                <div class="member_person_info">
                    <p class="member_person_link_content" id="member-name">小童</p>
                    <p class="member_person_link_content"><span id="member-height">170</span> cm</p>
                    <div class="member_person_link_content_box">
                        <p class="member_person_link_content"><span id="member-heart"> 22</span> 次</p>
                        <img src="./svg/heart.svg" alt="" class="member_person_card_heart">
                    </div>
                </div>
                <a href="./features_member_detail.php" id="member_detail-btn">
                    <div class="member_person_link_btn">查看</div>
                </a>
            </div> -->
                    <div class="lookbook_lightbox_title">穿搭描述
                        <div class="lookbook_lightbox_description" id="lookbook-lightbox-description">隨邊穿穿就出門</div>
                    </div>
                    <div class="lookbook_lightbox_title">搭配服飾</div>
                    <div class="lookbook_lightbox_photo">

                        <div class="lookbook_lightbox_photo_card">
                            <a href="#" id="lookbook-photo-img-one-a" target="_blank">
                                <img src="./img/fashion2.jpg" alt="" class="lookbook_lightbox_photo_img" id="lookbook-photo-img-one">
                            </a>
                            <a href="#" id="lookbook_photo_heart_in_member_in_lb-1">
                                <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                            </a>
                        </div>
                        <div class="lookbook_lightbox_photo_card">
                            <a href="#" id="lookbook-photo-img-two-a" target="_blank">
                                <img src="./img/fashion2.jpg" alt="" class="lookbook_lightbox_photo_img" id="lookbook-photo-img-two">
                            </a>
                            <a href="#" id="lookbook_photo_heart_in_member_in_lb-2">
                                <img src="./svg/heart-white.svg" alt="" class="lookbook_photo_heart">
                            </a>
                        </div>
                        <div class="lookbook_lightbox_photo_card">
                            <a href="#" id="lookbook-photo-img-three-a" target="_blank">
                                <img src="./img/fashion2.jpg" alt="" class="lookbook_lightbox_photo_img" id="lookbook-photo-img-three">
                            </a>
                            <a href="#" id="lookbook_photo_heart_in_member_in_lb-3">
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