<?php
require_once 'db.inc.php';

if (isset($_GET["id"])) {
    //刪除指定資料
    $sql = "DELETE FROM `member_upload` WHERE `upload_id`=" . $_GET['id'];
    $pdo->query($sql);

    $obj['success'] = true;
}

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
