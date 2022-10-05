<?php 
include "./includes/db_conn.php";
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";



if ($conn->query($sql) === TRUE) {
    $conn->close();
    header('Location: superadmin.php');
  } else {
    echo "Error deleting record: " . $conn->error;
  }
