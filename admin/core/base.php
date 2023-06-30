<?php

function con($dbName="ssi_db"){
    $db = new PDO("mysql:host=localhost;dbname=$dbName", "root", "");
    return $db;
}
$url = "http://{$_SERVER['HTTP_HOST']}/SSI/admin";
$role =['Admin','Editor'];

date_default_timezone_set('Asia/Yangon');

