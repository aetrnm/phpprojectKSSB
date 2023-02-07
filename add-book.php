<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' /*&& isset($_POST['submit'])*/) {
  return;
}

$connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());
if(!isset($_POST['title']) || !(isset($_POST['ISBN10']) || isset($_POST['ISBN13'])) || !isset($_POST['price'])) {
  return;
}

$title = $_POST['title'];
$author = $_POST['author'];
$coverLink = $_POST['coverLink'];
$ISBN10 = $_POST['ISBN10'];
$ISBN13 = $_POST['ISBN13'];
$price = $_POST['price'];