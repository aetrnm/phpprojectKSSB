<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Store Profile</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>

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
        <h1 class="mb-1">Profile</h1>


        <?php
        if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']) {
            echo /** @lang text */
            '<h2>You must login or register to access this page </h2>';
            die();
        }

        $logged_email = $_COOKIE['logged_email'];
        $connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());
        $sql = /** @lang text */
            "SELECT name FROM users where email='$logged_email'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);

        $name = $row['name'];
        echo /** @lang text */
        "<h2>Welcome $name</h2>";
        ?>

        <form action="./scripts/logout-script.php" method="POST">
            <input type="submit" class="button button-reddish" value="Log out">
        </form>
    </div>
</body>
</html>