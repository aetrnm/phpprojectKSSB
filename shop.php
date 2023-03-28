<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-shop.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>
    <title>Book Store Shop</title>
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
        <h1 class="mb-1">Shop</h1>
        <div class="row">
            <?php
            $connect = mysqli_connect('kssb.ch', 'db.user.g14f', 'dUs<8+SBrb', 'db.f1') or die('Connection Failure' . mysqli_connect_error());
            $sql = /** @lang text */
                "SELECT id, title, author, coverLink, price, description, year FROM books";
            $query = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($query);

            while ($row) {
                $id = $row['id'];
                $title = $row['title'];
                $author = $row['author'];
                $coverLink = $row['coverLink'];
                $price = $row['price'];
                $description = $row['description'];
                $year = $row['year'];

                if (strlen($description) > 300) {
                    $description = substr($description, 0, 300) . '...';
                }

                echo /** @lang text */
                "
                <div class=\"col-50-50\">
                  
                  <div class=\"product-card-wrapper mb-3\">
                    <span class=\"product-price\">
                      $price CHF
                    </span>
                    <div class=\"row g-0\">
                      <div class=\"card-img-wrapper\">
                        <img src=\"$coverLink\" class=\"card-img\">
                      </div>
                      <div class=\"card-body-wrapper\">
                        <div class=\"card-body\">
                          <h2 class=\"mb-05\">$title</h2>
                          <p class=\"card-text\">
                            $description
                          </p>
                          <p class=\"card-text\">
                            <small class=\"text-muted\">$author, $year</small>
                          </p>
                          <form action=\"./scripts/add-book-to-cart-script.php\" method=\"POST\">
                            <input type=\"hidden\" name=\"book_id\" value=\"$id\">
                            <input type=\"submit\" class=\"button button-bluish mt-15\" value=\"Zum Warenkorb hinzufügen\"/>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>";
                $row = mysqli_fetch_array($query);
            }
            ?>
        </div>
    </div>
</body>
</html>
