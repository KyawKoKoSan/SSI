<?php
error_reporting(0);
ini_set('display_errors', 0);
try {
    session_start();
} catch (Exception $e) {
    echo 'Error starting session: ' . $e->getMessage();
}

if(!$_SESSION['customer']){
    header("location:customer_login.php");
}