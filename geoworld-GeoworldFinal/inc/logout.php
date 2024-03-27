<?php
session_start();
require('connect-db.php');

if(session_destroy()) {
  header("Location: login.php");
  exit;
}
?>
