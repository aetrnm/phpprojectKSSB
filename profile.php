<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Store Profile</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-cart.css"/>
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
        <h1 class="mb-1">Profil</h1>

        <?php
        if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']) {
            echo /** @lang text */
            "<h2>Sie müssen sich anmelden oder registrieren, um auf diese Seite zuzugreifen</h2>";
            die();
        }

        $logged_email = $_COOKIE['logged_email'];
        $connect = mysqli_connect('kssb.ch', 'db.user.g14f', 'dUs<8+SBrb', 'db.f1') or die('Connection Failure' . mysqli_connect_error());
        $sql = /** @lang text */
            "SELECT name FROM users where email='$logged_email'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);

        $name = $row['name'];
        echo /** @lang text */
        "<h2 class=\"mb-15\">Herzlich willkommen $name</h2>";
        ?>

        <form action="./scripts/logout-script.php" method="POST" class="mb-3">
            <input type="submit" class="button button-reddish" value="Log out">
        </form>

        <h2 class="mb-15">Ihre Bestellungen</h2>

        <?php
        $email = $_COOKIE["logged_email"];
        $connect = mysqli_connect('kssb.ch', 'db.user.g14f', 'dUs<8+SBrb', 'db.f1') or die('Connection Failure' . mysqli_connect_error());
        $sql = /** @lang text */
            "SELECT book_ids FROM users WHERE email='$email'";
        $query = mysqli_query($connect, $sql);

        $row = mysqli_fetch_array($query);
        if ($row['book_ids'] === 'NULL') {
            echo "Sie haben noch keine Bücher bestellt!";
            die();
        } else {
            $bookIDs = explode(',', $row['book_ids']);
        }

        $counted_numbers = array_count_values($bookIDs);
        $bookIDs = array_values(array_unique($bookIDs));

        for ($i = 0; $i < count($bookIDs); $i++) {
            $bookID = $bookIDs[$i];
            $sql = /** @lang text */
                "SELECT title, coverLink, price FROM books WHERE id='$bookID'";
            $query = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($query);

            $title = $row['title'];
            $price = $row['price'];
            $coverLink = $row['coverLink'];
            $count = $counted_numbers[$bookID];
            echo /** @lang text */
            "<div class=\"card mb-15\">
                    <div class=\"card-body p-15\">
                        <div class=\"card-content text-center\">
                            <div class=\"col-16-16-16-16-16-16\">
                                <img src=\"$coverLink\" class=\"card-img\" alt=\"Bild des Buchumschlags\">
                            </div>
                            <div class=\"col-16-16-16-16-16-16\">
                                <div>
                                    <p class=\"cart-item-text\">Name: <b>$title</b></p>
                                </div>
                            </div>
                            <div class=\"col-16-16-16-16-16-16\">
                                <div>
                                    <p class=\"cart-item-text\">Preis: <b>$price CHF</b></p>
                                </div>
                            </div>
                            <div class=\"col-16-16-16-16-16-16\">
                                <div>
                                    <p class=\"cart-item-text\">Insgesamt: <b>$count</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        ?>
    </div>
</body>
</html>