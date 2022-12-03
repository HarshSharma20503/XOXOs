<?php
session_start();
include('../function.php');
unset($_SESSION['IS_LOGIN']);
redirect('login.php');
?>