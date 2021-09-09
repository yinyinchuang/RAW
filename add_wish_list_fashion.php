<?php

session_start();

require_once 'db.inc.php';

$sql = "INSERT INTO `wish_list_fashion` (`email`, `fashion_id`) VALUES ('{$_SESSION['email']}', {$_GET['id']});";
$pdo->query($sql);
