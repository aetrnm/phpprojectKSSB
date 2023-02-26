<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

if (!isset($_POST['title']) || !isset($_POST['price']) || !isset($_POST['description'])) {
    return;
}

$connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());

$title = $_POST['title'];
$author = $_POST['author'];
$coverLink = $_POST['coverLink'];
$price = $_POST['price'];
$description = $_POST['description'];
$year = $_POST['year'];

$sql = /** @lang text */
    "INSERT INTO `books` (`title`, `author`, `coverLink`, `price`, `description`, `year`) VALUES ('$title', '$author', '$coverLink', '$price', '$description', '$year')";
$query = mysqli_query($connect, $sql);
if ($query) {
    header("Location: /add-book");
    die();
} else {
    echo 'Error!';
}