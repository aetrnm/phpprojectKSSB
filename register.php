<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon" />
    <title>Book Store Register</title>
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

        <div class="col-lg-4 text-end">
          <a href="/login" class="btn btn-outline-primary me-2">Login</a>
          <a href="/register" class="btn btn-primary">Register</a>
        </div>
      </header>

      <div>
        <h1>Register</h1>
      </div>

      <form action="./register-script.php" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input
            name="name"
            id="name"
            type="text"
            class="form-control"
            placeholder="Eline"
            required
          />
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input
            name="email"
            id="email"
            type="email"
            class="form-control"
            placeholder="name@example.com"
            required
          />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            name="password"
            id="password"
            type="password"
            class="form-control"
            placeholder="1234567890"
            required
          />
        </div>

        <input type="submit" class="btn btn-primary" value="Register" />
      </form>
    </div>
  </body>
</html>
