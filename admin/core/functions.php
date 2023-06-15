<?php

//common functions start here

function fetch($sql){
    $sql -> execute();
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function fetchAll($sql){
    $sql -> execute();
    $rows=[];
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)){
        array_push($rows,$row);
    }
    return $rows;
}

//common functions start here
