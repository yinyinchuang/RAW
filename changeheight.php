<?php
session_start();
require_once 'db.inc.php';

// $obj['success'] = false;
// $obj['info'] = "失敗";
// $account = "'{$_SESSION['email']}'";

if (isset($_POST['changeheight'])) {

    try {

        $sql = "UPDATE `members` 
                SET `height` = '{$_POST['changeheight']}' 
                WHERE `email` = '{$_SESSION['email']}' ";

        $obj['info'] = $sql;

        //執行 SQL 語法
        $stmt = $pdo->query($sql);

        //判斷是否寫入資料
        if ($stmt->rowCount() > 0) {
            //修改預設訊息
            $obj['success'] = true;
            $obj['info'] = $sql;
        }
    } catch (PDOException $e) {
        // switch($pdo->errorInfo()[1]){
        // case 1062:
        // $obj['info'] = '此帳號已註冊';
        // break;
        // }
    }
}

header('Content-Type: application/json');

echo json_encode($obj, JSON_UNESCAPED_UNICODE);
