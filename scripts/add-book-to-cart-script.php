<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

if (!isset($_POST['book_id'])) {
    return;
}

$book_id = $_POST['book_id'];

session_start();
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [$book_id];
} else {
    $_SESSION["cart"] = [$book_id, ...$_SESSION["cart"]];
}

header("Location: /shop");