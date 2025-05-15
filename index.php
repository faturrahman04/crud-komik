<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}

if (isset($_GET["search"])) {
  $keyword = $_GET["search"];
  $items = searchData($keyword);
} else {
  $items = queryData("SELECT * FROM item");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komicom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  </head>
  <style>
    body {
      font-family: "Winky Rough", sans-serif;
    }
    tr > * {
      vertical-align: middle;
    }
  </style>
  <body>
    <a href="./logout.php" style="color: red; position: absolute; right: 2rem; top: 1rem;">Logout</a>
    <div class="container" style="position: relative;">
      <div class="row mt-5">
        <div class="col">
          <h1>Daftar Komik</h1>
          <form action="" method="get">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari Komik" aria-label="Cari Komik" aria-describedby="button-addon2" name="search">
              <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="submit">Search</button>
            </div>
            <p style="margin-top: -1rem; color: red;">Note : Pencarian difilter berdasarkan Judul, Penulis dan Penerbit</p>
          </form>
        </div>
      </div>

      <div class="row border">
        <div class="col">
          <a href="insert.php" class="btn btn-outline-info">Insert New Komik</a>
        </div>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Aksi</th>
            <th scope="col">Cover</th>
            <th scope="col">Judul</th>
            <th scope="col">Penulis</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Tahun Rilis</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach($items as $item) : ?>
          <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><a href="edit.php?id=<?= $item['id'] ?>" class="btn btn-warning">Edit</a> | <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-danger">Delete</a></td>
            <td><img src="./img/uploads/<?= $item["gambar"] ?>" alt="" width="50"></td>
            <td><?= $item["judul"] ?></td>
            <td><?= $item["penulis"] ?></td>
            <td><?= $item["penerbit"] ?></td>
            <td><?= $item["tahun_terbit"] ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>