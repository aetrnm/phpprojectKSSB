<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-form.css"/>
    <link rel="stylesheet" href="css/styles-cart.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>

    <title>Book Store Checkout</title>
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
        <h1 class="mb-1">Bezahlung</h1>
        <form action="./scripts/checkout-script.php" method="POST">
            <div class="mb-1">
                <label for="ccn" class="form-label">Credit Card Number</label>
                <input
                        name="ccn"
                        id="ccn"
                        type="tel"
                        inputmode="numeric"
                        pattern="[0-9\s]{13,19}"
                        autocomplete="cc-number"
                        maxlength="19"
                        placeholder="1234123412341234"
                        class="form-control"
                        required
                />
            </div>
            <div class="mb-1">
                <label for="ed" class="form-label">Expiration Date</label>
                <input
                        name="ed"
                        id="ed"
                        inputmode="numeric"
                        pattern="^(0[1-9]|1[0-2])\/?(([0-9]{4}|[0-9]{2})$)"
                        maxlength="7"
                        placeholder="11/2023"
                        class="form-control"
                        required
                />
            </div>
            <div class="mb-1">
                <label for="cvv" class="form-label">CVV</label>
                <input
                        name="cvv"
                        id="cvv"
                        type="tel"
                        inputmode="numeric"
                        pattern="[0-9\s]{3}"
                        maxlength="3"
                        placeholder="824"
                        class="form-control"
                        required
                />
            </div>
            <div class="card mb-15">
                <div class="card-body p-15">
                    <div class="float-right">
                        <div class="card-content text-center">
                        <span class="cart-item-text mr-15">Gesamtbetrag der Bestellung: <b><?php session_start();
                                echo number_format($_SESSION["total"], 2); ?> CHF</b></span>
                            <div>
                                <input type="submit" class="button button-greenish button-large" value="Bezahlen"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
