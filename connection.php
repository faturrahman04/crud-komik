<?php
$username = 'root';
$password = '';

$conn = mysqli_connect('localhost', $username, $password, 'komik');

function queryData($query) {
  global $conn;
  $rows = [];

  $result = mysqli_query($conn, $query);
  while ($data = mysqli_fetch_assoc($result)) {
    $rows[] = $data;
  }
  return $rows;
}

function insert() {
  global $conn;
  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahunTerbit = $_POST['tahun_terbit'];
  $cover = $_FILES['cover'];

  // Validasi required file
  if ($cover["error"] === 4) {
    echo "<script>
            alert('Tidak ada foto yang diupload');
          </script>";
    return;
  }

  // Validasi ekstensi/type file
  $ekstenseFileValid = ['jpg', 'jpeg', 'png'];
  $typeEkstensi = $cover["type"];
  $type = explode('/', $typeEkstensi);

  if (!array_search(end($type), $ekstenseFileValid)) {
    echo "<script>
            alert('Ekstensi file tidak valid');
          </script>";
    return;
  }
  // Validasi ekstensi/type file

  if ($cover["size"] > 2000000) {
    echo "<script>
            alert('Ukuran file tidak boleh dari 2MB');
          </script>";
    return;
  }

  $generateName = uniqid();
  $fixFilesName = $generateName . "." . end($type);
  $targetDir = "./img/uploads/";
  $targetFile = $targetDir . $fixFilesName;

  move_uploaded_file($cover["tmp_name"], $targetFile);

  


}

