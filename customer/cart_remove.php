<?php
session_start();
require_once "core/base.php";
require_once "../admin/core/functions.php";

$id = $_GET['id'];

if(removeFromCart($id)){
    linkTo('my_cart.php');
}






