<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon" />

    <title>Book Store About</title>
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

      <div class="row mb-4">
        <h1>Our team</h1>
        <div class="col-lg-12">
          <p class="font-italic text-muted">
            Eline, Raphael and Oleh are a great team working in an online
            bookshop. Eline is the manager of the shop, she is responsible for
            keeping track of orders and making sure that the customer's needs
            are met. Raphael is the webmaster, he is responsible for the website
            design and making sure that the website is up and running properly.
            Oleh is the bookkeeper, he is responsible for keeping track of the
            finances of the shop, making sure that everything is accounted for
            and that the shop is financially secure. Together, they make sure
            that the online book shop runs smoothly and efficiently.
          </p>
        </div>
      </div>

      <div class="row text-center">
        <!-- Eline -->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="eline.svg" width="100"  alt="Eline's selfie"/>
            <h5 class="mb-0">Eline Ducrey</h5>
            <span class="small text-uppercase text-muted">CEO - Founder</span>
          </div>
        </div>
        <!-- End-->

        <!-- Raphael-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="raphael.svg" width="100"  alt="Raphael's selfie"/>
            <h5 class="mb-0">Raphael Eyer</h5>
            <span class="small text-uppercase text-muted">CEO - Founder</span>
          </div>
        </div>
        <!-- End-->

        <!-- Oleh -->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4">
            <img src="oleh.svg" width="100"  alt="Oleh's selfie"/>
            <h5 class="mb-0">Oleh Hnatkovskyi</h5>
            <span class="small text-uppercase text-muted">CEO - Founder</span>
          </div>
        </div>
        <!-- End-->
      </div>
    </div>
  </body>
</html>