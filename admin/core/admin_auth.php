<?php

session_start();

if (!$_SESSION['admin_acc']) {
    header("location:admin_login.php");
}
