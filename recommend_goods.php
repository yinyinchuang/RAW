<?php require_once 'db.inc.php';

session_start();

$colormatch1 = $_POST['colormatch1'];
$colormatch2 = $_POST['colormatch2'];

$sql = "SELECT DISTINCT `products_detail`.`prod_id`,`prod_1pic`
        FROM `products` 
        INNER JOIN `products_detail`
        ON `products`.`prod_id`=`products_detail`.`prod_id`
        WHERE `products_detail`.`color_code`='$colormatch1'
        OR `products_detail`.`color_code`='$colormatch2'
        LIMIT 10,20";

$arr_recomment = $pdo->query($sql)->fetchAll();
shuffle($arr_recomment);
foreach ($arr_recomment as $obj) {

?>


    <div class="swiper-slide lookbook_photo_card_in_sw">
        <a href="raw_goods_index.php?prod_id=<?= $obj['prod_id'] ?>">
            <img src="./img/RAW_images/<?= $obj['prod_1pic'] ?>" alt="">
        </a>
    </div>



<?php
}
?>