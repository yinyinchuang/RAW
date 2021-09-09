<?php

/**
 * 開啟 session，準備在註冊成功時，建立 email 在 session 當中，
 * 之後會透過 $_SESSION['email'] 作為訂單成立 (寫入訂單資料表) 前的判斷，
 * 有 $_SESSION['email'] 就可以新增訂單和訂單明細，
 * 沒有就請你登入，或是註冊帳號。
 */
session_start();



//匯入資料庫
require_once 'db.inc.php';

//預設訊息
// $obj['success'] = false;
// $obj['info'] = "更新成功";

//確認所有傳過來的表單資料是否完整
if (
    isset($_POST['email']) &&
    isset($_POST['name']) &&
    isset($_POST['birthdate']) &&
    isset($_POST['address']) &&
    isset($_POST['city']) &&
    isset($_POST['dist']) &&
    isset($_POST['store']) &&
    isset($_POST['phone'])

) {

    //設定密碼的雜湊值
    // $pwd = sha1($_POST['pwd']);

    try {
        //新增使用者的 SQL 語法
        $sql = "UPDATE `members` 
        SET `name` = '{$_POST['name']}' 
            ,`birthdate` = '{$_POST['birthdate']}' 
            ,`phone` = '{$_POST['phone']}' 
            ,`city` = '{$_POST['city']}'
            ,`district` = '{$_POST['dist']}'
            ,`address` = '{$_POST['address']}'
            ,`store` =  '{$_POST['store']}'
         WHERE `email` = '{$_POST['email']}' ";

        //執行 SQL 語法
        $stmt = $pdo->query($sql);


        //判斷是否寫入資料
        if ($stmt->rowCount() > 0) {
            //修改預設訊息
            $obj['success'] = true;
            $obj['info'] = "註冊成功";
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
