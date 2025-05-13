<?php
require 'connection.php';
$id = $_GET['id'];

if (delete($id) > 0) {
  echo "<script>
            alert('Data berhasil diinput!');
            document.location.href = 'index.php';
          </script>";
}