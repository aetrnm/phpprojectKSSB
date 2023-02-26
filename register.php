<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-form.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>
    <title>Book Store Register</title>
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
        <div class="mb-1">
            <h1>Register</h1>
        </div>

        <form action="./scripts/register-script.php" method="POST">
            <div class="mb-1">
                <label for="name" class="form-label">Name</label>
                <input
                        name="name"
                        id="name"
                        type="text"
                        class="form-control"
                        placeholder="Eline"
                        required
                />
            </div>

            <div class="mb-1">
                <label for="email" class="form-label">Email address</label>
                <input
                        name="email"
                        id="email"
                        type="email"
                        class="form-control"
                        placeholder="name@example.com"
                        required
                />
            </div>

            <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input
                        name="password"
                        id="password"
                        type="password"
                        class="form-control"
                        placeholder="1234567890"
                        required
                />
            </div>

            <input type="submit" class="button button-bluish" value="Register"/>
        </form>
    </div>
</body>
</html>
