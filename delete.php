<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('Location: login.php');
}
require 'connection.php';
$id = $_GET['id'];

if (delete($id) > 0) {
  echo "<script>
            alert('Data berhasil diinput!');
            document.location.href = 'index.php';
          </script>";
}