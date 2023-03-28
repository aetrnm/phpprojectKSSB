<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-cart.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>

    <title>Book Store Mein Warenkorb</title>
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
        <h1 class="mb-1">Warenkorb</h1>

        <?php
        session_start();
        if (!isset($_SESSION["cart"]) or count($_SESSION["cart"]) === 0) {
            echo /** @lang text */
            "<h2 class=\"mb-15\">Ihr Warenkorb ist leer :(</h2>
            <a href=\"/shop\" class=\"button button-bluish\"> Back to the shop
            </a>";
            die();
        }
        ?>

        <div class="row cart-wrapper">
            <div class="col">

                <?php
                $_SESSION["total"] = 0;
                for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
                    $bookID = $_SESSION["cart"][$i]->id;
                    $connect = mysqli_connect('kssb.ch', 'db.user.g14f', 'dUs<8+SBrb', 'db.f1') or die('Connection Failure' . mysqli_connect_error());
                    $sql = /** @lang text */
                        "SELECT title, coverLink, price FROM books WHERE id='$bookID'";
                    $query = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($query);

                    $title = $row['title'];
                    $price = $row['price'];
                    $_SESSION["total"] += $price * $_SESSION["cart"][$i]->count;
                    $coverLink = $row['coverLink'];
                    $count = $_SESSION["cart"][$i]->count;
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
                            <div class=\"col-16-16-16-16-16-16\">
                                <form action=\"./scripts/remove-book-from-cart-script.php\" method=\"POST\">
                                    <input type=\"hidden\" name=\"book_id\" value=\"$bookID\">
                                    <input type=\"submit\" class=\"button button-reddish\" value=\"Löschen\"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
                }
                ?>

                <div class="card mb-15">
                    <div class="card-body p-15">
                        <div class="float-right">
                            <div class="card-content text-center">
                                <span class="cart-item-text mr-15">Gesamtbetrag der Bestellung: <b><?php echo number_format($_SESSION["total"], 2); ?> CHF</b></span>
                                <div>
                                    <a href="/shop" class="button button-bluish button-large mr-05"> Zurück zum shop
                                    </a>
                                    <a href="/checkout" class="button button-greenish button-large">
                                        Bestellung
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
