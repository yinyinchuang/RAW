<?php

session_start();

require_once 'db.inc.php';

$sql = "INSERT INTO `wish_list` (`email`, `class`, `prod_id`) VALUES ('{$_SESSION['email']}','goods', {$_GET['id']});";
$pdo->query($sql);
