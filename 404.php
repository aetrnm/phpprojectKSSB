<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>

    <title>Book Store 404</title>
</head>
<body>
<div class="container">
    <header
            class="header"
    >
        <a
                href="/"
                class="header-icon"
        >
            <img src="icon.svg" width="48" alt="Website icon"/>
        </a>

        <ul class="navbar">
            <li><a href="/" class="navbar-link">Home</a></li>
            <li><a href="/shop" class="navbar-link">Shop</a></li>
            <li><a href="/about" class="navbar-link">Wir über uns</a></li>
            <li>
                <a href="/guestbook" class="navbar-link">Gästebuch</a>
            </li>
        </ul>

        <?php
        if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']) {
            echo /** @lang text */
            '
          <div class="navbar-buttons">
            <a href="/login" class="button button-bluish mr-05">Login</a>
            <a href="/register" class="button button-bluish">Register</a>
          </div>';
        } else {
            echo /** @lang text */
            '<div class="navbar-buttons">
            <a href="/cart" class="button button-dark mr-05">Mein Warenkorb</a>
            <a href="/add-book" class="button button-dark mr-05">Buch hinzufügen</a>
            <a href="/profile" class="button button-dark">Profil</a>
          </div>';
        }
        ?>
    </header>

    <div class="container">
        <h1 class="mb-1">Entschuldigung, die Seite existiert nicht!</h1>
        <a href="/">
            <button class="button button-bluish">Zurück zur Startseite</button>
        </a>
    </div>
</div>
</body>
</html>
