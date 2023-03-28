<?php

$request = $_SERVER['REQUEST_URI'];

$topFolder = '';

switch ($request) {
    case $topFolder:
    case $topFolder . '/home' :
        require __DIR__ . '/index.php';
        break;
    case $topFolder . '/about' :
        require __DIR__ . '/about.php';
        break;
    case $topFolder . '/shop' :
        require __DIR__ . '/shop.php';
        break;
    case $topFolder . '/login' :
        require __DIR__ . '/login.php';
        break;
    case $topFolder . '/register' :
        require __DIR__ . '/register.php';
        break;
    case $topFolder . '/profile' :
        require __DIR__ . '/profile.php';
        break;
    case $topFolder . '/add-book' :
        require __DIR__ . '/add-book.php';
        break;
    case $topFolder . '/guestbook' :
        require __DIR__ . '/guestbook.php';
        break;
    case $topFolder . '/cart' :
        require __DIR__ . '/cart.php';
        break;
    case $topFolder . '/checkout' :
        require __DIR__ . '/checkout.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/404.php';
        break;
}