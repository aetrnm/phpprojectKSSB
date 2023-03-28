<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

if (!isset($_POST['book_id'])) {
    return;
}

$bookID = $_POST['book_id'];

session_start();
if (!isset($_SESSION["cart"])) {
    $cartObject = new stdClass();
    $cartObject->id = $bookID;
    $cartObject->count = 1;
    $_SESSION["cart"] = [$cartObject];
} else {
    for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
        if ($_SESSION["cart"][$i]->id === $bookID) {
            $_SESSION["cart"][$i]->count += 1;
            header("Location: /shop");
            die();
        }
    }
    $cartObject = new stdClass();
    $cartObject->id = $bookID;
    $cartObject->count = 1;
    $_SESSION["cart"] = [$cartObject, ...$_SESSION["cart"]];
}
header("Location: /shop");
