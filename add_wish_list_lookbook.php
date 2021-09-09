<?php

session_start();

require_once 'db.inc.php';

$sql = "INSERT INTO `wish_list` (`email`, `class`, `prod_id`) VALUES ('{$_SESSION['email']}','lookbook', {$_GET['id']});";
$pdo->query($sql);
