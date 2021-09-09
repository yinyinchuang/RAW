<?php require_once "db.inc.php"; ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` 
FROM `member_upload`             
WHERE `email` ='{$_SESSION['email']}';";
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

//每頁幾筆
$numPerPage = 12;

// 總頁數，ceil()為無條件進位
$totalPages = ceil($totalRows / $numPerPage);

//目前第幾頁
$page = (isset($_POST['page']) && $_POST['page'] > 0) ? (int)$_POST['page'] : 1;

//計算分頁偏移量
$offset = ($page - 1) * $numPerPage;
?>
<?php
//預設訊息
// $obj['success'] = false;
// $obj['info'] = "Insert User Default Data 失敗";
$account = $_SESSION['email'];
$path = './img/RAW_images/';

// if (!isset($_SESSION['email'])) { //確認登入與否
//     $obj['info'] = '請先登入';
// } else { //確認前端請求資料是否完整
//新增商品追蹤的 SQL 語法
$sql = "SELECT *
            FROM `member_upload`             
            WHERE `email` = '{$_SESSION['email']}'
            LIMIT {$offset}, {$numPerPage}";

//執行 SQL 語法
$stmt = $pdo->query($sql);
if ($stmt->rowCount() > 0) {

    foreach ($stmt->fetchAll() as $obj1) {

?>
        <div class="member_photo_card_in_member">
            <img src=<?= $path . $obj1['photo'] ?> alt="" class="lookbook_photo_img">
            <a href="#" class="lookbook_photo_delete_in_member_upload" data-id="<?= $obj1['upload_id'] ?>">
                <img src="./svg/delete.svg" alt="" class="lookbook_photo_delete">
            </a>
            <div class="card_content_box">
                <p class="card_content"><?= $obj1['created_at'] ?></p>
                <div class="member_heart_count">
                    <img src="./svg/heart.svg" alt="">
                    <p><?= $obj1['heart'] ?></p>
                </div>
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
                <a class=" page-link" href="member_upload.php?page=<?= $i ?>">
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
        // member upload 刪除card
        $('.lookbook_photo_delete_in_member_upload').click(function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            var id = $(this).attr('data-id');
            var page = $('li.active').attr('data-page');
            console.log(id, page);
            $.get("delete_member_upload.php", {
                id: id
            }, function(obj) {
                if (obj['success']) {
                    $('#showup_box_delete_member_upload').addClass('open');
                    $('.cards').load("member_upload_new.php", {
                        page: page
                    });
                } else {
                    alert(`${obj['info']}`);
                }
                console.log(obj);
            }, 'json');
        });
        $('#showup_box_delete_member_upload_btn').click(function(event) {
            $('#showup_box_delete_member_upload').removeClass('open');
        });
    });
</script>