<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '':
  case '/' :
    require __DIR__ . '/index.html';
    break;
  case '/about' :
    require __DIR__ . '/about.html';
    break;
  case '/shop' :
    require __DIR__ . '/shop.html';
    break;
  case '/login' :
    require __DIR__ . '/login.html';
    break;
  case '/register' :
    require __DIR__ . '/register.html';
    break;
  case '/profile' :
    require __DIR__ . '/profile.html';
    break;
  default:
    http_response_code(404);
    require __DIR__ . '/404.html';
    break;
}