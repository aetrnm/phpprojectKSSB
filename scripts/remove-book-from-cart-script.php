<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

if (!isset($_POST['book_id'])) {
    return;
}

$book_id = $_POST['book_id'];

function filterById($obj, $id)
{
    return $obj->id !== $id;
}

session_start();
$_SESSION["cart"] = array_values(array_filter($_SESSION["cart"], function ($obj) use ($book_id) {
    return filterById($obj, $book_id);
}));

header("Location: /cart");