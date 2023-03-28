<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-cookies-banner.css"/>
    <link rel="stylesheet" href="css/styles-form.css"/>
    <link rel="stylesheet" href="css/styles-home.css"/>
    <!--    <link rel="stylesheet" href="css/index.css"/>-->
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>
    <title>Book Store</title>
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

    <!-- Cookie Banner -->
    <div
            id="cookie-banner"
            class="cookie-banner text-center text-muted"
    >
        🍪 This website uses cookies to ensure you get the best experience on
        our website.
        <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
    </div>
    <!-- End of Cookie Banner -->

    <div class="text-center mb-3">
        <img src="books.svg" srcset="books.svg" alt="Books sketch" width="200">
        <h1>Kaufen und verkaufen Sie Ihre Bücher zum besten Preis</h1>
        <div class="col-16-16-16-16-16-16 margin-auto">
            <p class="text-muted mb-1">Von angewandter Literatur bis hin zu Lehrmitteln haben wir Ihnen eine Vielzahl
                von Lehrbüchern zu bieten.</p>
            <div class="d-flex justify-content-center">
                <a href="/shop" class="button button-bluish button-large"
                >
                    Go to the shop
                </a>
            </div>
        </div>
    </div>

    <div class="container mb-3">
        <div
                class="row text-center bordered-form p-15"
        >
            <div class="col-50-50">
                <h1 class="mb-1">
                    Registrieren Sie sich oder melden Sie sich an und nutzen Sie das volle Potenzial unserer Website
                </h1>
                <p class="text-muted mb-15">
                    Mit einem registrierten Konto können Sie Ihre Bestellungen leicht verfolgen, Ihre Lieblingsbücher
                    speichern und Benachrichtigungen über Neuerscheinungen erhalten. Die Registrierung ist schnell,
                    einfach und völlig kostenlos.
                </p>
                <div>
                    <a href="/login" class="button button-bluish button-large">
                        Login
                    </a>
                    <a href="/register" class="button button-bluish button-large">
                        Register
                    </a>
                </div>
            </div>

            <img src="book-delivery.svg" srcset="book-delivery.svg" class="margin-auto" width="300" alt="Books sketch"/>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-50-50 text-center">
                <h1 class="mb-1">Melden Sie sich für unseren Newsletter an</h1>
                <p class="text-muted">Unser Newsletter ist der perfekte Weg, um neue Titel zu entdecken, Neuigkeiten aus
                    der Welt der Bücher zu erfahren und exklusive Rabatte auf Ihre Lieblingsbücher zu erhalten.
                    Verpassen Sie nicht unsere neuesten Angebote und Aktionen - melden Sie sich jetzt an und tauchen Sie
                    ein in die wunderbare Welt der Bücher</p>
            </div>
            <div class="margin-auto">
                <form action="./scripts/email-subscription-script.php" method="POST" class="p-15 bordered-form">
                    <div class="mb-1">
                        <label for="email">E-Mail Adresse</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <button class="button button-large button-bluish" style="width: 100%" type="submit">Anmelden
                    </button>
                    <hr class="mt-15 mb-15"/>
                    <small class="text-muted">Wenn Sie auf Anmelden klicken, stimmen Sie den Nutzungsbedingungen
                        zu..</small>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>
