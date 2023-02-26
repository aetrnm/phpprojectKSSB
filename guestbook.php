<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-form.css"/>
    <link rel="stylesheet" href="css/styles-guestbook.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>
    <title>Book Store Guestbook</title>
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
            <li><a href="/about" class="navbar-link">About</a></li>
            <li>
                <a href="/guestbook" class="navbar-link">Guestbook</a>
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
            <a href="/cart" class="button button-dark mr-05">My cart</a>
            <a href="/add-book" class="button button-dark mr-05">Add book</a>
            <a href="/profile" class="button button-dark">Profile</a>
          </div>';
        }
        ?>
    </header>

    <div class="container">
        <h1 class="mb-1">Guestbook</h1>

        <?php
        if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']) {
            echo /** @lang text */
            '<h2>You must login or register to leave comments</h2>';
        } else {
            echo /** @lang text */
            '<form action="./scripts/guestbook-script.php" method="POST">
        <div class="mb-1">
          <label for="feedback" class="form-label">Feedback</label>
          <textarea name="feedback" class="form-control" placeholder="Write here..." style="resize: vertical;" required></textarea>
        </div>
        <input type="submit" class="button button-bluish" value="Post" />
      </form>';
        }
        ?>

        <hr class="mt-15 mb-15"/>

        <?php

        $connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());
        $sql = /** @lang text */
            "SELECT id, content, author, created FROM reviews ORDER BY id desc";
        $query = mysqli_query($connect, $sql);

        $row = mysqli_fetch_array($query);

        while ($row) {
            $content = $row['content'];
            $author = $row['author'];
            $created = $row['created'];
            echo /** @lang text */
            "<div class=\"card mb-15\">
          <div class=\"card-body\">
            <p>$content</p>
            <div class=\"card-footer\">
              <p class=\"small\">By <b>$author</b></p>
              <p class=\"small ml-05\">$created</p>
            </div>
          </div>
        </div>";
            $row = mysqli_fetch_array($query);
        }
        ?>
    </div>
</body>
</html>
