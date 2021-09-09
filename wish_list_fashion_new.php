<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `wish_list_fashion` INNER JOIN `fashion` ON `wish_list_fashion`.`fashion_id`=`fashion`.`fashion_id` WHERE `email`='{$_SESSION['email']}';";
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

//每頁幾筆
$numPerPage = 16;

// 總頁數，ceil()為無條件進位
$totalPages = ceil($totalRows / $numPerPage);

//目前第幾頁
$page = (isset($_POST['page']) && $_POST['page'] > 0) ? (int)$_POST['page'] : 1;

//計算分頁偏移量
$offset = ($page - 1) * $numPerPage;

$sql = "SELECT * FROM `wish_list_fashion` INNER JOIN `fashion` ON `wish_list_fashion`.`fashion_id`=`fashion`.`fashion_id` WHERE `email`='{$_SESSION['email']}'
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
        $id = $obj['id'];
?>
        <div class="fashion_card">
            <a href="<?= $obj['article_html'] ?>">
                <img src="./img/<?= $obj['photo'] ?>" alt="" class="fashion_img">
            </a>
            <a href="#" class="lookbook_photo_delete_in_fashion" data-id="<?= $obj['id'] ?>">
                <img src="./svg/delete.svg" alt="" class="lookbook_photo_delete">
            </a>
            <div class="card_content_box">
                <a href="<?= $obj['article_html'] ?>">
                    <p class="card_content"><?= $obj['fashion_title'] ?></p>
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
                <a class=" page-link" href="wish_list_fashion.php?page=<?= $i ?>">
                    <?= $i ?>
                </a>
            </li>
    <?php
        }
    }
    ?>
</div>
<script>
    $(document).ready(function() {
        $('.lookbook_photo_delete_in_fashion').click(function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            var id = $(this).attr('data-id');
            var page = $('li.active').attr('data-page');
            console.log(id, page);
            $.get("delete_wish_list_fashion.php", {
                id: id
            });
            $('.cards').load("wish_list_fashion_new.php", {
                page: page
            });
            $('#showup_box_delete_wish_list').addClass('open');
        });
    });
</script>