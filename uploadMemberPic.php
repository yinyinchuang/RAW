<?php

require_once 'db.inc.php';
session_start();

$account = $_SESSION['email'];
//$file = (empty($_FILES['my_file'])) ? "" : $_FILES['my_file'];

# 檢查檔案是否上傳成功
if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK) {
  echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
  echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
  echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
  echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';

  # 檢查folder是否已經存在
  $path = 'img/RAW_images';
  if (!is_dir($path)) {
    mkdir($path, 0777, true);
  }

  $fileName = "member_{$_SESSION['email']}.jpg";

  # 檢查檔案是否已經存在
  if (file_exists('img/RAW_images/' . $_FILES['my_file']['name'])) {
    echo '檔案已存在。<br/>';
  } else {
    $file = $_FILES['my_file']['tmp_name'];
    $dest = $path . '/' . $fileName;

    # 將檔案移至指定位置
    move_uploaded_file($fileName, $dest);
  }
} else {
  echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
}
