<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count`  FROM `lookbook` ;";
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
    <a href="./home.php">首頁</a>/<a href="./features_fashion.php">Features</a>/<a href="./features_lookbook.php">Lookbook</a>
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
    $sql = "SELECT * FROM `lookbook` LIMIT {$offset}, {$numPerPage}";
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
            <div class="fashion_card">
                <a href="./features_lookbook_detail.php?id=<?= $obj['lookbook_id'] ?>">
                    <img src="./img/RAW_images/<?= $obj['lookbook_img'] ?>" alt="" class="fashion_img">
                </a>
                <div class="card_content_box">
                    <a href="./features_lookbook_detail.php?start=<?= ($obj['lookbook_id'] - 1) * 50 ?>&end=<?= $obj['lookbook_id'] * 50 ?>" data-start="<?= ($obj['lookbook_id'] - 1) * 50 ?>">
                        <p class="card_content"><?= $obj['name'] ?></p>
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
                    <a class="page-link" href="features_lookbook.php?page=<?= $i ?>">
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

<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- len -->
<script src="./js/js-len/main.js"></script>
<script>
    $('.fashion_card').click(function(event) {
        //避免元素的預設事件被觸發
        // event.preventDefault();

        // var page = $('li.active').attr('data-page');

        var start = $(this).attr('data-start');
        var end = $(this).attr('data-end');
        $.get("add_wish_list_fashion.php", {
            id
        });
    });
</script>
</body>

</html>