<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  return;
}

if (!isset($_POST['feedback'])) {
  return;
}

$connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());

$feedback = $_POST['feedback'];
$date = date("Y/m/d");

$logged_email = $_COOKIE['logged_email'];
$sql = /** @lang text */
  "SELECT name FROM users where email='$logged_email'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);

$name = $row['name'];

$sql = /** @lang text */
  "INSERT INTO `reviews` (`content`, `author`, `created`) VALUES ('$feedback', '$name', '$date')";
$query = mysqli_query($connect, $sql);

if ($query) {
  header("Location: /guestbook");
  die();
}