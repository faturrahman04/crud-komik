<?php
session_start();
require 'connection.php';

if (isset($_POST["login"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];

  // Validasi email apakah ada
  $emailExist = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
  if (mysqli_num_rows($emailExist) === 0 ) {
    echo "<script>
            alert('Email tidak ditemukan!');
            document.location.href = 'login.php';
          </script>";
    return;
  }

  $sql= mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' OR password = '$password'");

  $user = mysqli_fetch_assoc($sql);
  
  if ($user) {
    if (password_verify($password, $user["password"])) {
      // Session
      $_SESSION['login'] = true;
      $_SESSION['email'] = $user['email'];
      // Session
      header('Location: index.php');
    }
  }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komicom | Login</title>
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
        <h1>Login</h1>
        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;" name="login">Login</button>
          <p class="mt-2 text-center">Belum memiliki akun? <a href="./registrasi.php">Sign up</a></p>
        </form>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>