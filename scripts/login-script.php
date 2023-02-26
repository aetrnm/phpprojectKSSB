<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST' /*&& isset($_POST['submit'])*/) {
  return;
}

if (!isset($_POST['email']) || !isset($_POST['password'])) {
  return;
}

$connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());

$email = $_POST['email'];
$password = $_POST['password'];

$sql = /** @lang text */
  "SELECT email FROM users where email='$email'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) === 0) {
  header("Location: /register");
  die();
}

$sql = /** @lang text */
  "SELECT password FROM users WHERE email='$email'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);

$hashedPassword = $row['password'];
if (password_verify($password, $hashedPassword)) {
  setcookie('logged_in', true, time() + 60 * 60 * 24 * 30, '/');
  setcookie('logged_email', $email, time() + 60 * 60 * 24 * 30, '/');
  header("Location: /profile");
  die();
}
