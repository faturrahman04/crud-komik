<?php
require_once 'connection.php';

$items = queryData("SELECT * FROM item");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komicom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <style>
    tr > * {
      vertical-align: middle;
    }
  </style>
  <body>
    <div class="container">

      <div class="row mt-5">
        <div class="col">
          <h1>Daftar Komik</h1>
        </div>
      </div>

      <div class="row">
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
            <td><a href="" class="btn btn-warning">Edit</a> | <a href="" class="btn btn-danger">Delete</a></td>
            <td><img src="./img/<?= $item["gambar"] ?>" alt="" width="50"></td>
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