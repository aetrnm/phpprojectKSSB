<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Store Your Account</title>
  <link rel="stylesheet" href="./index.css" />    
  <link rel="shortcut icon" href="icon.svg" type="image/x-icon" />

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

    <?php
      if (!isset($_COOKIE['logged_in']) or !$_COOKIE['logged_in']){
        echo /** @lang text */
        '<h1>You must log in or register to access this page </h1>';
        die();
      }

      $logged_email = $_COOKIE['logged_email'];
      $connect = mysqli_connect('localhost', 'root', '', 'bookstore') or die('Connection Failure' . mysqli_connect_error());
      $sql = /** @lang text */
        "SELECT name FROM users where email='$logged_email'";
      $query = mysqli_query($connect, $sql);
      $row = mysqli_fetch_array($query);

      $name = $row['name'];
      echo "<h1>Welcome $name</h1>";
    ?>

    <form action="./logout.php" method="POST">
      <input type="submit" class="btn btn-danger" value="Log out">
    </form>
  </div>
</body>
</html>