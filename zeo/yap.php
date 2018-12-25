<?php

require_once './db.php';

extract($_GET);

$sql = "update list set durum=1 where id=$id";
$stmt = $db->query($sql);

header("Location: index.php");



?>
