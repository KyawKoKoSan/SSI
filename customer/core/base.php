<?php

function con($dbName = "ssi_db")
{
    $db = new PDO("mysql:host=localhost;dbname=$dbName", "root", "");
    return $db;
}
