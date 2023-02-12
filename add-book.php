<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon" />

    <title>Book Store Add a Book</title>
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

      <div>
        <h1>Add a Book</h1>
      </div>

      <form action="./add-book-script.php" method="POST">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input
            name="title"
            id="title"
            type="text"
            class="form-control"
            placeholder="Harry Potter"
            required
          />
        </div>

        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input
            name="author"
            id="author"
            type="text"
            class="form-control"
            placeholder="J. K. Rowling"
          />
        </div>

        <div class="mb-3">
          <label for="coverLink" class="form-label">Cover link</label>
          <input
            name="coverLink"
            id="coverLink"
            type="text"
            class="form-control"
            placeholder="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/8388/9781838858636.jpg"
          />
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="form-control" placeholder="Write here..." required></textarea>
        </div>

        <div class="mb-3">
          <label for="year" class="form-label">Year</label>
          <input
            name="year"
            id="year"
            type="number"
            min="0"
            step="1"
            max="2023"
            class="form-control"
            onfocus="this.previousValue = this.value"
            onkeydown="this.previousValue = this.value"
            oninput="validity.valid || (value = this.previousValue)"
          />
        </div>

        <div>
          <label for="price" class="form-label">Price</label>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">CHF</span>
          </div>
          <input type="number"
                 id="price"
                 name="price"
                 min="0.01"
                 step="0.01"
                 max="999.99"
                 class="form-control"
                 onfocus="this.previousValue = this.value"
                 onkeydown="this.previousValue = this.value"
                 oninput="validity.valid || (value = this.previousValue)" required />
        </div>

        <input type="submit" class="btn btn-primary" value="Add a book" />
      </form>
    </div>
  </body>
</html>
