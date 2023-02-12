<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon" />
    <title>Book Store Guestbook</title>
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

      <h1>Guestbook</h1>

      <?php
      if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']){
        echo /** @lang text */
        '<h2>You must log in or register to leave comments</h2>';
      }
      else{
        echo /** @lang text */
      '<form action="./guestbook-script.php" method="POST">
        <div class="mb-3">
          <label for="feedback" class="form-label">Feedback</label>
          <textarea name="feedback" class="form-control" placeholder="Write here..." required></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Post" />
      </form>';
      }
      ?>

      <hr class="mt-4 mb-4" />

      <?php

      $connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());
      $sql = /** @lang text */
        "SELECT id, content, author, created FROM reviews ORDER BY id desc";
      $query = mysqli_query($connect, $sql);

      $row = mysqli_fetch_array($query);

      while($row){
        $content = $row['content'];
        $author = $row['author'];
        $created = $row['created'];
        echo /** @lang text */
        "<div class=\"card mb-4\">
          <div class=\"card-body\">
            <p> $content</p>
            <div class=\"d-flex justify-content-between\">
              <p class=\"small mb-0\">By <b>$author</b></p>
              <p class=\"small mb-0 ms-2\">$created</p>
            </div>
          </div>
        </div>";
        $row = mysqli_fetch_array($query);
      }
      ?>
    </div>
  </body>
</html>
