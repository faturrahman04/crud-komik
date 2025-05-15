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
  $judul = htmlspecialchars($_POST['judul']);
  $penulis = htmlspecialchars($_POST['penulis']);
  $penerbit = htmlspecialchars($_POST['penerbit']);
  $tahunTerbit = htmlspecialchars($_POST['tahun_terbit']);
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

  mysqli_query($conn, "INSERT INTO item VALUES ('', '$judul', '$penulis', '$penerbit', '$tahunTerbit', '$fixFilesName')");

  return mysqli_affected_rows($conn);
}

function delete($id) {
  global $conn;

  mysqli_query($conn, "DELETE FROM item WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function update($id) {
  global $conn;

  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $tahunTerbit = $_POST['tahun_terbit'];
  $cover = $_FILES['cover'];

  if ($cover["size"] > 2000000) {
    echo "<script>
            alert('Ukuran file tidak boleh dari 2MB');
          </script>";
    return;
  }

  // Jika user tidak mengupload gambar di form update, maka tetap menggunakan gambar yang lama
  if ($cover["error"] === 4) {
    $fileLama = $_POST['old_cover'];
    mysqli_query($conn, "UPDATE item 
                       SET judul = '$judul',
                       penulis = '$penulis',
                       penerbit = '$penerbit',
                       tahun_terbit = '$tahunTerbit',
                       gambar = '$fileLama'
                       WHERE id = '$id'");
    return mysqli_affected_rows($conn);
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
    $generateName = uniqid();
    $fixFilesName = $generateName . "." . end($type);
    $targetDir = "./img/uploads/";
    $targetFile = $targetDir . $fixFilesName;

  move_uploaded_file($cover["tmp_name"], $targetFile);

  return mysqli_affected_rows($conn);
}

function searchData($keyword) {
  return queryData("SELECT * FROM item WHERE 
                    judul LIKE '%$keyword%'
                    OR penulis LIKE '%$keyword%'
                    OR penerbit LIKE '%$keyword%'");
}

function signUp() {
  global $conn;

  $email = $_POST["email"];
  $username = explode('@', $email);
  $username = $username[0];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm_password"];

  if ($email === '') {
    echo "<script>
            alert('Email tidak boleh kosong!');
          </script>";
    return;
  }

  if ($password === '') {
    echo "<script>
            alert('Password wajib diisi!');
          </script>";
    return;
  }

  $isEmailExist = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
  if (mysqli_num_rows($isEmailExist) > 0) {
    $_SESSION["error"] = 'Email sudah digunakan';
  } else {
    $_SESSION["error"] = '';
  };

  if ($password !== $confirmPassword) {
    $_SESSION["invalid_password"] = 'Password tidak sesuai';
  } else {
    $_SESSION["invalid_password"] = '';
  }

  $hashingPassword = password_hash($password, PASSWORD_BCRYPT);

  mysqli_query($conn, "INSERT INTO user VALUE ('', '$username', '$email', '$hashingPassword')");

  return mysqli_affected_rows($conn);
}

