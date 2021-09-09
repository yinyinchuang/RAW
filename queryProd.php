<?php
session_start();


//匯入資料庫
require_once 'db.inc.php';

//預設訊息
$obj['success'] = false;
$obj['info'] = $_POST['colorCode'];

//確認所有傳過來的表單資料是否完整
if (
    isset($_POST['email']) &&
    isset($_POST['colorCode'])
) {

    $colorCode = $_POST['colorCode'];

    try {
        //新增使用者的 SQL 語法
        $sql = "SELECT `members`.`name`, `create_at`, `sum`, `member_level`,`color_code`, `prod_1pic`, `orders`.`order_id` , `members`.`email`, `prod_5pic`
        FROM `members`
        INNER JOIN `orders` ON `orders`.`email` = `members`.`email`
        INNER JOIN orders_detail ON orders_detail.order_id = orders.order_id
        INNER JOIN products ON orders_detail.prod_id = products.prod_id
        and color_code = '{$_POST['colorCode']}' ";

        // $obj['info'] = $sql;

        //執行 SQL 語法
        $stmt = $pdo->query($sql);
        $i = 0;
        $prod_1pic = [];
        $prod_5pic = [];
        //判斷是否寫入資料
        if ($stmt->rowCount() > 0) {

            foreach ($stmt->fetchAll() as $obj1) {
                $prod_1pic[$i] = $obj1['prod_1pic'];
                $prod_5pic[$i] = $obj1['prod_5pic'];
                $i++;
            }
            $obj['success'] = true;
            $obj['aryImgs'] = $prod_1pic;
            $obj['aryImgs2'] = $prod_5pic;
        }
    } catch (PDOException $e) {

        switch ($pdo->errorInfo()[1]) {
            case 1062:
                $obj['info'] = '此帳號已註冊';
                break;

            case 1064:
                $obj['info'] = 'SQL 語法錯誤';
                break;
        }
    }
}

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
