<?php

session_start();

require_once 'db.inc.php';

$sql = "INSERT INTO `wish_list_member` (`email`, `upload_id`) VALUES ('{$_SESSION['email']}', {$_GET['id']});";
$pdo->query($sql);
