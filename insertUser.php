<?php
session_start();
require_once 'db.inc.php';

$obj['success'] = false ;
$obj['info'] = "註冊失敗！";

if (isset($_POST['email']) &&
    isset($_POST['password']) ){

    $pwd = ($_POST['password']);

    try {

        $sql = "INSERT INTO `members` (`email`, `password`)
                VALUES (
                    '{$_POST['email']}',
                    '{$pwd}'
                )";
        $stmt = $pdo->query($sql);

        if($stmt->rowCount() > 0) {
            
            $obj['success'] = true;
            $obj['info'] = "註冊成功！";

            $_SESSION['email'] = $_POST['email'];

        }
    } catch(PDOException $e){
        // switch($pdo->errorInfo()[1]){
            // case 1062:
                // $obj['info'] = '此帳號已註冊';
            // break;
        // }
    }
}

header('Content-Type: application/json');

echo json_encode($obj, JSON_UNESCAPED_UNICODE);

