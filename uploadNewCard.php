<?php

//匯入資料庫
require_once 'db.inc.php';
session_start();

//預設訊息
$obj['success'] = false;
// $obj['info'] = "失敗";
$account = $_SESSION['email'];

$memberContent = (empty($_REQUEST['cardContent'])) ? "" : $_REQUEST['cardContent'];
// echo $memberContent;

// echo $_FILES['my_file']['name'];
//$file = (empty($_FILES['my_file'])) ? "" : $_FILES['my_file'];
# 檢查檔案是否上傳成功
if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK) {
  // echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
  // echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
  // echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
  // echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';

  # 檢查folder是否已經存在
  $path = 'img/RAW_images';
  if (!is_dir($path)) {
    mkdir($path, 0777, true);
  }

  # 取得此使用者已上傳幾張穿搭照
  try {
    //新增使用者的 SQL 語法
    $sql = "SELECT COUNT(*)+1 as cnt FROM `member_upload` WHERE email = '" . $account . "' ";

    //執行 SQL 語法
    $stmt = $pdo->query($sql);

    //判斷是否寫入資料
    if ($stmt->rowCount() > 0) {

      $objUser = $stmt->fetch();
      $fileName = "member_{$objUser['cnt']}.jpg";
      // echo ($account . ',' . $fileName . ',' . '825' . ',' . $memberContent);

      // $sql = "INSERT INTO `member_upload`(`email`, `photo`,`height` ,`member_content`, `prod_id1`, `prod_id2`, `prod_id3`,`heart`) 
      // VALUES ('haha@raw.com' ,'hahaha.jpg' ,'825','hahahaha825' ,'1','2','3','100')";
      // VALUES ($account ,$fileName ,'825',$memberContent ,'1','2','3','100')";

      $sql = "INSERT INTO `member_upload`(`email`, `photo`,`height`, `member_content`, `prod_id1`, `prod_id2`, `prod_id3`,`heart`) 
        VALUES ('$account' ,'$fileName','160', '$memberContent' ,'1','2','3','0')";

      //執行 SQL 語法
      $stmt = $pdo->query($sql);

      //判斷是否寫入資料
      if ($stmt->rowCount() > 0) {
        //修改預設訊息
        $obj['success'] = true;
        $obj['info'] = "新增成功";
      }

      $file = $_FILES['my_file']['tmp_name'];
      $dest = $path . '/' . $fileName;

      # 將檔案移至指定位置
      move_uploaded_file($file, $dest);
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
} else {
  // echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
}


//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
