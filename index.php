<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon" />
    <title>Book Store</title>
    <style>
      #cb-cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        border-radius: 0;
      }
    </style>
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
          <img src="icon.svg" width="48" />
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-3 link-dark">Home</a></li>
          <li><a href="/shop" class="nav-link px-3 link-dark">Shop</a></li>
          <li><a href="/about" class="nav-link px-3 link-dark">About</a></li>
        </ul>

        <?php
        if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']){
          echo '
          <div class="col-lg-4 text-end">
            <a href="/add-book" class="btn btn-outline-info me-2">Add book</a>
            <a href="/login" class="btn btn-outline-primary me-2">Login</a>
            <a href="/register" class="btn btn-primary">Register</a>
          </div>';
        }
        else{
          echo '<div class="col-lg-4 text-end">
            <a href="/profile" class="btn btn-dark me-2">Profile</a>
          </div>';
        }
        ?>
        
      </header>

      <!-- Cookie Banner -->
      <div
        id="cb-cookie-banner"
        class="alert alert-dark text-center mb-0"
        role="alert"
      >
        🍪 This website uses cookies to ensure you get the best experience on
        our website.
        <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
        <button type="submit" class="btn btn-primary btn-sm ms-3">
          I Got It
        </button>
      </div>
      <!-- End of Cookie Banner -->

      <!--      <div class="container col-xxl-8 px-4 py-5">-->
      <!--          <div class="row flex-lg-row-reverse align-items-center g-5 py-5">-->
      <!--              <div class="col-10 col-sm-8 col-lg-6">-->
      <!--                  <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="500">-->
      <!--                      <div class="carousel-inner">-->
      <!--                          <div class="carousel-item active">-->
      <!--                              <img src="https://covers.openlibrary.org/b/id/8587804-L.jpg" class="d-block w-50" alt="">-->
      <!--                          </div>-->
      <!--                          <div class="carousel-item">-->
      <!--                              <img src="https://covers.openlibrary.org/b/id/8739161-L.jpg" class="d-block w-50" alt="">-->
      <!--                          </div>-->
      <!--                          <div class="carousel-item">-->
      <!--                              <img src="https://covers.openlibrary.org/b/id/12001885-L.jpg" class="d-block w-50" alt="">-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                  </div>-->
      <!--              </div>-->
      <!--              <div class="col-lg-6">-->
      <!--                  <h1 class="display-5 fw-bold lh-1 mb-3">Buy and sell your textbooks for the best price</h1>-->
      <!--                  <p class="lead">From applied literature to educational resources, we have a lot of textbooks to offer you. We provide only the best books for rent</p>-->
      <!--                  <div class="d-grid gap-2 d-md-flex justify-content-md-start">-->
      <!--                      <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Go to the shop</button>-->
      <!--                  </div>-->
      <!--              </div>-->
      <!--          </div>-->
      <!--      </div>-->

      <div class="container my-5">
        <div
          class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border"
        >
          <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1">
              Buy and sell your textbooks for the best price
            </h1>
            <p class="lead">
              From applied literature to educational resources, we have a lot of
              textbooks to offer you. We provide only the best books for rent.
            </p>
            <div
              class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3"
            >
              <a href="/shop"
                ><button
                  type="button"
                  class="btn btn-primary btn-lg px-4 me-md-2 fw-bold"
                >
                  Go to the shop
                </button></a
              >
            </div>
          </div>

          <img src="books.svg" srcset="books.svg" class="m-auto w-25" />
        </div>
      </div>
    </div>
  </body>
</html>
