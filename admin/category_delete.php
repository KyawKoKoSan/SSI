<?php

require_once "core/admin_auth.php";
require_once "core/base.php";
require_once "core/functions.php" ;
$id = $_GET['id'];

if(categoryDelete($id)){
    linkTo('category_management.php');
}






