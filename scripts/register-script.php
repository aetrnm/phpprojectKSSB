<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])) {
    return;
}

$connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$date = date("Y/m/d");

/* CHECKING IF EMAIL ALREADY REGISTERED */
$sql = /** @lang text */
    "SELECT email FROM users where email='$email'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) != 0) {
    header("Location: /register");
    die();
}

$sql = /** @lang text */
    "INSERT INTO `users` (`name`, `email`, `password`, `created`) VALUES ('$name', '$email', '$hashedPassword', '$date')";
$query = mysqli_query($connect, $sql);
if ($query) {
    setcookie('logged_in', true, time() + 60 * 60 * 24 * 30, '/');
    setcookie('logged_email', $email, time() + 60 * 60 * 24 * 30, '/');
    header("Location: /profile");
    die();
} else {
    echo 'Error!';
}
