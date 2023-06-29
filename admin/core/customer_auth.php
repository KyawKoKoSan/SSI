<?php
session_start();

if(!$_SESSION['customer']){
    header("location:customer_login.php");
}