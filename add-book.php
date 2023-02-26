<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/styles-form.css"/>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon"/>

    <title>Book Store Add a Book</title>
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
        <div>
            <h1>Add book</h1>
        </div>

        <form action="scripts/add-book-script.php" method="POST">
            <div class="mb-1">
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

            <div class="mb-1">
                <label for="author" class="form-label">Author</label>
                <input
                        name="author"
                        id="author"
                        type="text"
                        class="form-control"
                        placeholder="J. K. Rowling"
                />
            </div>

            <div class="mb-1">
                <label for="coverLink" class="form-label">Cover link</label>
                <input
                        name="coverLink"
                        id="coverLink"
                        type="text"
                        class="form-control"
                        placeholder="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/8388/9781838858636.jpg"
                />
            </div>

            <div class="mb-1">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Write here..." required></textarea>
            </div>

            <div class="mb-1">
                <label for="year" class="form-label">Year</label>
                <input
                        name="year"
                        placeholder="1997"
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
            <div class="input-group mb-1">
                <input type="number"
                       value="0.01"
                       id="price"
                       name="price"
                       min="0"
                       step="0.01"
                       max="999.99"
                       class="form-control"
                       onfocus="this.previousValue = this.value"
                       onkeydown="this.previousValue = this.value"
                       oninput="validity.valid || (value = this.previousValue)" required/>
            </div>

            <input type="submit" class="button button-bluish" value="Add a book"/>
        </form>
    </div>
</body>
</html>
