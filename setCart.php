<?php
session_start();

//預設訊息
$obj['success'] = false;
$obj['info'] = "加入購物車失敗";

//判斷 post 變數是否存在
if (
    isset($_POST['prod_id']) && isset($_POST['prod_name']) &&
    isset($_POST['prod_brand']) && isset($_POST['prod_price']) &&
    isset($_POST['prod_colorCode']) && isset($_POST['prod_colorCodeName']) && isset($_POST['prod_size']) && isset($_POST['prod_foto']) && isset($_POST['prod_qty'])
) {

    //假如先前沒有建立購物車，就直接初始化 (建立)
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    //判斷購物車裡面的商品，是否有重複，若有，則將數量進行更新
    $hasProductId = false;
    foreach ($_SESSION['cart'] as $index => $obj) {
        if (
            $obj['prod_id'] == (int)$_POST['prod_id'] &&
            $obj['prod_colorCode'] == $_POST['prod_colorCode'] &&
            $obj['prod_size'] == $_POST['prod_size']

        ) {

            //更新商品數量
            $_SESSION['cart'][$index]['prod_qty'] += (int)$_POST['prod_qty'];

            //更新 bool 值，代表購物車內有重複的商品
            $hasProductId = true;
        }
    }

    //將主要資料放到購物車中
    if ($hasProductId == false) {
        $_SESSION['cart'][] = [
            "prod_id" => (int)$_POST['prod_id'],
            "prod_name" => $_POST['prod_name'],
            "prod_brand" => $_POST['prod_brand'],
            "prod_price" => (int)$_POST['prod_price'],
            "prod_colorCode" => $_POST['prod_colorCode'],
            "prod_colorCodeName" => $_POST['prod_colorCodeName'],
            "prod_size" => $_POST['prod_size'],
            "prod_foto" => $_POST['prod_foto'],
            "prod_qty" => (int)$_POST['prod_qty']
        ];
    }

    //設定訊息
    $obj['success'] = true;
    $obj['info'] = "加入購物車成功";
    $obj['count_products'] = count($_SESSION['cart']);
}

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
