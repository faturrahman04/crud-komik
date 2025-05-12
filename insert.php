<?php
require_once 'connection.php';

if (isset($_POST['submit'])) {
  insert();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komicom | Insert Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

    <div class="row my-4">
      <div class="col">
        <h1>Form Insert</h1>
      </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-1">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" aria-describedby="judulHelp" name="judul" required>
      </div>
      <div class="mb-1">
        <label for="penulis" class="form-label">Penulis</label>
        <input type="text" class="form-control" id="penulis" name="penulis" required>
      </div>
      <div class="mb-1">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
      </div>
      <div class="mb-1">
        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Cover</label>
        <input class="form-control" type="file" id="formFile" name="cover">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>