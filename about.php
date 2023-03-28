<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-about.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>

    <title>Book Store About</title>
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
        <div class="row mb-15">
            <h1 class="mb-1">Unser Team</h1>
            <div class="col-100">
                <p class="text-muted">
                    Eline, Raphael und Oleh sind ein tolles Team, das in einem Online-Buchladen arbeitet. Eline ist die
                    Managerin des Ladens, sie ist dafür verantwortlich, die Bestellungen im Auge zu behalten und dafür
                    zu sorgen, dass die Bedürfnisse der Kunden erfüllt werden. Raphael ist der Webmaster, er ist für die
                    Gestaltung der Website zuständig und sorgt dafür, dass die Website ordnungsgemäß funktioniert. Oleh
                    ist der Buchhalter, er ist für die Finanzen des Ladens zuständig und sorgt dafür, dass alles
                    verbucht wird und der Laden finanziell abgesichert ist. Gemeinsam sorgen sie dafür, dass der
                    Online-Buchladen reibungslos und effizient läuft.
                </p>
            </div>
        </div>

        <div class="row text-center">
            <!-- Eline -->
            <div class="col-33-33-33">
                <div class="member-card">
                    <img src="eline.svg" width="100" alt="Eline's selfie"/>
                    <h5 class="mb-0">Eline Ducrey</h5>
                    <span class="small text-uppercase text-muted">Content Manager</span>
                </div>
            </div>
            <!-- End-->

            <!-- Raphael-->
            <div class="col-33-33-33">
                <div class="member-card">
                    <img src="raphael.svg" width="100" alt="Raphael's selfie"/>
                    <h5 class="mb-0">Raphael Eyer</h5>
                    <span class="small text-uppercase text-muted">Website-Entwickler/Designer</span>
                </div>
            </div>
            <!-- End-->

            <!-- Oleh -->
            <div class="col-33-33-33">
                <div class="member-card">
                    <img src="oleh.svg" width="100" alt="Oleh's selfie"/>
                    <h5 class="mb-0">Oleh Hnatkovskyi</h5>
                    <span class="small text-uppercase text-muted">Kundenbetreuer</span>
                </div>
            </div>
            <!-- End-->
        </div>
    </div>
</body>
</html>
