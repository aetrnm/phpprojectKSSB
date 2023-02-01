<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Book Store</title>
    <script src="components/Header.js"></script>
    <style>
        .carousel-inner img {
            margin: auto;
        }
        #cb-cookie-banner { position: fixed; bottom: 0; left: 0; width: 100%; z-index: 999; border-radius: 0; }
    </style>
</head>
<body>
    <div class="container">
        <main-header></main-header>

        <!-- Cookie Banner -->
        <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
            🍪 This website uses cookies to ensure you get the best experience on our website.
            <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
            <button type="submit" class="btn btn-primary btn-sm ms-3">
                I Got It
            </button>
        </div>
        <!-- End of Cookie Banner -->

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="500">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://covers.openlibrary.org/b/id/8587804-L.jpg" class="d-block w-50" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="https://covers.openlibrary.org/b/id/8739161-L.jpg" class="d-block w-50" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="https://covers.openlibrary.org/b/id/12001885-L.jpg" class="d-block w-50" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">But and sell your textbooks for the best price</h1>
                    <p class="lead">From applied literature to educational resources, we have a lot of textbooks to offer you. We provide only the best books for rent</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Go to the shop</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>