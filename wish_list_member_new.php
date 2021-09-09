<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$sqlTotal = "SELECT count(1) AS `count` FROM `wish_list_member` INNER JOIN `member_upload` ON `wish_list_member`.`upload_id`=`member_upload`.`upload_id` WHERE `wish_list_member`.`email`='{$_SESSION['email']}';";
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
FROM `wish_list_member` 
INNER JOIN `member_upload` 
ON `wish_list_member`.`upload_id`=`member_upload`.`upload_id` 
LEFT JOIN `products`
ON`member_upload`.`prod_id1`=`products`.`prod_id`
LEFT JOIN `members` 
    ON `member_upload`.`email`=`members`.`email` 
    WHERE `wish_list_member`.`email`='{$_SESSION['email']}'
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
        <div class="member_photo_card member_photo_card_in_wl">
            <img src="./img/RAW_images/<?= $obj['photo'] ?>" alt="" class="lookbook_photo_img member_photo_card_lblink" data-value-main="<?= $obj['photo'] ?>" data-value1="<?= str_pad($obj['prod_id1'], 3, "0", STR_PAD_LEFT) ?>" data-value2="<?= str_pad($obj['prod_id2'], 3, "0", STR_PAD_LEFT) ?>" data-value3="<?= str_pad($obj['prod_id3'], 3, "0", STR_PAD_LEFT) ?>" data-tag1="<?= $obj['tag1'] ?>" data-tag2="<?= $obj['tag2'] ?>" data-tag3="<?= $obj['tag3'] ?>" data-tag4="<?= $obj['tag3'] ?>" data-content="<?= $obj['member_content'] ?>" data-height="<?= $obj['height'] ?>" data-name="<?= $obj['name'] ?>" data-heart="<?= $obj['heart'] ?>" data-email="<?= $obj['email'] ?>" data-id="<?= $obj['prod_id'] ?>" data-id="<?= $obj['upload_id'] ?>" data-id1="<?= $obj['prod_id1'] ?>" data-id2="<?= $obj['prod_id2'] ?>" data-id3="<?= $obj['prod_id3'] ?>">
            <a href="#" class="lookbook_photo_delete_in_member" data-id="<?= $obj['id'] ?>">
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
            <li class="page-item <?= $strClass; ?>" data-page="<?= $i ?>">
                <a class=" page-link" href="wish_list_member.php?page=<?= $i ?>">
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
        $('.lookbook_photo_delete_in_member').click(function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            var id = $(this).attr('data-id');
            var page = $('li.active').attr('data-page');
            console.log(id, page);
            $.get("delete_wish_list_member.php", {
                id: id
            }, function(obj) {
                if (obj['success']) {
                    $('#showup_box_delete_wish_list').addClass('open');
                    $('.cards').load("wish_list_member_new.php", {
                        page: page
                    });
                } else {
                    alert(`${obj['info']}`);
                }
                console.log(obj);
            }, 'json');
        });
    });

    // member_photo
    $('.member_photo_card_lblink').click(function(event) {
        $('.lookbook_lightbox_container').addClass('open');
        $('.lightbox_background').addClass('open');
        var imagelink = $(this).attr('data-value-main');
        var imagelink1 = $(this).attr('data-value1');
        var imagelink2 = $(this).attr('data-value2');
        var imagelink3 = $(this).attr('data-value3');
        var content = $(this).attr('data-content');
        var height = $(this).attr('data-height');
        var name = $(this).attr('data-name');
        var heart = $(this).attr('data-heart');
        var email = $(this).attr('data-email');

        document.getElementById("lookbook-photo-img-main").src = "img/RAW_images/" + imagelink;
        document.getElementById("lookbook-photo-img-one").src = "img/RAW_images/" + imagelink1 + "-1-1.jpg";
        document.getElementById("lookbook-photo-img-two").src = "img/RAW_images/" + imagelink2 + "-1-1.jpg";
        document.getElementById("lookbook-photo-img-three").src = "img/RAW_images/" + imagelink3 + "-1-1.jpg";
        document.getElementById("lookbook-photo-img-one-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink1, 10);
        document.getElementById("lookbook-photo-img-two-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink2, 10);
        document.getElementById("lookbook-photo-img-three-a").href = "./raw_goods_index.php?prod_id=" + parseInt(imagelink3, 10);
        // document.getElementById("member_detail-btn").href = "./features_member_detail.php?email=" + email;
        var tag1 = $(this).attr('data-tag1');
        var tag2 = $(this).attr('data-tag2');
        var tag3 = $(this).attr('data-tag3');
        document.getElementById("lightbox-tag1").innerHTML = tag1;
        document.getElementById("lightbox-tag2").innerHTML = tag2;
        document.getElementById("lightbox-tag3").innerHTML = tag3;

        var id = $(this).attr('data-id');
        $("#lookbook_photo_heart_in_member_in_lb").attr('data-id', id);
        var id1 = $(this).attr('data-id1');
        var id2 = $(this).attr('data-id2');
        var id3 = $(this).attr('data-id3');
        $("#lookbook_photo_heart_in_member_in_lb-1").attr('data-id', id1);
        $("#lookbook_photo_heart_in_member_in_lb-2").attr('data-id', id2);
        $("#lookbook_photo_heart_in_member_in_lb-3").attr('data-id', id3);
        // alert($("#lookbook_photo_heart_in_member_in_lb").attr('data-id'));
        document.getElementById("lookbook-lightbox-description").innerHTML = content;
        document.getElementById("member-height").innerHTML = height;
        document.getElementById("member-name").innerHTML = name;
        document.getElementById("member-heart").innerHTML = heart;
    });
</script>