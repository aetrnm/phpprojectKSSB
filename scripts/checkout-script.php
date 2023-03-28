<?php
$email = $_COOKIE["logged_email"];

session_start();

$connect = mysqli_connect('kssb.ch', 'db.user.g14f', 'dUs<8+SBrb', 'db.f1') or die('Connection Failure' . mysqli_connect_error());
$sql = /** @lang text */
    "SELECT book_ids FROM users WHERE email='$email'";
$query = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($query);
if ($row['book_ids'] == '') {
    $new_books_ids = [];
} else {
    $new_books_ids = explode(',', $row['book_ids']);
}
for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
    $bookID = $_SESSION["cart"][$i]->id;
    $thisIDinCart = $_SESSION["cart"][$i]->count;
    for ($j = 0; $j < $thisIDinCart; $j++) {
        $new_books_ids[] = $bookID;
    }
}

$new_books_ids = implode(",", $new_books_ids);

$sql = /** @lang text */
    "UPDATE users SET book_ids = '$new_books_ids' WHERE email = '$email'";

$query = mysqli_query($connect, $sql);
if ($query) {
    unset($_SESSION["cart"]);
    header("Location: /profile");
} else {
    echo 'Error!';
}

die();