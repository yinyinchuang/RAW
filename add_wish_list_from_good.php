<?php
require_once 'db.inc.php';
session_start();

$sql = "INSERT INTO `wish_list` (`email`, `class`, `prod_id`) VALUES ('haha@raw.com','goods', {$_GET['prod_id']});";
$pdo->query($sql);

// header("Location:raw_goods_index.php");
