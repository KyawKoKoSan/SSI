<?php

function con($dbName = "ssi_db")
{
    $db = new PDO("mysql:host=localhost;dbname=$dbName", "root", "");
    return $db;
}
$url = "http://{$_SERVER['HTTP_HOST']}/SSI/admin";
$role = ['Admin', 'Editor']; //0 = admin 1= editor

$complainStatus = ['Solved', "Pending"]; //0=solved 1=pending

date_default_timezone_set('Asia/Yangon');
