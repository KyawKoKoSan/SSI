<?php
require_once "core/admin_auth.php";
require_once "core/base.php";
require_once "core/functions.php" ;
$id = $_GET['id'];

if(adminDelete($id)){
    linkTo('admin_list.php');
}






