<?php
session_start();
$un=$_SESSION['un'];
session_destroy();
//unset($un);
header('location:index.php');
?>