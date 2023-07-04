<?php
session_start();
unset($_SESSION['admin_acc']);
header("location:admin_login.php");
