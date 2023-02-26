<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

if (!isset($_POST['book_id'])) {
    return;
}

$book_id = $_POST['book_id'];

function delArrValues(array $arr, array $remove)
{
    return array_filter($arr, fn($e) => !in_array($e, $remove));
}

session_start();
$_SESSION["cart"] = delArrValues($_SESSION["cart"], [$book_id]);


header("Location: /cart");