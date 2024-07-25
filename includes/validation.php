<?php
if ((!isset($_SESSION['user_id']) == true) and (!isset($_SESSION['email']) == true)) {
  echo "<meta http-equiv='refresh' content='0;url=error.html'>";
}
?>