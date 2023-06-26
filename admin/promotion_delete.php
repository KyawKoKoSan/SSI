<?php

require_once "core/admin_auth.php";
require_once "core/base.php";
require_once "core/functions.php" ;
$id = $_GET['id'];

if(serviceDelete($id)){
    linkTo('promotion_list.php');
}






