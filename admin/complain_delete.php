<?php

require_once "core/admin_auth.php";
require_once "core/check_admin.php";
require_once "core/base.php";
require_once "core/functions.php";
$id = $_GET['id'];

if (deleteComplain($id)) {
    linkTo('complain_list.php');
}
