<?php
if ((!isset($_SESSION['user_id']) == true) and (!isset($_SESSION['email']) == true)) {
  echo "<meta http-equiv='refresh' content='0;url=error_admin.html'>";
}
else if ($_SESSION['admin'] == 0){
  session_start();
  $_SESSION = array();
  session_destroy();
  echo "<meta http-equiv='refresh' content='0;url=error_admin.html'>";
}
