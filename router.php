<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '':
  case '/' :
    require __DIR__ . '/index.php';
    break;
  case '/about' :
    require __DIR__ . '/about.php';
    break;
  case '/shop' :
    require __DIR__ . '/shop.php';
    break;
  case '/login' :
    require __DIR__ . '/login.php';
    break;
  case '/register' :
    require __DIR__ . '/register.php';
    break;
  case '/profile' :
    require __DIR__ . '/profile.php';
    break;
  case '/add-book' :
    require __DIR__ . '/add-book.php';
    break;
  case '/guestbook' :
    require __DIR__ . '/guestbook.php';
    break;
  default:
    http_response_code(404);
    require __DIR__ . '/404.php';
    break;
}