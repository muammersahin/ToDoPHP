<?php

require_once './db.php';

extract($_GET);

$sql = "delete from list where id=$id";
$stmt = $db->query($sql);

header("Location: index.php");


