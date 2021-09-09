<?php
require_once 'db.inc.php';
?>

<?php session_start(); ?>

<?php
//預設訊息
$obj['success'] = false;
$obj['info'] = "修改失敗！";
$obj['email'] = $_POST['email'];
$obj['password'] = $_POST['password'];
//確認所有傳過來的表單資料是否完整
if (isset($_POST['email']) && isset($_POST['password'])) {
    
    $password = ($_POST['password']);

    try {
        //查詢使用者的 SQL 語法
        $sql = "UPDATE `members` SET `password`='" . $password .  "' WHERE email ='" . $_POST['email'] . "';";

        //執行 SQL 語法
        $stmt = $pdo->query($sql);

        $obj['success'] = true;
        $obj['info'] = "修改成功！";


        //判斷是否寫入資料
        // if ($stmt->rowCount() > 0) {
        //     //修改預設訊息
        //     $obj['success'] = true;
        //     $obj['info'] = "修改成功";

        //     //取得使用者資料(物件型態)
        //     $objUser = $stmt->fetch();
        // }
    } catch (PDOException $e) {
        /**
         * $pdo->errorInfo() 內容
         * [
         *     "23000", 
         *     1062, 
         *     "Duplicate entry 'abc@abc.abc' for key 'PRIMARY'"
         * ]
         * 
         * 參考連結
         * https://mariadb.com/kb/en/mariadb-error-codes/
         */
        // switch ($pdo->errorInfo()[1]) {
        //     case 1062:
        //         $obj['info'] = '此帳號已註冊';
        //         break;

        //     case 1064:
        //         $obj['info'] = 'SQL 語法錯誤';
        //         break;
        // }
    }
}

// $sql = "SELECT `email`, `name` 
//         FROM `users` 
//         WHERE `email` = '{$_POST['email_login']}'
//         AND `password` = '{$password}'
//         AND `isActivated` = 1 ";


//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
