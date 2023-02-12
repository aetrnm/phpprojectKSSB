<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon" />
    <title>Book Store Shop</title>
  </head>
  <body>
    <div class="container">
      <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"
      >
        <a
          href="/"
          class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none"
        >
          <img src="icon.svg" width="48"  alt="Website icon"/>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-3 link-dark">Home</a></li>
          <li><a href="/shop" class="nav-link px-3 link-dark">Shop</a></li>
          <li><a href="/about" class="nav-link px-3 link-dark">About</a></li>
          <li>
            <a href="/guestbook" class="nav-link px-3 link-dark">Guestbook</a>
          </li>
        </ul>

        <?php
        if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']){
          echo /** @lang text */
          '
          <div class="col-lg-4 text-end">
            <a href="/login" class="btn btn-outline-primary me-2">Login</a>
            <a href="/register" class="btn btn-primary">Register</a>
          </div>';
        }
        else{
          echo /** @lang text */
          '<div class="col-lg-4 text-end">
            <a href="/add-book" class="btn btn-outline-info me-2">Add book</a>
            <a href="/profile" class="btn btn-dark me-2">Profile</a>
          </div>';
        }
        ?>
      </header>

      <div class="row text-center">
        <?php

        $connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());
        $sql = /** @lang text */
          "SELECT title, author, coverLink, price, description, year FROM books";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);

        while($row){
          $title = $row['title'];
          $author = $row['author'];
          $coverLink = $row['coverLink'];
          $price = $row['price'];
          $description = $row['description'];
          $year = $row['year'];
          echo /** @lang text */
          "
        <div class=\"col-xl-6 col-md-12\">
          
          <div class=\"card mb-3 shadow-sm\" style=\"max-width: 100%\">
            <span class=\"position-absolute top-0 start-100 translate-middle badge text-bg-primary rounded-pill\">
              $price CHF
            </span>
            <div class=\"row g-0\">
              <div class=\"col-md-4\">
                <img src=\"$coverLink\" class=\"img-fluid\">
              </div>
              <div class=\"col-md-8\">
                <div class=\"card-body\">
                  <h5 class=\"card-title\">$title</h5>
                  <p class=\"card-text\">
                    $description
                  </p>
                  <p class=\"card-text\">
                    <small class=\"text-muted\">$author, $year</small>
                  </p>
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
