<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Store Your Account</title>
  <script src="components/UnLoggedHeader.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <un-logged-main-header></un-logged-main-header>

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