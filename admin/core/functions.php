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

function checkPassword($password,$original_password=""){
    if($password!=""){
        $sPass=password_hash($password,PASSWORD_DEFAULT);
        return $sPass;
    }
    else{
        return $original_password;
    }
}

//common functions start here
