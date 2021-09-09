<?php
//匯入資料庫
require_once 'db.inc.php';
session_start();
//預設訊息
$obj['success'] = false;
$obj['info'] = "失敗";

//確認所有傳過來的表單資料是否完整
if (
    isset($_POST['email']) &&
    isset($_POST['pastPWD']) &&
    isset($_POST['newPWD'])
) {
    //     //設定密碼的雜湊值
    // $pwd = sha1($_POST['pastPWD']);
    $pwd = $_POST['pastPWD'];
    $newPWD = $_POST['newPWD'];
    try {
        //新增使用者的 SQL 語法
        $sql = "SELECT `password` FROM `members`     
            WHERE `email` = '{$_POST['email']}' ";

        //執行 SQL 語法
        $stmt = $pdo->query($sql);

        //判斷是否寫入資料
        if ($stmt->rowCount() > 0) {

            $objUser = $stmt->fetch();
            if ($pwd != $objUser['password']) {
                $obj['info'] = "舊密碼輸入有誤, 請重新輸入!";
            } else {
                $sql = "UPDATE `members` 
                        SET `password` = '$newPWD' 
                        WHERE `email` = '{$_POST['email']}' ";

                //執行 SQL 語法
                $stmt = $pdo->query($sql);

                //判斷是否寫入資料
                if ($stmt->rowCount() > 0) {
                    //修改預設訊息
                    $obj['success'] = true;
                    $obj['info'] = $sql;
                }
            }
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
