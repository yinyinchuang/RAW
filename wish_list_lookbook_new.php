<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `wish_list`
INNER JOIN`products`
ON `wish_list`.`prod_id`=`products`.`prod_id`
WHERE `email`='{$_SESSION['email']}' && `wish_list`.`class`='lookbook';";
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

//每頁幾筆
$numPerPage = 16;

// 總頁數，ceil()為無條件進位
$totalPages = ceil($totalRows / $numPerPage);

//目前第幾頁
$page = (isset($_POST['page']) && $_POST['page'] > 0) ? (int)$_POST['page'] : 1;

//計算分頁偏移量
$offset = ($page - 1) * $numPerPage;

$sql = "SELECT * 
FROM `wish_list`
INNER JOIN`products`
ON `wish_list`.`prod_id`=`products`.`prod_id`
WHERE `email`='{$_SESSION['email']}' && `wish_list`.`class`='lookbook'
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
        <div class="lookbook_photo_card">
            <img src="img/RAW_images/<?= str_pad($obj['prod_id'], 3, "0", STR_PAD_LEFT) ?>-1-2.jpg" alt="" class="lookbook_photo_img lookbook_photo_card_lblink" data-value="<?= str_pad($obj['prod_id'], 3, "0", STR_PAD_LEFT) ?>" data-tag1="<?= $obj['tag1'] ?>" data-tag2="<?= $obj['tag2'] ?>" data-tag3="<?= $obj['tag3'] ?>" data-id="<?= $obj['prod_id'] ?>">
            <a href="#" class="lookbook_photo_delete_in_lookbook" data-id="<?= $obj['id'] ?>">
                <img src="./svg/delete.svg" alt="" class="lookbook_photo_delete">
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
            <li class="page-item <?= $strClass; ?>" data-page="<?= $page ?>">
                <a class=" page-link" href="wish_list_lookbook.php?page=<?= $i ?>">
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
        $('.lookbook_photo_delete_in_lookbook').click(function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            var id = $(this).attr('data-id');
            var page = $('li.active').attr('data-page');
            console.log(id, page);
            $.get("delete_wish_list_lookbook.php", {
                id: id
            });
            $('.cards').load("wish_list_lookbook_new.php", {
                page: page
            });
            $('#showup_box_delete_wish_list').addClass('open');
        });
    });
    // lookbook_lightbox
    $('.lookbook_photo_card_lblink').click(function(event) {
        $('.lookbook_lightbox_container').addClass('open');
        $('.lightbox_background').addClass('open');
        var imagelink = $(this).attr('data-value');
        var tag1 = $(this).attr('data-tag1');
        var tag2 = $(this).attr('data-tag2');
        var tag3 = $(this).attr('data-tag3');
        var id = $(this).attr('data-id');
        $("#lookbook-photo-img-main").attr('data-id', id);
        document.getElementById("lookbook-photo-img-main").src = "img/RAW_images/" + imagelink + "-1-2.jpg";
        document.getElementById("lookbook-photo-img-one").src = "img/RAW_images/" + imagelink + "-1-1.jpg";
        document.getElementById("lookbook-photo-img-two").src = "img/RAW_images/" + imagelink + "-1-3.jpg";
        document.getElementById("lookbook-photo-img-three").src = "img/RAW_images/" + imagelink + "-1-4.jpg";
        document.getElementById("lookbook-photo-img-one-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink, 10);
        document.getElementById("lookbook-photo-img-two-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink, 10);
        document.getElementById("lookbook-photo-img-three-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink, 10);
        document.getElementById("lightbox-tag1").innerHTML = tag1;
        document.getElementById("lightbox-tag2").innerHTML = tag2;
        document.getElementById("lightbox-tag3").innerHTML = tag3;
        // document.getElementById("lookbook-photo-img-main-heart").href = "./add_wish_list_lookbook_detail5.php?prod_id=" + id + "&page=" + page;
        // document.getElementById("lookbook-photo-img-card-heart-one").href = "./add_wish_list_lookbook_detail5_inlb.php?prod_id=" + id + "&page=" + page;
        // document.getElementById("lookbook-photo-img-card-heart-two").href = "./add_wish_list_lookbook_detail5_inlb.php?prod_id=" + id + "&page=" + page;
        // document.getElementById("lookbook-photo-img-card-heart-three").href = "./add_wish_list_lookbook_detail5_inlb.php?prod_id=" + id + "&page=" + page;
    });
</script>