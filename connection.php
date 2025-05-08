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
  // $_POST['']
  
  // mysqli_query($conn, "INSERT INTO item VALUES ('')");
}

