<?php
include '../includes/config.php';
$user_id = $_GET['user_id'];
$sql = "UPDATE t_user SET blocked = 0 WHERE user_id='$user_id'";
if ($conn->query($sql) === TRUE) {
  echo "User Successfully Blocked!";
} else {
  echo "Error Blocking: " . $conn->error;
}
$conn->close();
header('Location: list_users.php');