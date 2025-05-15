<?php
session_start();
require 'connection.php';

if (isset($_POST["signup"])) {
  if (signUp() > 0) {
    echo "<script>
            alert('Berhasil daftar');
            document.location.href = 'login.php'
          </script>";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komicom | Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>
   <style>
    body {
      font-family: "Winky Rough", sans-serif;
    }
  </style>
  <body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100dvh;">

      <div class="border border-primary d-flex align-items-center flex-column p-4 rounded-1">
        <h1>Sign up</h1>
        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            <?php if (isset($_SESSION["error"])) : ?>
              <p style="color: red;"><?= $_SESSION["error"] ?></p>
            <?php endif ?>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password" required>
            <?php if (isset($_SESSION["invalid_password"])) : ?>
              <p style="color: red;"><?= $_SESSION["invalid_password"] ?></p>
            <?php endif ?>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;" name="signup">Sign up</button>
          <p class="mt-2 text-center">Sudah memiliki akun? <a href="./login.php">Sign in</a></p>
        </form>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>